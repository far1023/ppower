<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dbsoalbayi');
		$this->load->model('dbmenu');	
		$this->load->helper('url');
		$this->load->library('pagination');

		//Load Dependencies
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
	}

	// List all your items
	public function index()
	{
		$data['isi'] = $this->dbsoalbayi->read();
		$data['subto'] = 'tumbuh-balita.html';
		$data['page'] = 'quiz';
		$data['col'] = $this->dbmenu->readCol();
		$data['menu'] = $this->dbmenu->readMenu();
		$data['sub'] = $this->dbmenu->readSub();
		$main = $data['subto'];
		$data['cekmain'] = $this->dbmenu->getmain($main);
		$mainid = $data['cekmain']->id;
		$data['ceksub'] = $this->dbmenu->getsub($mainid);

		$this->session->set_userdata('page', current_url());
		$this->load->view('backend/quizlist', $data);
	}

	// Add a new item
	public function add()
	{
		$this->form_validation->set_rules('soal', 'Deskripsi Penilaian', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opsa', 'A', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opsb', 'B', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opsc', 'C', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opsd', 'D', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opse', 'E', 'required|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Maaf terjadi kesalahan.');
			$this->load->view('quiz', $data);
		}
		else {
			$soal = $this->input->post('soal');
			$opsa = $this->input->post('opsa');
			$opsb = $this->input->post('opsb');
			$opsc = $this->input->post('opsc');
			$opsd = $this->input->post('opsd');
			$opse = $this->input->post('opse');
			$data =	array(
				'soal'	=> $soal,
				'opsa'	=> $opsa,
				'opsb'	=> $opsb,
				'opsc'	=> $opsc,
				'opsd'	=> $opsd,
				'opse'	=> $opse,
			);
			$this->dbsoalbayi->create($data);
			redirect(site_url('quiz'));
		}
	}

	//Update one item
	public function open($id)
	{
		$this->form_validation->set_rules('soal', 'Deskripsi Penilaian', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opsa', 'A', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opsb', 'B', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opsc', 'C', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opsd', 'D', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('opse', 'E', 'required|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE)
		{
			$data['isi'] = $this->dbsoalbayi->search($id);
			$data['subto'] = 'tumbuh-balita.html';
			$data['page'] = 'quiz';
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$main = $data['subto'];
			$data['cekmain'] = $this->dbmenu->getmain($main);
			$mainid = $data['cekmain']->id;
			$data['ceksub'] = $this->dbmenu->getsub($mainid);

			$this->load->view('backend/quizedit', $data);
		} else {
			$soal = set_value('soal');
			$opsa = set_value('opsa');
			$opsb = set_value('opsb');
			$opsc = set_value('opsc');
			$opsd = set_value('opsd');
			$opse = set_value('opse');
			$data =	array(
						'soal'	=> $soal,
						'opsa'	=> $opsa,
						'opsb'	=> $opsb,
						'opsc'	=> $opsc,
						'opsd'	=> $opsd,
						'opse'	=> $opse,
					);

			$this->dbsoalbayi->update($id, $data);
			$back=$this->session->userdata('page');
			redirect($back);
		}
	}

	//Delete one item
	public function delete($id)
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
		
		$this->dbsoalbayi->delete($id);
		redirect('quiz');
	}
}

/* End of file quiz.php */
/* Location: ./application/controllers/quiz.php */

?>