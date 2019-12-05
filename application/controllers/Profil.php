<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('dbclients');
		$this->load->model('dbmenu');
		$this->load->model('dblogin');
	}

	public function index($id, $action='')
	{
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|integer');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|max_length[13]|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE)
		{
			$data['clients'] = $this->dbclients->search($id);
			$data['ttd'] = $this->dbclients->getTtd($id);
			if ($level==2) {
			$data['page'] = NULL;
			$data['subto'] = NULL;
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
				if ($action=="hapus") {
					if ($this->session->userdata('avatar')!="img_avatar3.png") {
                		if (is_file('./assets/images/avatar/'.$this->session->userdata('avatar'))) {
                		unlink('./assets/images/avatar/'.$this->session->userdata('avatar'));
                		}
                	}
					$datagbr = array(
		                        'title'		=> '',
                    );

                    $this->dbclients->updategbr($id, $datagbr);
					$this->session->set_userdata('avatar', 'img_avatar3.png');
                    $this->session->set_flashdata('done', 'Data Berhasil Diubah.');
					redirect('profil/index/'.$this->session->userdata('id'));
				}
				else {
					$this->load->view('pageuser/editprof', $data);
				}
			}
			else{
			$data['page'] = NULL;
			$data['subto'] = NULL;
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
				if ($action=="hapus") {
					if ($this->session->userdata('avatar')!="img_avatar3.png") {
                		if (is_file('./assets/images/avatar/'.$this->session->userdata('avatar'))) {
                		unlink('./assets/images/avatar/'.$this->session->userdata('avatar'));
                		}
                	}
					$datagbr = array(
		                        'title'		=> '',
                    );

                    $this->dbclients->updategbr($id, $datagbr);
					$this->session->set_userdata('avatar', 'img_avatar3.png');
                    $this->session->set_flashdata('done', 'Data Berhasil Diubah.');
					redirect('profil/index/'.$this->session->userdata('id'));
				}
				elseif ($action=="_hapus") {
					if ($data['ttd']->title!=NULL) {
                		if (is_file('./assets/images/ttd/'.$data['ttd']->title)) {
                		unlink('./assets/images/ttd/'.$data['ttd']->title);
                		}
                	}
					$datattd = array(
		                        'title'		=> '',
                    );

                    $this->dbclients->updatettd($id, $datattd);
                    $this->session->set_flashdata('done', 'Data Berhasil Diubah.');
					redirect('profil/index/'.$this->session->userdata('id'));
				}
				else {
					$this->load->view('backend/profile', $data);
				}
			}
		} else {
			$config['upload_path'] = './assets/images/avatar';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name'] = FALSE; //enkripsi nama file ketika upload
			$this->load->library('upload');
            $this->upload->initialize($config);

            if(!empty($_FILES['gambar']['name'])){
                if ( ! $this->upload->do_upload('gambar')) {
                    $this->session->set_flashdata('error','Gambar gagal diunggah!');
                    redirect('profil/index/'.$this->session->userdata('id'));
                }
                else {
                	if ($this->session->userdata('avatar')!="img_avatar3.png") {
                		if (is_file('./assets/images/avatar/'.$this->session->userdata('avatar'))) {
                		unlink('./assets/images/avatar/'.$this->session->userdata('avatar'));
                		}
                	}
                    $gbr = $this->upload->data();
                    $this->load->library('image_lib');
                    $gambar=$gbr['file_name']; //ambil nama file yang terupload enkripsi
                    $config['image_library']='gd2';
                    $config['source_image']='./assets/images/avatar/'.$gbr['file_name'];
                    $imageSize = $this->image_lib->get_image_properties($config['source_image'], TRUE);
                    $newSize = min($imageSize['height'], $imageSize['width']);
                    $config['new_image']= './assets/images/avatar/'.$gbr['file_name'];
                    $config['create_thumb']= FALSE;
                    $config['maintain_ratio']= FALSE;
                    $config['quality']= '60%';
                    $config['y_axis']= ($imageSize['height'] - $newSize)/2;
                    $config['x_axis']= ($imageSize['width'] - $newSize)/2;
                    $config['height']= $newSize;
                    $config['width']= $newSize;
                    $this->image_lib->initialize($config);
                    $this->image_lib->crop();
                    $this->image_lib->resize();

					$nama = set_value('nama');
					$data =	array(
								'nama'		=> htmlspecialchars($nama),
								'gender'	=> set_value('gender'),
								'telepon'	=> set_value('telepon'),
								'alamat'	=> htmlspecialchars(set_value('alamat'))
								);

                    $datagbr = array(
		                        'title'		=> $gambar,
                    );

                    $this->dbclients->updategbr($id, $datagbr);
                    $this->dbclients->update($id, $data);
                    $this->session->set_userdata('avatar', $gbr['file_name']);
                    $this->session->set_flashdata('done', 'Data Berhasil Diubah.');
					$this->session->set_userdata('nama', set_value('nama'));

					$data['ttd'] =  $this->dbclients->getTtd($id);
	            	$configd['upload_path'] = './assets/images/ttd';
	            	$configd['allowed_types'] = 'jpg|png|jpeg';
	            	$configd['max_size'] = 150;
	            	$configd['encrypt_name'] = FALSE; //enkripsi nama file ketika upload
					$this->load->library('upload');
	            	$this->upload->initialize($configd);

	            	if(!empty($_FILES['ttd']['name'])){
		                if ( ! $this->upload->do_upload('ttd')) {
		                    $this->session->set_flashdata('error','Tanda tangan tidak diterima!');
		                    redirect('profil/index/'.$this->session->userdata('id'));
		                }
		            	else {
		            		if ($data['ttd']->title!=NULL) {
		                		if (is_file('./assets/images/ttd/'.$data['ttd']->title)) {
		                		unlink('./assets/images/ttd/'.$data['ttd']->title);
		                		}
	                		}
		                    $ttd = $this->upload->data();
		                    $this->load->library('image_lib');
		                    $tanda=$ttd['file_name']; //ambil nama file yang terupload enkripsi
		                    $configd['image_library']='gd2';
		                    $configd['source_image']='./assets/images/ttd/'.$ttd['file_name'];
		                    $imageSize = $this->image_lib->get_image_properties($configd['source_image'], TRUE);
		                    $newSize = min($imageSize['height'], $imageSize['width']);
		                    $configd['new_image']= './assets/images/ttd/'.$ttd['file_name'];
		                    $configd['create_thumb']= FALSE;
		                    $configd['maintain_ratio']= FALSE;
		                    $configd['quality']= '60%';
		                    $this->image_lib->initialize($configd);
		                    $this->image_lib->resize();
		                    
		                    $datattd = array(
			                        'title'		=> $tanda,
	                    	);

	                    	$this->dbclients->updatettd($id, $datattd);
		                }
		            }
                    redirect('profil/index/'.$this->session->userdata('id'));
                }          
            } else {
            	$data['ttd'] =  $this->dbclients->getTtd($id);
            	$configd['upload_path'] = './assets/images/ttd';
            	$configd['allowed_types'] = 'jpg|png|jpeg';
            	$configd['max_size'] = 150;
            	$configd['encrypt_name'] = FALSE; //enkripsi nama file ketika upload
				$this->load->library('upload');
            	$this->upload->initialize($configd);

            	if(!empty($_FILES['ttd']['name'])){
	                if ( ! $this->upload->do_upload('ttd')) {
	                    $this->session->set_flashdata('error','Tanda tangan tidak diterima!');
	                    redirect('profil/index/'.$this->session->userdata('id'));
	                }
	            	else {
	            		if ($data['ttd']->title!=NULL) {
	                		if (is_file('./assets/images/ttd/'.$data['ttd']->title)) {
	                		unlink('./assets/images/ttd/'.$data['ttd']->title);
	                		}
                		}
	                    $ttd = $this->upload->data();
	                    $this->load->library('image_lib');
	                    $tanda=$ttd['file_name']; //ambil nama file yang terupload enkripsi
	                    $configd['image_library']='gd2';
	                    $configd['source_image']='./assets/images/ttd/'.$ttd['file_name'];
	                    $imageSize = $this->image_lib->get_image_properties($configd['source_image'], TRUE);
	                    $newSize = min($imageSize['height'], $imageSize['width']);
	                    $configd['new_image']= './assets/images/ttd/'.$ttd['file_name'];
	                    $configd['create_thumb']= FALSE;
	                    $configd['maintain_ratio']= FALSE;
	                    $configd['quality']= '60%';
	                    $this->image_lib->initialize($configd);
	                    $this->image_lib->resize();
	                    
	                    $datattd = array(
		                        'title'		=> $tanda,
                    	);

                    	$this->dbclients->updatettd($id, $datattd);
	                }
	            }

				$nama = set_value('nama');
				$data =	array(
							'nama'		=> htmlspecialchars($nama),
							'gender'	=> set_value('gender'),
							'telepon'	=> set_value('telepon'),
							'alamat'	=> htmlspecialchars(set_value('alamat'))
							);

				$this->dbclients->update($id, $data);
				$this->session->set_flashdata('done','Data Berhasil Diubah.');
				$this->session->set_userdata('nama', set_value('nama'));
				redirect('profil/index/'.$this->session->userdata('id'));
            }
		}
	}

	public function changePassword($id)
	{
        $level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}

		$this->form_validation->set_rules('current', 'Password Lama', 'required|trim|alpha_numeric');
		$this->form_validation->set_rules('pass', 'Password Baru', 'required|alpha_numeric|trim|min_length[8]');
		$this->form_validation->set_rules('repass', 'Konfirmasi Password', 'required|alpha_numeric|trim|matches[pass]');

		if ($this->form_validation->run() == FALSE)
		{
			$data['clients'] = $this->dbclients->search($id);
			if ($level==2) {
				$data['page'] = NULL;
				$data['subto'] = NULL;
				$data['col'] = $this->dbmenu->readCol();
				$data['menu'] = $this->dbmenu->readMenu();
				$data['sub'] = $this->dbmenu->readSub();
				$this->load->view('pageuser/changepass', $data);
			}
			else{
				$data['page'] = NULL;
				$data['subto'] = NULL;
				$data['col'] = $this->dbmenu->readCol();
				$data['menu'] = $this->dbmenu->readMenu();
				$data['sub'] = $this->dbmenu->readSub();
				$this->load->view('backend/changepass', $data);
			}
		} else {
			$password = set_value('current');
			$valid_user = $this->dblogin->read();
			if (password_verify($password, $valid_user->password) == FALSE) {
				$this->session->set_flashdata('error','Password Salah.');
				redirect('profil/changePassword/'.$this->session->userdata('id'));
			}else{
				$pass = set_value('pass');
				$input = password_hash($pass, PASSWORD_DEFAULT);
				$data =	array(
							'password' => $input
							);

				$this->dbclients->update($id, $data);
				$this->session->set_flashdata('done','Password Berhasil Diubah.');
				redirect('profil/changePassword/'.$this->session->userdata('id'));
			}
		}
	}
}
