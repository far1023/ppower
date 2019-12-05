<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('dbartikel');
        $this->load->model('dbujian');
        $this->load->model('dbclients');
        $this->load->model('dbmenu');
        $this->load->library('pagination');
        $this->load->model('dbbayar');
    }

	public function index()
	{	
		$level = $this->session->userdata('level');
		if ($level ==2) {
			redirect(site_url('dashboard/ku'));
		}

		$user = $this->session->userdata('username');
      	if (!$user) {
            // $this->session->set_flashdata('error','Akses ditolak !');
			// redirect(site_url('auth'));
            echo $this->session->userdata('level');
            echo 'sini';
            echo $this->session->userdata('username');
            echo 'sini';
        }

        $data['ujian'] = $this->dbujian->read();
        $data['bayar'] = $this->dbbayar->readb();
        $data['page'] = "dashboard";
        $data['subto'] = NULL;
        $data['col'] = $this->dbmenu->readCol();
        $data['menu'] = $this->dbmenu->readMenu();
        $data['sub'] = $this->dbmenu->readSub();
        $data['clients'] = $this->dbclients->new_join();
        if ($level!=2) {
            $this->load->view('backend/adm', $data);
        }
        else {
            $this->load->view('beranda', $data);    
        }
	}

	public function ku()
	{
		$level = $this->session->userdata('level');
		if (!$level) {
			$this->session->set_flashdata('error','Akses ditolak !');
			redirect(site_url('auth'));
		}
		else if ($level!=2) {
			redirect(site_url('dashboard'));
		}

		$cari = $this->input->get('cari');
        $aku = $this->session->userdata('nama');
        if (!$cari) {
            $config['total_rows']= $this->db->query("SELECT * FROM artikel ORDER BY id DESC;")->num_rows();
        } else {
            $config['total_rows']= $this->db->query("SELECT * FROM artikel WHERE judul LIKE '%$cari%' ORDER BY id DESC;")->num_rows();
        }
        $config['base_url']=site_url('dashboard/ku');
        $config['total_rows'] = $this->db->count_all('artikel');
        $config['per_page']=5;
        $config['uri_segment']=3;
        $config['num_links'] = 2;

        $config['full_tag_open'] = '<div class="w3-right">';
        $config['full_tag_close'] = '</div><br><br>';
 
        $config['first_link'] = '<i class="fa fa-angle-double-left"></i>';
        $config['first_tag_open'] = '<div class="w3-white w3-button w3-hover-light-grey w3-border-top w3-border-blue">';
        $config['first_tag_close'] = '</div>';
 
        $config['last_link'] = '<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] = '<div class="w3-white w3-button w3-hover-light-grey w3-border-top w3-border-blue">';
        $config['last_tag_close'] = '</div>';
 
        $config['next_link'] = '<i class="fa fa-angle-right"></i>';
        $config['next_tag_open'] = '<div class="w3-white w3-button w3-hover-light-grey w3-border-top w3-border-blue">';
        $config['next_tag_close'] = '</div>';
 
        $config['prev_link'] = '<i class="fa fa-angle-left"></i>';
        $config['prev_tag_open'] = '<div class="w3-white w3-button w3-hover-light-grey w3-border-top w3-border-blue">';
        $config['prev_tag_close'] = '</div>';
 
        $config['cur_tag_open'] = '<div class="w3-button w3-hover-blue w3-border-top w3-blue w3-border-blue "><a>';
        $config['cur_tag_close'] = '</a></div>';
 
        $config['num_tag_open'] = '<div class="w3-white w3-button w3-hover-light-grey w3-border-top w3-border-blue">';
        $config['num_tag_close'] = '</div>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        if (!$cari) {
            $data['feed'] = $this->dbartikel->read($cari, $config);
        } else {
            $data['feed'] = $this->dbartikel->read($cari, $config);
        }

		$this->load->view('pageuser/beranda', $data);
	}
}
