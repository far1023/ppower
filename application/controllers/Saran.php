<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dbsaran');
		//Do your magic here
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
	}

	public function delete($id) {
		$data =	array(
					'deskripsi'		=> '',
					);

		$this->dbsaran->delete($id, $data);
		redirect('ujian/hasil');
	}

	public function update($idupdate) {
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		if ($this->form_validation->run() == FALSE) {
			redirect('ujian/hasil');
		} else {
			$data =	array(
						'deskripsi'	=> htmlspecialchars(set_value('deskripsi')),
						);

			$this->dbsaran->update($idupdate, $data);
			redirect('ujian/hasil');
		}
	}
}

/* End of file menu_settings.php */
/* Location: ./application/controllers/menu_settings.php */

?>