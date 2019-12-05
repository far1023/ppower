<?php	
class Pembayaran extends CI_Controller {
	public function __construct() {
        parent::__construct();
		$this->load->model('dbbayar');
		$this->load->model('dbpeserta');
		$this->load->model('dbujian');
		$this->load->model('dblogin');
		$this->load->model('dbhasil');
		$this->load->model('dbmenu');
		$this->load->helper('url');
        $this->load->library('pagination');
    }

    public function index() {
		redirect(site_url('pembayaran/show'));
	}

	public function show() {
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses Ditolak !');
      		$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}

		$level = $this->session->userdata('level');

		$data['hasil'] = $this->dbbayar->read();

		if ($level!=2) {
			$data['page'] = 'pembayaran';
			$data['subto'] = NULL;
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$this->load->view('backend/show_bayar', $data);
		}
		elseif ($level==2) {
			$data['page'] = 'pembayaran/show';
			$data['subto'] = NULL;
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$this->load->view('pageuser/show_bayar', $data);
		}
	}

	public function open($id) {
		$level = $this->session->userdata('level');
      	if (!$level) {
      		$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}

		$data['peserta'] = $this->dbpeserta->search($id);
		if ($data['peserta']) {
			$data['tes']=$this->dbhasil->get($data['peserta']->id);
		}
		$data['hasil'] = $this->dbbayar->search($id);
		$ujian=$data['hasil']->ujian;
		$this->session->set_userdata('page', current_url());
		if ($level!=2) {
			$data['page'] = 'pembayaran';
			$data['subto'] = NULL;
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$this->load->view('backend/formulir', $data);
		}elseif ($level==2){
			$this->load->view('pageuser/invoice', $data);
		}
	}

	public function konfirm($id) {
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
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|alpha_dash');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Password Salah.');
			$back = $this->session->userdata('page', current_url());
			redirect($back);
		}
		else {
			$password = set_value('password');
			$username = $this->session->userdata('username');
			$ujian = $this->input->post('ujian');
			$idpes = $this->dbpeserta->getid($ujian);
			$idpay = $this->input->post('idpay');
			$string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $ujian);
                    // hilangkan spasi berlebihan dengan fungsi trim
            $trim=trim($string);
                    // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
            $pre_slug=strtolower(str_replace(" ", "-", $trim));
                    // tambahkan ektensi .html pada slug
            $slug=$pre_slug.'.html';
			$valid_user = $this->dblogin->read();
			if (password_verify($password, $valid_user->password)) {
				$ikut = array(
						'id' => $idpes,
						'id_bayar' => $idpay,
						'username' => set_value('username'),
						'nama' => set_value('nama'),
						'ukey' => set_value('ukey'),
						'ujian' => $slug,
						'tanggal' => date('Ymd'),
						'status' => 'Aktif',
				);
				$data =	array(
						'status' => 'Paid'
				);
				$this->dbpeserta->create($ikut);
				$this->dbbayar->update($id, $data);
				$this->session->unset_userdata('page');
				redirect('pembayaran/show');
			}
			else {
				$this->session->set_flashdata('error','Password salah.');
				$back = $this->session->userdata('page', current_url());
				redirect($back);
			}
		}
	}

	public function cancel($id) {
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
		
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|alpha_dash');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Password Salah.');
			$back = $this->session->userdata('page', current_url());
			redirect($back);
		}
		else {
			$password = set_value('password');
			$username = $this->session->userdata('username');
			$valid_user = $this->dblogin->read();
			if (password_verify($password, $valid_user->password)) {
				$data =	array(
					'status' => 'Pending'
				);

				$this->dbpeserta->delete($id);
				$this->dbbayar->update($id, $data);
				$this->session->unset_userdata('page');
				redirect('pembayaran/show');
			}
			else {
				$this->session->set_flashdata('error','Password salah.');
				$back = $this->session->userdata('page', current_url());
				redirect($back);
			}
		}
	}
}