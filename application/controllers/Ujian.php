<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dbujian');
		$this->load->model('dbbank');		
		$this->load->model('dbjurusan');
		$this->load->model('dbhasil');
		$this->load->model('dbpeserta');
		$this->load->model('dbclients');
		$this->load->model('dbsoalbayi');
		$this->load->model('dbsaran');
		$this->load->model('dbmenu');		
		$this->load->helper('url');
		$this->load->library('pagination');
	}

	public function mulai($action='')
	{
		$level = $this->session->userdata('level');
		$pes = $this->session->userdata('idpes');
		if (!$level) {
			$this->session->set_flashdata('error','Akses Ditolak !');
			redirect(site_url('auth'));
		}
		elseif ($level!=2) {
			redirect('dashboard');
		}
		elseif ($level==2 && $pes==NULL){
			$this->session->set_flashdata('error','Peserta tidak sah !');
			redirect(site_url('auth/start'));
		}
		elseif ($pes!=NULL && !$action) {
			$this->load->view('pageuser/ready');
		}

		if ($action=="tumbuh-balita.html") {
			$data['isi'] = $this->dbsoalbayi->read();
			$this->load->view('pageuser/kertas_ujian', $data);
		}
	}

	public function pilih()
	{	
		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','Akses Ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		if ($level!=2) {
			$this->session->unset_userdata('page');
			redirect(site_url('dashboard'));
		}

		$data['ujian'] = $this->dbujian->read();
		$data['subto'] = NULL;
		$data['page'] = "ujian/pilih";
		$data['col'] = $this->dbmenu->readCol();
		$data['menu'] = $this->dbmenu->readMenu();
		$data['sub'] = $this->dbmenu->readSub();
		$this->load->view('pageuser/pilih', $data);
	}

	public function index()
	{
		redirect(site_url('ujian/daftar'));
	}

	public function addUjian() {
		$this->form_validation->set_rules('nama', 'Nama Ujian', 'required|trim|alpha_numeric_spaces');
		$this->form_validation->set_rules('biaya', 'Biaya Ujian', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Maaf terjadi kesalahan.');
			$this->load->view('pageuser/daftar_ujian', $data);
		}
		else {
			$nama = $this->input->post('nama');
			$string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $nama);
                    // hilangkan spasi berlebihan dengan fungsi trim
			$trim=trim($string);
                    // hilangkan spasi, kemudian ganti spasi dengan tanda strip (-)
			$pre_slug=strtolower(str_replace(" ", "-", $trim));
                    // tambahkan ektensi .html pada slug
			$slug=$pre_slug.'.html';
			$data =	array(
				'nama'	=> set_value('nama'),
				'slug'	=> $slug,
				'biaya'	=> set_value('biaya'),
			);
			$this->dbujian->create($data);
			redirect(site_url('dashboard'));
		}
	}

	public function removeUjian($id)
	{
		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		if ($level==2) {
			redirect(site_url('dashboard/profil'));
		}
		
		$this->dbujian->delete($id);
		redirect('dashboard');
	}

//-------------------------------------- USER ---------------------------------------------------------------
//-------------------------------------- USER ---------------------------------------------------------------
//-------------------------------------- USER ---------------------------------------------------------------
//-------------------------------------- USER ---------------------------------------------------------------
//-------------------------------------- USER ---------------------------------------------------------------

	public function daftar($slug=FALSE)
	{
		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','User tidak terdaftar.');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		if ($level!=2) {
			$this->session->unset_userdata('page');
			redirect(site_url('dashboard'));
		}

		$this->form_validation->set_rules('atnam', 'Pembayaran atas Nama', 'required|trim');
		$this->form_validation->set_rules('bank', 'Nama Bank', 'required|trim|alpha_numeric_spaces');

		if ($this->form_validation->run() == FALSE) {
			$this->db->select('RIGHT(pembayaran.id,4) as max',FALSE);
			$this->db->where('tanggal','CURDATE()',FALSE);
			$query=$this->db->get('pembayaran');
			$kd="";
			if ($query->num_rows()>0) {
				foreach ($query->result() as $value) {
					$kd=intval($value->max)+1;
				}
			}else {
				$kd=1;
			}
			$kd_max=str_pad($kd,4,"0",STR_PAD_LEFT);
			date_default_timezone_set('Asia/Jakarta');
			$date=date('dmy');
			$data['idpay'] = "PAY".$date.$kd_max;
			$data['ujian'] = $this->dbujian->search($slug);
			$data['bank'] = $this->dbbank->read();
			$this->session->set_userdata('page', current_url());	
			$this->load->view('pageuser/daftar_ujian', $data);
		} 
		else {
			$kode = $this->input->post('kode');
			$username = $this->input->post('username');
	        $nama = $this->input->post('nama');
			$ujian = $this->input->post('ujian');
			$string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $ujian);
	        $trim=trim($string);
	        $pre_slug=strtolower(str_replace(" ", "-", $trim));
	        $slug=$pre_slug.'.html';
			$total = $this->dbujian->search($slug);
	        $bank = $this->input->post('bank');
	        $atnam = $this->input->post('atnam');
	        $nasabah = htmlspecialchars(ucwords(strtolower($atnam)));
	        $tf = $bank.' a/n '.$nasabah;

	        $data = array(
	        	'id' => $kode,
	            'tanggal' => date('Ymd'),
	            'username' => $username,
	            'nama' => htmlspecialchars($nama),
	            'ujian' => $ujian,
	            'total' => $total->biaya,
	            'tf' => $tf,
	            'status' => 'Pending'
	        );

	        $this->dbujian->bayar($data);
			redirect(site_url('pembayaran/show'));
		}
	}

