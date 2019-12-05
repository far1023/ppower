<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Clients extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('dbclients');
		$this->load->helper('url');
		$this->load->model('dbmenu');
        $this->load->library('pagination');
		$this->load->model('dblogin');
	}

	public function index()
	{
		redirect(site_url('clients/showClients'));
	}

	public function showClients($cari=FALSE) {
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses Ditolak !');
      		$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		if ($level==2) {
			$this->session->unset_userdata('page');
			redirect(site_url('dashboard/profil'));
		}
		$data['clients'] = $this->dbclients->read($cari);
		$data['page'] = "clients/showClients";
		$data['subto'] = NULL;
		$data['col'] = $this->dbmenu->readCol();
		$data['menu'] = $this->dbmenu->readMenu();
		$data['sub'] = $this->dbmenu->readSub();
		$this->load->view('backend/show_clients', $data);
	}

	public function showOfficer($last_id=FALSE) {
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses Ditolak !');
      		$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		if ($level==2) {
			$this->session->unset_userdata('page');
			redirect(site_url('dashboard/profil'));
		}

		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|alpha_dash|is_unique[clients.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|alpha_dash');
		$this->form_validation->set_rules('repassword', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[40]');
		$this->form_validation->set_rules('level', 'Level', 'required|integer');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|integer');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|max_length[13]|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE)
		{
			$i = "showOfficer";
			$data['admin'] = $this->dbclients->read($i);
			$data['page'] = "clients/showOfficer";
			$data['subto'] = NULL;
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$this->load->view('backend/show_officer', $data);
		}
		else {
			$ubah = set_value('nama');
			$level = set_value('level');
			$password = set_value('password');
			$input = password_hash($password, PASSWORD_DEFAULT);
			$nama = ucwords(strtolower($ubah));
			$uname = set_value('username');
			$data =	array(
						'username'	=> $uname,
						'password'	=> $input,
						'level'		=> $level,
						'nama'		=> htmlspecialchars($nama),
						'gender'	=> set_value('gender'),
						'telepon'	=> set_value('telepon'),
						'alamat'	=> htmlspecialchars(set_value('alamat'))
						);
			$insert_id = $this->dbclients->create($data);
			$createGbr = $this->dbclients->searchd($uname);
			$datagbr = array(
		                'title'		=> '',          
		                'id_user'   => $createGbr->id,
		                'purpose'	=> 1,
            );
            $this->dbclients->creategbr($datagbr);

			if ($level==3) {
				$datattd = array(
			                'title'		=> '',          
			                'id_user'   => $createGbr->id,
			                'purpose'	=> 2,
	            );
	            $this->dbclients->createttd($datattd);
	        }
	        $this->session->set_flashdata('done','Data petugas berhasil ditambahkan.');		
			redirect('clients/showOfficer','refresh');
		}
	}

	public function addClients($data=FALSE) {
		$this->form_validation->set_rules('username', 'Username', 'required|trim|min_length[6]|alpha_dash|is_unique[clients.username]');
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|alpha_dash');
		$this->form_validation->set_rules('repassword', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim|max_length[40]');
		$this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|integer');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('telepon', 'Telepon', 'required|max_length[13]|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('daftar', $data);
		}
		else {
			$ubah = set_value('nama');
			$password = set_value('password');
			$input = password_hash($password, PASSWORD_DEFAULT);
			$nama = ucwords(strtolower($ubah));
			$uname = set_value('username');
			$data =	array(
						'username'	=> $uname,
						'password'	=> $input,
						'level'		=> 2,
						'nama'		=> htmlspecialchars($nama),
						'gender'	=> set_value('gender'),
						'telepon'	=> set_value('telepon'),
						'alamat'	=> htmlspecialchars(set_value('alamat'))
						);

			$cek['ada']=$this->dbclients->searchd($uname);
			if ($cek['ada']) {
				$this->session->set_flashdata('error','Maaf, Username <i class="fa fa-angle-left"></i>'.$uname.'<i class="fa fa-angle-right"></i> sudah terdaftar.');
				redirect('daftar','refresh');
			}

			$this->dbclients->create($data);

			$valid_user = $this->dblogin->read();
			if (password_verify($password, $valid_user->password)) {
			$this->session->set_userdata('username', $valid_user->username);
			$this->session->set_userdata('level', $valid_user->level);
			$this->session->set_userdata('nama', $valid_user->nama);
			$this->session->set_userdata('id', $valid_user->id);	
			$back = $this->session->userdata('page');
			
			$datagbr = array(
		                'title'		=> '',          
		                'id_user'   => $valid_user->id,
		                'purpose'	=> 1,
            );
            $this->dbclients->creategbr($datagbr);
            $this->session->set_userdata('avatar', 'img_avatar3.png');

			switch($valid_user->level){
				case 1 : //admin
					redirect('dashboard');
					break;
				case 2 : //member
					if ($back) {
						$this->session->unset_userdata('page');
						redirect($back);
					}
					else {
						$this->session->set_flashdata('notice','Selamat! Anda baru saja bergabung.');
						redirect('ujian/pilih');
					}
					break;
				default: break; 
			}	
			}
			else{
				redirect('auth','refresh');
				$this->session->set_flashdata('error','Wrong credentials');
			}
		}
	}
	
	public function editClients($id) {
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
			if ($level==2) {
				echo 'sini halamannya';
			}
			else{
			$data['page'] = "clients/showClients";
			$data['subto'] = NULL;
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$data['gambar'] = $this->dbclients->getGbr($id);
			$this->load->view('backend/form_editc', $data);
			}
		} else {
			$data['clients'] = $this->dbclients->search($id);
			$ubah = set_value('nama');
			$data =	array(
						'nama'		=> htmlspecialchars($ubah),
						'gender'	=> set_value('gender'),
						'telepon'	=> set_value('telepon'),
						'alamat'	=> htmlspecialchars(set_value('alamat'))
						);
			$this->dbclients->update($id, $data);
			$this->session->set_flashdata('done', 'Data berhasil diubah.');
			if ($data['clients']->level==2) {
				redirect('clients/showClients');
			}else{
				redirect('clients/showOfficer');
			}
		}
	}

	public function editOfficer($id) {
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
			if ($level==2) {
				echo 'sini halamannya';
			}
			else{
			$data['page'] = "clients/showOfficer";
			$data['subto'] = NULL;
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$data['gambar'] = $this->dbclients->getGbr($id);
			$this->load->view('backend/form_editc', $data);
			}
		} else {
			$ubah = set_value('nama');
			$nama = ucwords(strtolower($ubah));
			$data =	array(
						'nama'		=> htmlspecialchars($nama),
						'gender'	=> set_value('gender'),
						'telepon'	=> set_value('telepon'),
						'alamat'	=> htmlspecialchars(set_value('alamat'))
						);

			$this->dbclients->update($id, $data);
			$this->session->set_flashdata('done', 'Data berhasil diubah.');
			redirect('clients/showClients');
		}
	}
	
	public function removeClients($id)
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
		
		$cek=$this->dbclients->search($id);
		$cari=$cek->username;
		$this->load->model('dbpeserta');
		$data['cek']=$this->dbpeserta->predelete($cari);
		if ($data['cek']) {
			$this->session->set_flashdata('error', 'Client memiliki kepesertaan.');
			redirect('clients/showClients','refresh');
		}

		$this->dbclients->delete($id);
		$cekGbr = $this->dbclients->getGbr($id);
		if (is_file('./assets/images/avatar/'.$cekGbr->title)) {
            unlink('./assets/images/avatar/'.$cekGbr->title);
        }
		$this->dbclients->deletegbr($id);

		$this->load->model('dbbayar');
		$this->dbbayar->delete($cari);
		$this->session->set_flashdata('done', 'Data client telah dihapus.');
		redirect('clients/showClients');
	}
	
	public function removeOfficer($id)
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

		$this->load->model('dbhasil');
		$data['cek']=$this->dbhasil->predelete($id);
		if ($data['cek']) {
			$this->session->set_flashdata('error', 'Dokter telah memeriksa sebuah ujian.');
			redirect('clients/showOfficer','refresh');
		}
		
		$this->dbclients->delete($id);
		$cekGbr = $this->dbclients->getGbr($id);
		if (is_file('./assets/images/avatar/'.$cekGbr->title)) {
            unlink('./assets/images/avatar/'.$cekGbr->title);
        }
		$cekTtd = $this->dbclients->getTtd($id);
		if (is_file('./assets/images/ttd/'.$cekTtd->title)) {
            unlink('./assets/images/ttd/'.$cekTtd->title);
        }
		$this->dbclients->deletegbr($id);
		$this->session->set_flashdata('done', 'Data petugas telah dihapus.');
		redirect('clients/showOfficer');
	}
}
?>