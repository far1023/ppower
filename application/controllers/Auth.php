<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	* The structure of Auth Class.
	* 
	* @class Auth
		+ @constructor
		+ @public login()
		+ @public logout()
	*
*/

	class Auth extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('Mclients');
		}

	/**
		* Login method
			loginAttempt is sent by ajax request from login page
			if loginAttempt is true, proceed to the username and password(hash) verification
			else show form login
		*
	*/
		public function login()	{
			if ($this->input->post('loginAttempt')) {
				$error = false;	
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required');

				if ($this->form_validation->run() == TRUE) {
					$valid = $this->Mclients->getByUsername();

					if ($valid) {					
						if(password_verify($this->input->post('password'), $valid->password)) {
							$error = false;	
							$this->session->set_userdata('nama', $valid->nama);
							$this->session->set_userdata('id', $valid->id);
							$this->session->set_userdata('level', $valid->level);
							$array = array(
								'error'	=> $error,
								'href'	=> site_url('home'),
								'msg'	=> "Login berhasil",
							);
						} else {
							$error = true;
							$array = array(
								'error'   => true,
								'msg' => "Data invalid",
							);
						}
					} else {
						$error = true;
						$array = array(
							'error'   => true,
							'msg' => "Data invalid",
						);
					}
				} else {
					$error = true;
					$array = array(
						'error'   => $error,
						'user_error'	=> form_error('username', '<span class="text-danger">', '</span>'),
						'pass_error' 	=> form_error('password', '<span class="text-danger">', '</span>'),
						'msg' => "",
					);	
				}
				echo json_encode($array);
			} else {
				$data['title']  = 'Halaman Login';

				$this->load->view('public/login', $data);
			}
		}

	/**
		* Logout method
			Simply destroy all session that has been registered
			+ nama
			+ id
			+ level
		*
	*/
		public function logout() {
			$this->session->sess_destroy();
			redirect(site_url('login'));
		}
	}

	/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */