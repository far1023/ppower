<?php 

class Pesan extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->model('dbpesan');
		$this->load->model('dbmenu');
		$this->load->helper('url');
        $this->load->library('pagination');
        $this->load->model('dbclients');
	}

	public function index()
	{
		redirect('pesan/showPesan');
	}

	public function showPesan($uname=FALSE) {
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}

		$data['pesan'] = $this->dbpesan->read();

		if ($level!=2) {
			$data['subto'] = NULL;
			$data['page'] = 'pesan/showPesan';
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$this->load->view('backend/show_pesan', $data);
		} else {
			$data['subto'] = NULL;
			$data['page'] = 'pesan/showPesan';
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$this->load->view('pageuser/tanya', $data);
		}
	}

	public function addPesan($data=FALSE) {
		$level = $this->session->userdata('level');

		$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('email', 'Email', 'required|alpha_dash');
		$this->form_validation->set_rules('perihal', 'Perihal', 'required|alpha_numeric_spaces');
		$this->form_validation->set_rules('pesan', 'Pesan', 'required|regex_match[/^[][a-zA-Z0-9@# ,().]/]');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Maaf terjadi kesalahan.');
			if ($level) {
				redirect('pesan/showPesan/'.$this->session->userdata('username'));
			} else{
			$this->load->view('beranda');
			}
		}
		else {
			$ubah = set_value('nama');
			$nama = ucwords(strtolower($ubah));
			$data =	array(
						'nama'		=> $nama,
						'email'		=> set_value('email'),
						'perihal'	=> set_value('perihal'),
						'pesan'		=> set_value('pesan'),
						'tanggal'	=> date('Y-m-d')
						);

			$this->dbpesan->create($data);
			if ($level!=2) {
				redirect('dashboard');
			}
			elseif ($level==2) {
				redirect('pesan/showPesan');
			}
			elseif (!$level) {
				redirect('welcome#contact');
			}
		}
	}

	public function editPesan($id) {
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}

		$this->form_validation->set_rules('jawab', 'Jawaban', 'required|trim');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Maaf terjadi kesalahan.');
			redirect('pesan/detail/'.$id);
		}
		else {
			$jawab = set_value('jawab');
			$data =	array(
						'jawab'	=> htmlspecialchars($jawab),
						);

			$this->dbpesan->update($id, $data);
			redirect('pesan/detail/'.$id);
		}
	}

	public function detail($id) {
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}

		$data['pesan'] = $this->dbpesan->search($id);
		$id = $data['pesan']->id;
		$namal = $data['pesan']->nama;
		$uname = $data['pesan']->email;
		$perihal = $data['pesan']->perihal;
		$isi = $data['pesan']->pesan;
		$tanggal = $data['pesan']->tanggal;
		$jawab = $data['pesan']->jawab;
		$data['punya'] = $this->dbclients->searchd($uname);
		if ($data['punya']) {
		$ada = 'isi';
		}else{
			$ada='';
		}
		$data = array (
			'punya' => $ada,
			'id' => $id,
			'namal' => $namal,
			'uname' => $uname,
			'perihal' => $perihal,
			'isi' => $isi,
			'tanggal' => $tanggal,
			'jawab' => $jawab,
		);
		$data['page'] = 'pesan/showPesan';
		$data['subto'] = NULL;
		$data['col'] = $this->dbmenu->readCol();
		$data['menu'] = $this->dbmenu->readMenu();
		$data['sub'] = $this->dbmenu->readSub();

		if ($level!=2) {
		$this->load->view('backend/isi_pesan', $data);
		}else {
			$this->load->view('pageuser/tanya_isi', $data);
		}
	}

	public function removePesan($id, $uname=FALSE)
	{
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		
		$this->dbpesan->delete($id);

		if (!$uname) {
			redirect('pesan/showPesan');	
		} else {
			redirect('pesan/showPesan/'.$uname);
		}
	}
}
?>