//----------------------------------------- CRUD PROFIL -----------------------------------------------------
//----------------------------------------- CRUD PROFIL -----------------------------------------------------
//----------------------------------------- CRUD PROFIL -----------------------------------------------------
//----------------------------------------- CRUD PROFIL -----------------------------------------------------
//----------------------------------------- CRUD PROFIL -----------------------------------------------------

	public function jurusan() {
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

		$this->form_validation->set_rules('nama', 'Nama Jurusan', 'required|alpha_numeric_spaces|trim');
		$this->form_validation->set_rules('se', 'SE', 'required|numeric');
		$this->form_validation->set_rules('wa', 'WA', 'required|numeric');
		$this->form_validation->set_rules('an', 'AN', 'required|numeric');
		$this->form_validation->set_rules('ge', 'GE', 'required|numeric');
		$this->form_validation->set_rules('ra', 'RA', 'required|numeric');
		$this->form_validation->set_rules('zr', 'ZR', 'required|numeric');
		$this->form_validation->set_rules('fa', 'FA', 'required|numeric');
		$this->form_validation->set_rules('wu', 'WU', 'required|numeric');
		$this->form_validation->set_rules('me', 'ME', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$data['jur'] = $this->dbjurusan->read();
			$data['subto'] = 'jurusan-kuliah.html';
			$data['page'] = "ujian/jurusan";
			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$main = $data['subto'];
			$data['cekmain'] = $this->dbmenu->getmain($main);
			$mainid = $data['cekmain']->id;
			$data['ceksub'] = $this->dbmenu->getsub($mainid);
			$this->load->view('backend/jurusan', $data);
		}
		else {
			$nama = $this->input->post('nama');
			$se = $this->input->post('se');
			$wa = $this->input->post('wa');
			$an = $this->input->post('an');
			$ge = $this->input->post('ge');
			$ra = $this->input->post('ra');
			$zr = $this->input->post('zr');
			$fa = $this->input->post('fa');
			$wu = $this->input->post('wu');
			$me = $this->input->post('me');
			$data =	array(
				'nama'	=> $nama,
				'se'	=> $se,
				'wa'	=> $wa,
				'an'	=> $an,
				'ge'	=> $ge,
				'ra'	=> $ra,
				'zr'	=> $zr,
				'fa'	=> $fa,
				'wu'	=> $wu,
				'me'	=> $me,
			);
			$this->dbjurusan->create($data);
            $this->session->set_flashdata('done', 'Profil jurusan '.$nama.' berhasil ditambah.');
			redirect(site_url('ujian/jurusan'));
		}
	}

	public function removeJurusan($id) {
		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		if ($level==2) {
			redirect(site_url('dashboard/profil'));
		}
		
		$this->dbjurusan->delete($id);
        $this->session->set_flashdata('done', 'Profil jurusan '.$nama.' telah dihapus.');
		redirect('ujian/jurusan');
	}

