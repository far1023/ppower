<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{	
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->cekLogin();
		}
		elseif ($level!=1) {
			$this->session->unset_userdata('page');
			redirect(site_url('ujian/pilih'));
		}
		elseif ($level==1) {
			$this->session->unset_userdata('page');
			redirect(site_url('dashboard'));
		}
	}

	public function cekLogin()
	{
		$this->form_validation->set_rules('username','Username','required|alpha_dash|trim');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric|trim');

		if($this->form_validation->run() == FALSE)
		{	
			$this->load->view('formlogin');
		} else 
		{
			$this->load->model('dblogin');
			$this->load->model('dbclients');
			$password = set_value('password');
			$valid_user = $this->dblogin->read();

			if(password_verify($password, $valid_user->password) == FALSE || !$valid_user)
			{
				$this->session->set_flashdata('error','Data Login Invalid.');
				redirect('auth');
			} else {
				$this->session->set_userdata('username', $valid_user->username);
				$this->session->set_userdata('level', $valid_user->level);
				$this->session->set_userdata('nama', $valid_user->nama);				
				$this->session->set_userdata('id', $valid_user->id);
				$cekGbr = $this->dbclients->getGbr($valid_user->id);
				if ($cekGbr->title) {
					$this->session->set_userdata('avatar', $cekGbr->title);
				} else {
					$this->session->set_userdata('avatar', 'img_avatar3.png');
				}
				$back = $this->session->userdata('page');

				if ($this->session->userdata('level')==1) {
					if (!$back) {
						redirect('dashboard');
					} else {
						redirect($back);
					}
				}
				elseif ($this->session->userdata('level')==2) {
					if (!$back) {
						redirect('artikel');
					} else {
						redirect($back);
					}
				}
				elseif ($this->session->userdata('level')==3) {
					if (!$back) {
						redirect('dashboard');
					} else {
						redirect($back);
					}
				}
			}
		}
	}

	public function start()
	{
		$this->form_validation->set_rules('username','Username','required|alpha_dash');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');
		$this->form_validation->set_rules('ukey','Ukey peserta','required|alpha_numeric');

		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','Akses Ditolak !');
			redirect(site_url('auth'));
		}
		elseif ($level==1) {
			redirect(site_url('dashboard'));
		}
		elseif ($this->session->userdata('idpes')!=NULL){
			redirect('ujian/mulai');
		}

		if($this->form_validation->run() == FALSE){	
			$this->load->view('pageuser/portal');
		} 
		else {
			$this->load->model('dblogin');
			$this->load->model('dbclients');
			$this->load->model('dbpeserta');
			$username = set_value('username');
			$ukey = set_value('ukey');
			$password = set_value('password');
			$valid_user = $this->dblogin->read();
			$valid_pes = $this->dbpeserta->cek();
			if(password_verify($password, $valid_user->password) == FALSE){
				$this->session->set_flashdata('error','Password salah.');
				redirect('auth/start');
			} 
			elseif (!$valid_pes) {
				$this->session->set_flashdata('error','Peserta tidak sah.');
				redirect('auth/start');
			}
			else {
				$this->session->set_userdata('idpes', $valid_pes->id);
				$this->session->set_userdata('namapes', $valid_pes->nama);
				$this->session->set_userdata('userpes', $valid_pes->username);
				$this->session->set_userdata('ujian', $valid_pes->ujian);
				$this->session->set_userdata('status', $valid_pes->status);
				redirect('ujian/mulai');
			}
		}
	}

	public function selesai()
	{
		$hapus = array('idpes', 'namapes', 'userpes', 'ujian');
		$this->session->unset_userdata($hapus);
		redirect(site_url('auth/start'));
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('auth'));
	}
}