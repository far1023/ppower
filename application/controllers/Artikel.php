<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('dbartikel');
        $this->load->model('dbmenu');
        $this->load->library('pagination');
    }

    public function index()
    {
        redirect('artikel/list');
    }

    public function list($cari=FALSE){
        $level = $this->session->userdata('level');
        if (!$level) {
            $this->session->set_flashdata('error','Akses Ditolak !');
            $this->session->set_userdata('page', current_url());
            redirect(site_url('auth'));
        }

        $cari = $this->input->get('cari');

        if (!$cari) {
            $config['total_rows']= $this->db->order_by('tanggal', 'desc')->get('artikel')->num_rows();
        } else {
            $config['total_rows']= $this->db->where('author', $cari)->or_where('judul', $cari)->order_by('tanggal', 'desc')->get('artikel')->num_rows();
        }
        $config['base_url']=site_url('artikel/list');
        $config['per_page']=3;
        $config['uri_segment']=3;
        $config['num_links'] = 1;

        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nan></div>';
 
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
 
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
 
        $config['next_link']        = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
 
        $config['prev_link']        = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
 
        $config['first_link']       = '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
 
        $config['last_link']       = '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = "artikel";
        $data['subto'] = NULL;
        $data['col'] = $this->dbmenu->readCol();
        $data['menu'] = $this->dbmenu->readMenu();
        $data['sub'] = $this->dbmenu->readSub();
        $data['cari'] = htmlspecialchars($cari);

        if (!$cari) {
            $data['feed'] = $this->dbartikel->read($cari, $config);
        } else {
            $data['feed'] = $this->dbartikel->read($cari, $config);
        }

        if ($this->session->userdata('level')!=2) {
            $this->load->view('backend/show_artikel', $data);
        }
        elseif($this->session->userdata('level')==2) {
            $this->load->view('pageuser/feed', $data);   
        }
    }
 
    function addArtikel($data=FALSE){
        $level = $this->session->userdata('level');
        if (!$level) {
            $this->session->set_flashdata('error','Akses Ditolak !');
            $this->session->set_userdata('page', current_url());
            redirect(site_url('auth'));
        }
        if ($level==2) {
            $this->session->unset_userdata('page');
            redirect(site_url('dashboard'));
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $data['page'] = "artikel";
            $data['subto'] = NULL;
            $data['col'] = $this->dbmenu->readCol();
            $data['menu'] = $this->dbmenu->readMenu();
            $data['sub'] = $this->dbmenu->readSub();
            $this->load->view('backend/addArtikel', $data, FALSE);
        } else {
            $judul=$this->input->post('judul');
            $isi=$this->input->post('isi');
            $config['upload_path'] = './assets/images/post/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['encrypt_name'] = FALSE;
            $config['max_size'] = 300; //enkripsi nama file ketika upload
            $this->upload->initialize($config);

            if(!empty($_FILES['gambar']['name'])){
                if ( ! $this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error','Gambar gagal diunggah!');
                    redirect('artikel');
                }
                else {
                    $gbr = $this->upload->data();
                    $this->load->library('image_lib', $config);
                    $gambar=$gbr['file_name']; //ambil nama file yang terupload enkripsi
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/post/'.$gbr['file_name'];
                    $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
                    $config['new_image']= './assets/images/post/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    //Buat slug
                    //filter karakter unik dan replace dengan kosong ('')
                    $string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $judul);
                    // hilangkan spasi berlebihan dengan fungsi trim
                    $trim=trim($string);
                    // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
                    $pre_slug=strtolower(str_replace(" ", "-", $trim));
                    $pre_slug=str_replace(",", "", $pre_slug);
                    $pre_slug=str_replace(".", "", $pre_slug);
                    // tambahkan ektensi .html pada slug
                    $slug=$pre_slug.'.html';
                    $author = $this->session->userdata('nama');

                    $data = array(
                        'author'    => $author,
                        'slug'      => $slug,
                        'judul'     => htmlspecialchars(set_value('judul')),
                        'isi'       => set_value('isi'),
                        'gambar'    => $gambar,          
                        'tanggal'   => date('Y-m-d')
                    );
                    $this->dbartikel->create($data);
                    $this->session->set_flashdata('done', 'Artikel telah dipublish.');
                    redirect('artikel/detail/'.$slug);
                }          
            }
            else { //gambar kosong
                //Buat slug
                //filter karakter unik dan replace dengan kosong ('')
                $string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $judul);
                // hilangkan spasi berlebihan dengan fungsi trim
                $trim=trim($string);
                // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
                $pre_slug1=strtolower(str_replace(" ", "-", $trim));
                $pre_slug2=strtolower(str_replace(",", "", $pre_slug1));
                $pre_slug=strtolower(str_replace(".", "", $pre_slug2));
                // tambahkan ektensi .html pada slug
                $slug=$pre_slug.'.html';
                $author = $this->session->userdata('nama');

                $data = array(
                    'author'    => $author,
                    'slug'      => $slug,
                    'judul'     => htmlspecialchars(set_value('judul')),
                    'isi'       => set_value('isi', FALSE),
                    'gambar'    => NULL,          
                    'tanggal'   => date('Y-m-d')
                );

                $this->dbartikel->create($data);
                $this->session->set_flashdata('done', 'Artikel telah dipublish.');
                redirect('artikel/detail/'.$slug);
            }
        }       
    }
 
    function search($slug){ //fungsi untuk menampilkan detail artikel
        $data=$this->dbartikel->get_post_by_slug($slug);
        if($data->num_rows() > 0){ // validasi jika data ditemukan
            $x['data']= $data;
            $this->load->view('v_blog_detail',$x);
        }else{
            //jika data tidak ditemukan, maka kembali ke blog
            redirect('blog');
        }   
    }

    public function removeArtikel($id)
    {
        $level = $this->session->userdata('level');
        if (!$level) {
            $this->session->set_flashdata('error','Akses ditolak !');
            $this->session->set_userdata('page', current_url());
            redirect(site_url('auth'));
        }
        if ($level==2) {
            $this->session->unset_userdata('page');
            redirect(site_url('dashboard/profil'));
        }

        $del = $this->dbartikel->getOne($id);
        if (is_file('./assets/images/post/'.$del->gambar)) {
            unlink('./assets/images/post/'.$del->gambar);
        }
        $this->dbartikel->delete($id);
        redirect('artikel');
    }

    public function detail($slug) {
        $level = $this->session->userdata('level');
        if (!$level) {
            $this->session->set_flashdata('error','Akses Ditolak !');
            $this->session->set_userdata('page', current_url());
            redirect(site_url('auth'));
        }

        $data['page'] = "artikel";
        $data['subto'] = NULL;
        $data['col'] = $this->dbmenu->readCol();
        $data['menu'] = $this->dbmenu->readMenu();
        $data['sub'] = $this->dbmenu->readSub();

        $data['artikel'] = $this->dbartikel->readMore($slug);
        $data['suggest'] = $this->dbartikel->recent($data['artikel']->id);

        if ($this->session->userdata('level')!=2) {
            $this->load->view('backend/detail', $data);
        }
        elseif($this->session->userdata('level')==2) {
            $this->load->view('pageuser/detail', $data);   
        }
    }

    public function update($id, $action='') {
        $level = $this->session->userdata('level');
        if (!$level) {
            $this->session->set_flashdata('error','Akses Ditolak !');
            $this->session->set_userdata('page', current_url());
            redirect(site_url('auth'));
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['page'] = "artikel";
            $data['subto'] = NULL;
            $data['col'] = $this->dbmenu->readCol();
            $data['menu'] = $this->dbmenu->readMenu();
            $data['sub'] = $this->dbmenu->readSub();

            $data['value'] = $this->dbartikel->getOne($id);
            if ($action=="remove") {
                if (is_file('./assets/images/post/'.$data['value']->gambar)) {
                    unlink('./assets/images/post/'.$data['value']->gambar);
                }
                $data = array(
                    'gambar'     => NULL,
                );
                $this->dbartikel->update($id, $data);

                $this->session->set_flashdata('done', 'Data Berhasil Diubah.');
                redirect('artikel/update/'.$id);
            }
            $this->load->view('backend/editArtikel', $data);
        } 
        else {
            $judul=$this->input->post('judul');
            $isi=$this->input->post('isi');
            $config['upload_path'] = './assets/images/post/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['encrypt_name'] = FALSE;
            $config['max_size'] = 300; //enkripsi nama file ketika upload
            $this->upload->initialize($config);

            if(!empty($_FILES['gambar']['name'])){
                if ( ! $this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error','Gambar gagal diunggah!');
                    redirect('artikel');
                }
                else {
                    $gbr = $this->upload->data();
                    $this->load->library('image_lib', $config);
                    $gambar=$gbr['file_name']; //ambil nama file yang terupload enkripsi
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/post/'.$gbr['file_name'];
                    $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
                    $config['new_image']= './assets/images/post/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $this->image_lib->initialize($config);
                    $this->image_lib->resize();
                    //Buat slug
                    //filter karakter unik dan replace dengan kosong ('')
                    $string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $judul);
                    // hilangkan spasi berlebihan dengan fungsi trim
                    $trim=trim($string);
                    // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
                    $pre_slug=strtolower(str_replace(" ", "-", $trim));
                    $pre_slug=str_replace(",", "", $pre_slug);
                    $pre_slug=str_replace(".", "", $pre_slug);
                    // tambahkan ektensi .html pada slug
                    $slug=$pre_slug.'.html';
                    $author = $this->session->userdata('nama');

                    $data = array(
                        'author'    => $author,
                        'slug'      => $slug,
                        'judul'     => htmlspecialchars(set_value('judul')),
                        'isi'       => set_value('isi'),
                        'gambar'    => $gambar,          
                        'tanggal'   => date('Y-m-d')
                    );
                    $this->dbartikel->update($id, $data);
                    $this->session->set_flashdata('done', 'Artikel berhasil diubah.');
                    redirect('artikel/detail/'.$slug);
                }          
            }
            else { //gambar kosong
                //Buat slug
                //filter karakter unik dan replace dengan kosong ('')
                $string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $judul);
                // hilangkan spasi berlebihan dengan fungsi trim
                $trim=trim($string);
                // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
                $pre_slug1=strtolower(str_replace(" ", "-", $trim));
                $pre_slug2=strtolower(str_replace(",", "", $pre_slug1));
                $pre_slug=strtolower(str_replace(".", "", $pre_slug2));
                // tambahkan ektensi .html pada slug
                $slug=$pre_slug.'.html';
                $author = $this->session->userdata('nama');

                $data = array(
                    'author'    => $author,
                    'slug'      => $slug,
                    'judul'     => htmlspecialchars(set_value('judul')),
                    'isi'       => set_value('isi', FALSE),
                    'gambar'    => NULL,          
                    'tanggal'   => date('Y-m-d')
                );

                $this->dbartikel->update($id, $data);
                $this->session->set_flashdata('done', 'Artikel berhasil diubah.');
                redirect('artikel/detail/'.$slug);
            }
        }

    }
}