public function myAlpha($string){
	if (!preg_match('/^[a-z .,\-]+$/i', $string)) {
		return false;
	}
}

	public function jurusanEdit($id) {
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

		$this->form_validation->set_rules('nama', 'Nama Jurusan', 'required|alpha_numeric_spaces|trim');
		$this->form_validation->set_rules('se', 'SE', 'required|numeric');
		$this->form_validation->set_rules('wa', 'WA', 'required|numeric');
		$this->form_validation->set_rules('an', 'AN', 'required|numeric');
		$this->form_validation->set_rules('ge', 'GE', 'required|numeric');
		$this->form_validation->set_rules('ra', 'RA', 'required|numeric');
		$this->form_validation->set_rules('zr', 'ZR', 'required|numeric');
		$this->form_validation->set_rules('fa', 'FA', 'required|numeric');
		$this->form_validation->set_rules('wu', 'WU', 'required|numeric');
		$this->form_validation->set_rules('me', 'ME', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{

			$data['col'] = $this->dbmenu->readCol();
			$data['menu'] = $this->dbmenu->readMenu();
			$data['sub'] = $this->dbmenu->readSub();
			$data['page'] = 'ujian/jurusan';
			$data['subto'] = 'jurusan-kuliah.html';
			$data['jurusan'] = $this->dbjurusan->search($id);
			$this->load->view('backend/editjur', $data);
		} else {
			$nama = $this->input->post('nama');
			$se = $this->input->post('se');
			$wa = $this->input->post('wa');
			$an = $this->input->post('an');
			$ge = $this->input->post('ge');
			$ra = $this->input->post('ra');
			$zr = $this->input->post('zr');
			$fa = $this->input->post('fa');
			$wu = $this->input->post('wu');
			$me = $this->input->post('me');
			$data =	array(
				'nama'	=> $nama,
				'se'	=> $se,
				'wa'	=> $wa,
				'an'	=> $an,
				'ge'	=> $ge,
				'ra'	=> $ra,
				'zr'	=> $zr,
				'fa'	=> $fa,
				'wu'	=> $wu,
				'me'	=> $me,
			);

			$this->dbjurusan->update($id, $data);
        $this->session->set_flashdata('done', 'Profil jurusan '.$nama.' berhasil diubah.');
			redirect('ujian/jurusan');
		}
	}

//----------------------------------------- LIST PESERTA ----------------------------------------------------
//----------------------------------------- LIST PESERTA ----------------------------------------------------
//----------------------------------------- LIST PESERTA ----------------------------------------------------
//----------------------------------------- LIST PESERTA ----------------------------------------------------
//----------------------------------------- LIST PESERTA ----------------------------------------------------

	public function peserta($uname=FALSE) {
		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','Akses Ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		
		$ujian = $this->uri->segment(3);
		$aku = $uname;
		$data['peserta'] = $this->dbpeserta->read($ujian);
		$data['col'] = $this->dbmenu->readCol();
		$data['menu'] = $this->dbmenu->readMenu();
		$data['sub'] = $this->dbmenu->readSub();
		if ($level==2) {
			$data['page'] = 'ujian/peserta';
			$data['subto'] = NULL;
			$this->load->view('pageuser/peserta', $data);
		}
		elseif ($level!=2) {
			if ($ujian=='jurusan-kuliah.html') {
				$data['subto'] = 'jurusan-kuliah.html';
				$data['page'] = 'ujian/peserta/jurusan-kuliah.html';
				$main = $data['subto'];
				$data['cekmain'] = $this->dbmenu->getmain($main);
				$mainid = $data['cekmain']->id;
				$data['ceksub'] = $this->dbmenu->getsub($mainid);
				$this->load->view('backend/jurusan_peserta', $data);
			}
			elseif ($ujian=='tumbuh-balita.html') {
				$data['subto'] = 'tumbuh-balita.html';
				$data['page'] = 'ujian/peserta/tumbuh-balita.html';
				$main = $data['subto'];
				$data['cekmain'] = $this->dbmenu->getmain($main);
				$mainid = $data['cekmain']->id;
				$data['ceksub'] = $this->dbmenu->getsub($mainid);
				$this->load->view('backend/bayi_peserta', $data);
			}
		}
	}

//-------------------------------------------- CRUD HASIL ---------------------------------------------------
//-------------------------------------------- CRUD HASIL ---------------------------------------------------
//-------------------------------------------- CRUD HASIL ---------------------------------------------------
//-------------------------------------------- CRUD HASIL ---------------------------------------------------
//-------------------------------------------- CRUD HASIL ---------------------------------------------------

	public function hasil($cari=FALSE, $uname=FALSE) {
		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','Akses Ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		if ($level==2) {
			$aku = $uname;
		}

		$this->load->model('dbsaran');
		$data['val'] = $this->dbpeserta->test();
		$data['hasil'] = $this->dbhasil->read();
		$data['col'] = $this->dbmenu->readCol();
		$data['menu'] = $this->dbmenu->readMenu();
		$data['sub'] = $this->dbmenu->readSub();

		if ($level==2) {
			$data['doc'] = $this->dbclients->allDoc();
			$data['subto'] = 'hasil-tes.html';
			$data['page'] = 'ujian/hasil';
			$this->load->view('pageuser/show_hasil', $data);
		}
		elseif ($level!=2) {
			$data['doc'] = $this->dbclients->allDoc();
			$data['subto'] = 'jurusan-kuliah.html';
			$data['page'] = 'ujian/hasil';
			$main = $data['subto'];
			$data['cekmain'] = $this->dbmenu->getmain($main);
			$mainid = $data['cekmain']->id;
			$data['ceksub'] = $this->dbmenu->getsub($mainid);
			$data['saran'] = $this->dbsaran->read();
			$id = $this->session->userdata('id');
			$data['ttd'] = $this->dbclients->getTtd($id);
			$this->load->view('backend/hasil', $data);
		}
	}

	public function input() {
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

		$this->form_validation->set_rules('id', 'No Peserta', 'required|alpha_dash');
		$this->form_validation->set_rules('se', 'Nilai SE', 'required|numeric');
		$this->form_validation->set_rules('wa', 'Nilai WA', 'required|numeric');
		$this->form_validation->set_rules('an', 'Nilai AN', 'required|numeric');
		$this->form_validation->set_rules('ge', 'Nilai GE', 'required|numeric');
		$this->form_validation->set_rules('ra', 'Nilai RA', 'required|numeric');
		$this->form_validation->set_rules('zr', 'Nilai ZR', 'required|numeric');
		$this->form_validation->set_rules('fa', 'Nilai FA', 'required|numeric');
		$this->form_validation->set_rules('wu', 'Nilai WU', 'required|numeric');
		$this->form_validation->set_rules('me', 'Nilai ME', 'required|numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('error','Maaf terjadi kesalahan.');
			redirect(site_url('ujian/hasil'));
		}
		else {
			$id = $this->input->post('id');
			$cari = $id;
			$data['peserta'] = $this->dbpeserta->getinfo($cari);
			$se = $this->input->post('se');
			$wa = $this->input->post('wa');
			$an = $this->input->post('an');
			$ge = $this->input->post('ge');
			$ra = $this->input->post('ra');
			$zr = $this->input->post('zr');
			$fa = $this->input->post('fa');
			$wu = $this->input->post('wu');
			$me = $this->input->post('me');
			$v['idpes'] = $this->dbhasil->getid();
			$vtemp = $v['idpes'];

			if (!$data['peserta']) {
				$data =	array(
					'id_peserta' => 'M'.$vtemp,
					'username'	=> $id,
					'nama'	=> $id,
					'se'	=> $se,
					'wa'	=> $wa,
					'an'	=> $an,
					'ge'	=> $ge,
					'ra'	=> $ra,
					'zr'	=> $zr,
					'fa'	=> $fa,
					'wu'	=> $wu,
					'me'	=> $me,
				);
				$this->dbhasil->create($data);
			}
			else {
				foreach ($data['peserta'] as $value) {
					$data =	array(
						'id_peserta' => $id,
						'username'	=> $value->username,
						'nama'	=> $value->nama,
						'se'	=> $se,
						'wa'	=> $wa,
						'an'	=> $an,
						'ge'	=> $ge,
						'ra'	=> $ra,
						'zr'	=> $zr,
						'fa'	=> $fa,
						'wu'	=> $wu,
						'me'	=> $me,
					);
					$this->dbhasil->create($data);
					$ubah =	array(
						'tanggal' => date('Ymd'),
						'status' => 'Selesai',
					);
					$this->dbpeserta->update($id, $ubah);
				}
			}
			redirect('ujian/hasil'); 
		}
	}

	public function removeHasil($id) {
		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','Akses ditolak !');
			$this->session->set_userdata('page', current_url());
			redirect(site_url('auth'));
		}
		if ($level==2) {
			redirect(site_url('dashboard/profil'));
		}
		
		$ubah = array(
			'tanggal' => date('Ymd'),
			'status' => 'Aktif',
		);
		$data['peserta']=$this->dbhasil->getinfo($id);
		$idpes=$data['peserta']->id_peserta;
		$this->dbpeserta->update($idpes, $ubah);
		$this->dbhasil->delete($id);
		redirect('ujian/hasil');
	}

	public function myUjian($id, $action='', $array='') {
		$data['peserta']=$this->dbhasil->getinfo($id);

		if (!$data['peserta']) {
			redirect('ujian/hasil');
		}

		$idpes=$data['peserta']->id_peserta;
		$data['ujianku'] = $this->dbhasil->get($idpes);
		$uname = $data['ujianku']->username;
		$data['diri'] = $this->dbclients->searchd($uname);
		$data['peserta'] = $this->dbpeserta->search($idpes);

		$idpeserta = $data['ujianku']->id_peserta;
		$nama = $data['ujianku']->nama;
		if ($data['diri']) {
			$gender = $data['diri']->gender;
		} else {
			$gender = 'N/A';
		}
		
		if ($data['peserta']) {
			$tanggal = $data['peserta']->tanggal;
		} else {
			$tanggal = date('Y-m-d');
		}

		$se = $data['ujianku']->se;
		$wa = $data['ujianku']->wa;
		$an = $data['ujianku']->an;
		$ge = $data['ujianku']->ge;
		$ra = $data['ujianku']->ra;
		$zr = $data['ujianku']->zr;
		$fa = $data['ujianku']->fa;
		$wu = $data['ujianku']->wu;
		$me = $data['ujianku']->me;
		$array = array();

			// Tahap pertama ubah ke Norma
			// norma SE
		if ($se<=3) {$s=1;}
		elseif (4<=$se && $se<=7) {$s=2;}
		elseif (8<=$se && $se<=11) {$s=3;}
		elseif (12<=$se && $se<=15) {$s=4;}
		elseif (16<=$se && $se<=20) {$s=5;}
		if ($s<3) {
			$sub="SE"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
			// norma WA
		if ($wa<=3) {$w=1;}
		elseif (4<=$wa && $wa<=7) {$w=2;}
		elseif (8<=$wa && $wa<=11) {$w=3;}
		elseif (12<=$wa && $wa<=15) {$w=4;}
		elseif (16<=$wa && $wa<=20) {$w=5;}
		if ($w<3) {
			$sub="WA"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
			// norma AN
		if ($an<=3) {$a=1;}
		elseif (4<=$an && $an<=7) {$a=2;}
		elseif (8<=$an && $an<=11) {$a=3;}
		elseif (12<=$an && $an<=15) {$a=4;}
		elseif (16<=$an && $an<=20) {$a=5;}
		if ($a<3) {
			$sub="AN"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
			// norma GE
		if ($ge<=3) {$g=1;}
		elseif (4<=$ge && $ge<=8) {$g=2;}
		elseif (9<=$ge && $ge<=16) {$g=3;}
		elseif (17<=$ge && $ge<=24) {$g=4;}
		elseif (25<=$ge && $ge<=32) {$g=5;}
		if ($g<3) {
			$sub="GE"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
			// norma RA
		if ($ra<=3) {$r=1;}
		elseif (4<=$ra && $ra<=6) {$r=2;}
		elseif (7<=$ra && $ra<=11) {$r=3;}
		elseif (12<=$ra && $ra<=15) {$r=4;}
		elseif (16<=$ra && $ra<=20) {$r=5;}
		if ($r<3) {
			$sub="RA"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
			// norma ZR
		if ($zr<=3) {$z=1;}
		elseif (4<=$zr && $zr<=6) {$z=2;}
		elseif (7<=$zr && $zr<=11) {$z=3;}
		elseif (12<=$zr && $zr<=15) {$z=4;}
		elseif (16<=$zr && $zr<=20) {$z=5;}
		if ($z<3) {
			$sub="ZR"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
			// norma FA
		if ($fa<=3) {$f=1;}
		elseif (4<=$fa && $fa<=7) {$f=2;}
		elseif (8<=$fa && $fa<=11) {$f=3;}
		elseif (12<=$fa && $fa<=15) {$f=4;}
		elseif (16<=$fa && $fa<=20) {$f=5;}
		if ($f<3) {
			$sub="FA"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
			// norma WU
		if ($wu<=3) {$u=1;}
		elseif (4<=$wu && $wu<=7) {$u=2;}
		elseif (8<=$wu && $wu<=11) {$u=3;}
		elseif (12<=$wu && $wu<=15) {$u=4;}
		elseif (16<=$wu && $wu<=20) {$u=5;}
		if ($u<3) {
			$sub="WU"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
			// norma ME
		if ($me<=3) {$m=1;}
		elseif (4<=$me && $me<=7) {$m=2;}
		elseif (8<=$me && $me<=11) {$m=3;}
		elseif (12<=$me && $me<=15) {$m=4;}
		elseif (16<=$me && $me<=20) {$m=5;}
		if ($m<3) {
			$sub="ME"; $data['saran']=$this->dbsaran->get($sub);
			$array[] = $data['saran']->deskripsi;
		}
		// tentukan saran

		$data['jurusan'] = $this->dbjurusan->read();
		$dt = array();
		$i = 0;
		foreach ($data['jurusan'] as $value) {
			$satu 	  = $s-$value->se;
			$dua	  = $w-$value->wa;
			$tiga	  = $a-$value->an;
			$empat	  = $g-$value->ge;
			$lima	  = $r-$value->ra;
			$enam	  = $z-$value->zr;
			$tujuh	  = $f-$value->fa;
			$delapan  = $u-$value->wu;
			$sembilan = $m-$value->me;

				// Tahap ketiga penentuan bobot dari GAP
				// Bobot gap SE
			if ($satu==0) {$gsatu=5;}
			elseif ($satu==1) {$gsatu=4.5;}
			elseif ($satu==-1) {$gsatu=4;}
			elseif ($satu==2) {$gsatu=3.5;}
			elseif ($satu==-2) {$gsatu=3;}
			elseif ($satu==3) {$gsatu=2.5;}
			elseif ($satu==-3) {$gsatu=2;}
			elseif ($satu==4) {$gsatu=1.5;}
			elseif ($satu==-4) {$gsatu=1;}
				// Bobot gap WA
			if ($dua==0) {$gdua=5;}
			elseif ($dua==1) {$gdua=4.5;}
			elseif ($dua==-1) {$gdua=4;}
			elseif ($dua==2) {$gdua=3.5;}
			elseif ($dua==-2) {$gdua=3;}
			elseif ($dua==3) {$gdua=2.5;}
			elseif ($dua==-3) {$gdua=2;}
			elseif ($dua==4) {$gdua=1.5;}
			elseif ($dua==-4) {$gdua=1;}
				// Bobot gap AN
			if ($tiga==0) {$gtiga=5;}
			elseif ($tiga==1) {$gtiga=4.5;}
			elseif ($tiga==-1) {$gtiga=4;}
			elseif ($tiga==2) {$gtiga=3.5;}
			elseif ($tiga==-2) {$gtiga=3;}
			elseif ($tiga==3) {$gtiga=2.5;}
			elseif ($tiga==-3) {$gtiga=2;}
			elseif ($tiga==4) {$gtiga=1.5;}
			elseif ($tiga==-4) {$gtiga=1;}
				// Bobot gap GE
			if ($empat==0) {$gempat=5;}
			elseif ($empat==1) {$gempat=4.5;}
			elseif ($empat==-1) {$gempat=4;}
			elseif ($empat==2) {$gempat=3.5;}
			elseif ($empat==-2) {$gempat=3;}
			elseif ($empat==3) {$gempat=2.5;}
			elseif ($empat==-3) {$gempat=2;}
			elseif ($empat==4) {$gempat=1.5;}
			elseif ($empat==-4) {$gempat=1;}
				// Bobot gap RA
			if ($lima==0) {$glima=5;}
			elseif ($lima==1) {$glima=4.5;}
			elseif ($lima==-1) {$glima=4;}
			elseif ($lima==2) {$glima=3.5;}
			elseif ($lima==-2) {$glima=3;}
			elseif ($lima==3) {$glima=2.5;}
			elseif ($lima==-3) {$glima=2;}
			elseif ($lima==4) {$glima=1.5;}
			elseif ($lima==-4) {$glima=1;}
				// Bobot gap ZR
			if ($enam==0) {$genam=5;}
			elseif ($enam==1) {$genam=4.5;}
			elseif ($enam==-1) {$genam=4;}
			elseif ($enam==2) {$genam=3.5;}
			elseif ($enam==-2) {$genam=3;}
			elseif ($enam==3) {$genam=2.5;}
			elseif ($enam==-3) {$genam=2;}
			elseif ($enam==4) {$genam=1.5;}
			elseif ($enam==-4) {$genam=1;}
				// Bobot FA
			if ($tujuh==0) {$gtujuh=5;}
			elseif ($tujuh==1) {$gtujuh=4.5;}
			elseif ($tujuh==-1) {$gtujuh=4;}
			elseif ($tujuh==2) {$gtujuh=3.5;}
			elseif ($tujuh==-2) {$gtujuh=3;}
			elseif ($tujuh==3) {$gtujuh=2.5;}
			elseif ($tujuh==-3) {$gtujuh=2;}
			elseif ($tujuh==4) {$gtujuh=1.5;}
			elseif ($tujuh==-4) {$gtujuh=1;}
				// Bobot gap WU
			if ($delapan==0) {$gdelapan=5;}
			elseif ($delapan==1) {$gdelapan=4.5;}
			elseif ($delapan==-1) {$gdelapan=4;}
			elseif ($delapan==2) {$gdelapan=3.5;}
			elseif ($delapan==-2) {$gdelapan=3;}
			elseif ($delapan==3) {$gdelapan=2.5;}
			elseif ($delapan==-3) {$gdelapan=2;}
			elseif ($delapan==4) {$gdelapan=1.5;}
			elseif ($delapan==-4) {$gdelapan=1;}
				// Bobot gap ME
			if ($sembilan==0) {$gsembilan=5;}
			elseif ($sembilan==1) {$gsembilan=4.5;}
			elseif ($sembilan==-1) {$gsembilan=4;}
			elseif ($sembilan==2) {$gsembilan=3.5;}
			elseif ($sembilan==-2) {$gsembilan=3;}
			elseif ($sembilan==3) {$gsembilan=2.5;}
			elseif ($sembilan==-3) {$gsembilan=2;}
			elseif ($sembilan==4) {$gsembilan=1.5;}
			elseif ($sembilan==-4) {$gsembilan=1;}

			$sec = ($gsatu+$gdua+$gempat+$glima+$genam+$gtujuh+$gdelapan+$gsembilan)/8;
			$core = $gtiga;
			$jadi = (0.55*$core)+(0.45*$sec);

				// Tahap keempat Fuzzifikasi

			$sekecil	= (5-$gsatu)/(5-1);
			$sebesar	= ($gsatu-1)/(5-1);
			$wakecil	= (5-$gdua)/(5-1);
			$wabesar	= ($gdua-1)/(5-1);
			$ankecil	= (5-$gtiga)/(5-1);
			$anbesar	= ($gtiga-1)/(5-1);

			$gekecil	= (5-$gempat)/(5-1);
			$gebesar	= ($gempat-1)/(5-1);
			$rakecil	= (5-$glima)/(5-1);
			$rabesar	= ($glima-1)/(5-1);
			$zrkecil	= (5-$genam)/(5-1);
			$zrbesar	= ($genam-1)/(5-1);

			$fakecil	= (5-$gtujuh)/(5-1);
			$fabesar	= ($gtujuh-1)/(5-1);
			$wukecil	= (5-$gdelapan)/(5-1);
			$wubesar	= ($gdelapan-1)/(5-1);
			$mekecil	= (5-$gsembilan)/(5-1);
			$mebesar	= ($gsembilan-1)/(5-1);

				// Tahap ke lima Pembentukan Rule, dan
				// Tahap ke enam Mesin Inferensi
				// Perbaiki

			$asatu = min($anbesar, $sebesar, $wabesar, $gebesar, $rabesar, $zrbesar, 
				$fabesar, $wubesar, $mebesar);
			$zsatu = ((5-1)*$asatu)+1;

			$adua = min($anbesar, $sekecil, $wakecil, $gekecil, $rakecil, $zrkecil, 
				$fakecil, $wukecil, $mekecil);
			$zdua = 5-((5-1)*$adua);

			$atiga = min($ankecil, $sebesar, $wabesar, $gebesar, $rabesar, $zrbesar, 
				$fabesar, $wubesar, $mebesar);
			$ztiga = 5-((5-1)*$atiga);

			$aempat = min($ankecil, $sekecil, $wakecil, $gekecil, $rakecil, $zrkecil, 
				$fakecil, $wukecil, $mekecil);
			$zempat = 5-((5-1)*$aempat);

				// Tahap ke tujuh Defuzifikasi
			$zrata = (($asatu*$zsatu)+($adua*$zdua)+($atiga*$ztiga))/($asatu+$adua+$atiga+0.001);

			$cocok = $zrata;
			$dt[$i]['jurusan']=$value->nama;
			$dt[$i]['idjur']=$value->id;
			$dt[$i]['nilai']=($jadi+$zrata)/2;		    
			$i++;
		}

		foreach ($dt as $key => $v) {
			$sorting[$key] = $v['nilai'];
		}
		if (!$array) {
			$array[] = "Pertahankan prestasi, selalu giat belajar";
		}
		$data['sarank'] = $this->dbsaran->getk();
		// var_dump($data['sarank']); die();
		array_multisort($sorting, SORT_DESC, $dt);
		$dataview = array (
			'dt' => $dt,
			'se' => $s,
			'wa' => $w,
			'an' => $a,
			'ge' => $g,
			'ra' => $r,
			'zr' => $z,
			'fa' => $f,
			'wu' => $u,
			'me' => $m,
			'saran' => $array,
			'sarank' => $data['sarank'],
			'namapes' => $nama,
			'idpeserta'=> $idpeserta,
			'gender' => $gender,
			'tanggal' => $tanggal,
			'id' => $id,
		);

        $dataview['page'] = "ujian/hasil";
        $dataview['subto'] = "jurusan-kuliah.html";
        $dataview['col'] = $this->dbmenu->readCol();
        $dataview['menu'] = $this->dbmenu->readMenu();
        $dataview['sub'] = $this->dbmenu->readSub();

		if ($action=="print") {
			$dataview['dokter'] = $this->dbclients->search($data['ujianku']->id_doc);
			$dataview['ttd'] = $this->dbclients->getTtd($data['ujianku']->id_doc);
			$this->load->view('backend/print', $dataview);
		}
		elseif ($this->session->userdata('level') !=2) {
			$this->load->view('backend/showhasil', $dataview);
		}
		else {
			$this->load->view('pageuser/hasilku', $dataview);
		}
	}

//----------------------------------------------- INI DIA ---------------------------------------------------
//----------------------------------------------- INI DIA ---------------------------------------------------
//----------------------------------------------- INI DIA ---------------------------------------------------
//----------------------------------------------- INI DIA ---------------------------------------------------
//----------------------------------------------- INI DIA ---------------------------------------------------

	public function show($id_peserta) {
		$data['nya'] = $this->dbhasil->get($id_peserta);

		$data['peserta'] = $this->dbclients->search($id_peserta);

		if (!$data['nya'])
		{
			$this->session->set_flashdata('error','Maaf terjadi kesalahan.');
			redirect(site_url('ujian/hasil'));
		}
		else {
			$se = $data['nya']->se;
			$wa = $data['nya']->wa;
			$an = $data['nya']->an;
			$ge = $data['nya']->ge;
			$ra = $data['nya']->ra;
			$zr = $data['nya']->zr;
			$fa = $data['nya']->fa;
			$wu = $data['nya']->wu;
			$me = $data['nya']->me;
			echo $data['nya']->username;echo '<br>';
			echo "Nilai Ujian &nbsp ".$se." &nbsp ".$wa." &nbsp ".$an." &nbsp ".$ge." &nbsp ".$ra.
			" &nbsp ".$zr." &nbsp ".$fa." &nbsp ".$wu." &nbsp ".$me."<br>";
			// Tahap pertama ubah ke Norma
			// norma SE
			if ($se<=3) {$s=1;}
			elseif (4<=$se && $se<=7) {$s=2;}
			elseif (8<=$se && $se<=11) {$s=3;}
			elseif (12<=$se && $se<=15) {$s=4;}
			elseif (16<=$se && $se<=20) {$s=5;}
			// norma WA
			if ($wa<=3) {$w=1;}
			elseif (4<=$wa && $wa<=7) {$w=2;}
			elseif (8<=$wa && $wa<=11) {$w=3;}
			elseif (12<=$wa && $wa<=15) {$w=4;}
			elseif (16<=$wa && $wa<=20) {$w=5;}
			// norma AN
			if ($an<=3) {$a=1;}
			elseif (4<=$an && $an<=7) {$a=2;}
			elseif (8<=$an && $an<=11) {$a=3;}
			elseif (12<=$an && $an<=15) {$a=4;}
			elseif (16<=$an && $an<=20) {$a=5;}
			// norma GE
			if ($ge<=3) {$g=1;}
			elseif (4<=$ge && $ge<=8) {$g=2;}
			elseif (9<=$ge && $ge<=16) {$g=3;}
			elseif (17<=$ge && $ge<=24) {$g=4;}
			elseif (25<=$ge && $ge<=32) {$g=5;}
			// norma RA
			if ($ra<=3) {$r=1;}
			elseif (4<=$ra && $ra<=6) {$r=2;}
			elseif (7<=$ra && $ra<=11) {$r=3;}
			elseif (12<=$ra && $ra<=15) {$r=4;}
			elseif (16<=$ra && $ra<=20) {$r=5;}
			// norma ZR
			if ($zr<=3) {$z=1;}
			elseif (4<=$zr && $zr<=6) {$z=2;}
			elseif (7<=$zr && $zr<=11) {$z=3;}
			elseif (12<=$zr && $zr<=15) {$z=4;}
			elseif (16<=$zr && $zr<=20) {$z=5;}
			// norma FA
			if ($fa<=3) {$f=1;}
			elseif (4<=$fa && $fa<=7) {$f=2;}
			elseif (8<=$fa && $fa<=11) {$f=3;}
			elseif (12<=$fa && $fa<=15) {$f=4;}
			elseif (16<=$fa && $fa<=20) {$f=5;}
			// norma WU
			if ($wu<=3) {$u=1;}
			elseif (4<=$wu && $wu<=7) {$u=2;}
			elseif (8<=$wu && $wu<=11) {$u=3;}
			elseif (12<=$wu && $wu<=15) {$u=4;}
			elseif (16<=$wu && $wu<=20) {$u=5;}
			// norma ME
			if ($me<=3) {$m=1;}
			elseif (4<=$me && $me<=7) {$m=2;}
			elseif (8<=$me && $me<=11) {$m=3;}
			elseif (12<=$me && $me<=15) {$m=4;}
			elseif (16<=$me && $me<=20) {$m=5;}
			echo "Bobotnya &nbsp ".$s." &nbsp ".$w." &nbsp ".$a." &nbsp ".$g." &nbsp ".$r." &nbsp ".
			" &nbsp ".$z." &nbsp ".$f." &nbsp ".$u." &nbsp ".$m;
			echo '<br>';

			// Tahap kedua hitung GAP
			$data['jurusan'] = $this->dbjurusan->read();
			$pil = 0; $pilih = 0; $pilihan = 0;
			//$mulai = -1;
			// mulai
			echo '<table><tr><th>Benar - </th><th>Norma - </th><th>Profil - </th>
			<th>GAP - </th><th>Bobot - </th><th>besar - </th><th>kecil - </th>
			<th>ASatu - </th><th>ZSatu - </th><th>ZDua - </th><th>ZTiga - </th>
			<th>ZEmpat - </th><th>ZRata - </th><th> - </th><th>id - </th>
			<th>kecocokan - </th><th>Profmatch - </th><th>Nilai - </th></tr>';
			$dt = array();
			$i = 0;
			foreach ($data['jurusan'] as $value) {
				$satu 	  = $s-$value->se;
				$dua	  = $w-$value->wa;
				$tiga	  = $a-$value->an;
				$empat	  = $g-$value->ge;
				$lima	  = $r-$value->ra;
				$enam	  = $z-$value->zr;
				$tujuh	  = $f-$value->fa;
				$delapan  = $u-$value->wu;
				$sembilan = $m-$value->me;

				// Tahap ketiga penentuan bobot dari GAP
				// Bobot gap SE
				if ($satu==0) {$gsatu=5;}
				elseif ($satu==1) {$gsatu=4.5;}
				elseif ($satu==-1) {$gsatu=4;}
				elseif ($satu==2) {$gsatu=3.5;}
				elseif ($satu==-2) {$gsatu=3;}
				elseif ($satu==3) {$gsatu=2.5;}
				elseif ($satu==-3) {$gsatu=2;}
				elseif ($satu==4) {$gsatu=1.5;}
				elseif ($satu==-4) {$gsatu=1;}
				// Bobot gap WA
				if ($dua==0) {$gdua=5;}
				elseif ($dua==1) {$gdua=4.5;}
				elseif ($dua==-1) {$gdua=4;}
				elseif ($dua==2) {$gdua=3.5;}
				elseif ($dua==-2) {$gdua=3;}
				elseif ($dua==3) {$gdua=2.5;}
				elseif ($dua==-3) {$gdua=2;}
				elseif ($dua==4) {$gdua=1.5;}
				elseif ($dua==-4) {$gdua=1;}
				// Bobot gap AN
				if ($tiga==0) {$gtiga=5;}
				elseif ($tiga==1) {$gtiga=4.5;}
				elseif ($tiga==-1) {$gtiga=4;}
				elseif ($tiga==2) {$gtiga=3.5;}
				elseif ($tiga==-2) {$gtiga=3;}
				elseif ($tiga==3) {$gtiga=2.5;}
				elseif ($tiga==-3) {$gtiga=2;}
				elseif ($tiga==4) {$gtiga=1.5;}
				elseif ($tiga==-4) {$gtiga=1;}
				// Bobot gap GE
				if ($empat==0) {$gempat=5;}
				elseif ($empat==1) {$gempat=4.5;}
				elseif ($empat==-1) {$gempat=4;}
				elseif ($empat==2) {$gempat=3.5;}
				elseif ($empat==-2) {$gempat=3;}
				elseif ($empat==3) {$gempat=2.5;}
				elseif ($empat==-3) {$gempat=2;}
				elseif ($empat==4) {$gempat=1.5;}
				elseif ($empat==-4) {$gempat=1;}
				// Bobot gap RA
				if ($lima==0) {$glima=5;}
				elseif ($lima==1) {$glima=4.5;}
				elseif ($lima==-1) {$glima=4;}
				elseif ($lima==2) {$glima=3.5;}
				elseif ($lima==-2) {$glima=3;}
				elseif ($lima==3) {$glima=2.5;}
				elseif ($lima==-3) {$glima=2;}
				elseif ($lima==4) {$glima=1.5;}
				elseif ($lima==-4) {$glima=1;}
				// Bobot gap ZR
				if ($enam==0) {$genam=5;}
				elseif ($enam==1) {$genam=4.5;}
				elseif ($enam==-1) {$genam=4;}
				elseif ($enam==2) {$genam=3.5;}
				elseif ($enam==-2) {$genam=3;}
				elseif ($enam==3) {$genam=2.5;}
				elseif ($enam==-3) {$genam=2;}
				elseif ($enam==4) {$genam=1.5;}
				elseif ($enam==-4) {$genam=1;}
				// Bobot FA
				if ($tujuh==0) {$gtujuh=5;}
				elseif ($tujuh==1) {$gtujuh=4.5;}
				elseif ($tujuh==-1) {$gtujuh=4;}
				elseif ($tujuh==2) {$gtujuh=3.5;}
				elseif ($tujuh==-2) {$gtujuh=3;}
				elseif ($tujuh==3) {$gtujuh=2.5;}
				elseif ($tujuh==-3) {$gtujuh=2;}
				elseif ($tujuh==4) {$gtujuh=1.5;}
				elseif ($tujuh==-4) {$gtujuh=1;}
				// Bobot gap WU
				if ($delapan==0) {$gdelapan=5;}
				elseif ($delapan==1) {$gdelapan=4.5;}
				elseif ($delapan==-1) {$gdelapan=4;}
				elseif ($delapan==2) {$gdelapan=3.5;}
				elseif ($delapan==-2) {$gdelapan=3;}
				elseif ($delapan==3) {$gdelapan=2.5;}
				elseif ($delapan==-3) {$gdelapan=2;}
				elseif ($delapan==4) {$gdelapan=1.5;}
				elseif ($delapan==-4) {$gdelapan=1;}
				// Bobot gap ME
				if ($sembilan==0) {$gsembilan=5;}
				elseif ($sembilan==1) {$gsembilan=4.5;}
				elseif ($sembilan==-1) {$gsembilan=4;}
				elseif ($sembilan==2) {$gsembilan=3.5;}
				elseif ($sembilan==-2) {$gsembilan=3;}
				elseif ($sembilan==3) {$gsembilan=2.5;}
				elseif ($sembilan==-3) {$gsembilan=2;}
				elseif ($sembilan==4) {$gsembilan=1.5;}
				elseif ($sembilan==-4) {$gsembilan=1;}

				$sec = ($gsatu+$gdua+$gempat+$glima+$genam+$gtujuh+$gdelapan+$gsembilan)/8;
				$core = $gtiga;
				$jadi = (0.55*$core)+(0.45*$sec);

				// Tahap keempat Fuzzifikasi

				$sekecil	= (5-$gsatu)/(5-1);
				$sebesar	= ($gsatu-1)/(5-1);
				$wakecil	= (5-$gdua)/(5-1);
				$wabesar	= ($gdua-1)/(5-1);
				$ankecil	= (5-$gtiga)/(5-1);
				$anbesar	= ($gtiga-1)/(5-1);

				$gekecil	= (5-$gempat)/(5-1);
				$gebesar	= ($gempat-1)/(5-1);
				$rakecil	= (5-$glima)/(5-1);
				$rabesar	= ($glima-1)/(5-1);
				$zrkecil	= (5-$genam)/(5-1);
				$zrbesar	= ($genam-1)/(5-1);

				$fakecil	= (5-$gtujuh)/(5-1);
				$fabesar	= ($gtujuh-1)/(5-1);
				$wukecil	= (5-$gdelapan)/(5-1);
				$wubesar	= ($gdelapan-1)/(5-1);
				$mekecil	= (5-$gsembilan)/(5-1);
				$mebesar	= ($gsembilan-1)/(5-1);

				// Tahap ke lima Pembentukan Rule, dan
				// Tahap ke enam Mesin Inferensi
				// Perbaiki

				$asatu = min($anbesar, $sebesar, $wabesar, $gebesar, $rabesar, $zrbesar, 
					$fabesar, $wubesar, $mebesar);
				$zsatu = ((5-1)*$asatu)+1;

				$adua = min($anbesar, $sekecil, $wakecil, $gekecil, $rakecil, $zrkecil, 
					$fakecil, $wukecil, $mekecil);
				$zdua = 5-((5-1)*$adua);

				$atiga = min($ankecil, $sebesar, $wabesar, $gebesar, $rabesar, $zrbesar, 
					$fabesar, $wubesar, $mebesar);
				$ztiga = 5-((5-1)*$atiga);

				$aempat = min($ankecil, $sekecil, $wakecil, $gekecil, $rakecil, $zrkecil, 
					$fakecil, $wukecil, $mekecil);
				$zempat = 5-((5-1)*$aempat);

				// Tahap ke tujuh Defuzifikasi
				$zrata = (($asatu*$zsatu)+($adua*$zdua)+($atiga*$ztiga))/
				($asatu+$adua+$atiga);

				$cocok = $zrata;

				echo '<tr>';
				echo '<td>';
				echo $dt[$i]['se']=$se;
				echo '</td>';
				echo '<td>';
				echo $dt[$i]['s']=$s;
				echo '</td>';
				echo '<td>';
				echo $dt[$i]['valuese'] = $value->se;
				echo '</td>';
				echo '<td>';
				echo $satu;
				echo '</td>';
				echo '<td>';
				echo $gsatu;
				echo '</td>';
				echo '<td>';
				echo $sebesar;
				echo '</td>';
				echo '<td>';
				echo $sekecil;
				echo '</td>';
				echo '<td>';
				echo $asatu;
				echo '</td>';
				echo '<td>';
				echo $zsatu;
				echo '</td>';
				echo '<td>';
				echo $zdua;
				echo '</td>';
				echo '<td>';
				echo $ztiga;
				echo '</td>';
				echo '<td>';
				echo $zempat;
				echo '</td>';
				echo '<td>';
				echo $zrata;
				echo '</td>';
				echo '<td>';
				echo $dt[$i]['jurusan']=$value->nama;
				echo '</td>';
				echo '<td>';
				echo $dt[$i]['idjur']=$value->id;
				echo '</td>';
				echo '<td>';
				echo $cocok;
				echo '</td>';
				echo '<td>';
				echo $jadi;
				echo '</td>';
				echo '<td>';
				echo $dt[$i]['nilai']=($jadi+$zrata)/2;
				echo '</td>';
				echo '</tr>';

				// //kosong semua
				// if ($pil == 0) {
				// 	$pil = $nilai;
				// 	$rankingsatu = $value->nama;
				// }
				// //satu isi nilainya kecil
				// elseif ( $pil != 0 && $pilih==0 && $nilai >= $pil) {
				// 	$pilih = $pil;
				// 	$pil = $nilai;
				// 	$rankingdua = $rankingsatu;
				// 	$rankingsatu = $value->nama;
				// }
				// //satu isi nilainya besar
				// elseif ($pil != 0 && $pilih==0 && $nilai <= $pil) {
				// 	$pilih = $nilai;
				// 	$rankingdua = $value->nama;
				// }
				// //satu dua isi nilainya kecil
				// elseif ($pil !=0 && $pilih !=0 && $nilai >= $pil && $nilai >= $pilih) {
				// 	$pilihan = $pilih;
				// 	$pilih = $pil;
				// 	$pil = $nilai;
				// 	$rankingtiga = $rankingdua;
				// 	$rankingdua = $rankingsatu;
				// 	$rankingsatu = $value->nama;
				// }
				// //satu dua isi nilai kecil
				// elseif ($pil !=0 && $pilih!=0 && $nilai <= $pilih) {
				// 	$pilihan = $nilai;
				// 	$rankingtiga = $value->nama;
				// }
				// //satu dua isi nilai antara
				// elseif ($pil !=0 && $pilih!=0 && $nilai >= $pilih && $nilai <= $pil) {
				// 	$pilihan = $pilih;
				// 	$pilih = $nilai;
				// 	$rankingtiga = $rankingdua;
				// 	$rankingdua = $value->nama;
				// }
				// // antara
				// elseif ($pilihan !=0 && $nilai >= $pilih && $nilai <= $pil) {
				// 	$pilihan = $pilih;
				// 	$pilih = $nilai;
				// 	$rankingtiga = $rankingdua;
				// 	$rankingdua = $value->nama;
				// }

				// elseif ($pilihan !=0 && $nilai >= $pilihan) {
				// 	$pilihan = $nilai;
				// 	$rankingtiga = $value->nama;
				// }
				// elseif ($pilihan ==0 && $nilai <= $pilih) {
				// 	$pilihan = $nilai;
				// 	$rankingtiga = $value->nama;
				// }				    
				$i++;
			}
			echo '</table>';
			foreach ($dt as $key => $v) {
				$sorting[$key] = $v['nilai'];
			}
			array_multisort($sorting, SORT_DESC, $dt);
			echo '<pre>';
			echo '<pre>';
			$dataview = array (
				'dt' => $dt,
				'data' => $data,

			);
			$this->load->view('backend/perhitungan', $dataview);
		}

	}

	public function psikoTest() {
		$this->load->view('backend/psiko_test', FALSE);
	}
}
