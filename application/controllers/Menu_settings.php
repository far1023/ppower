<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_settings extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dbmenu');
		//Do your magic here
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

	public function index()
	{
		$data['page'] = "menu_settings";
		$data['subto'] = NULL;
		$data['col'] = $this->dbmenu->readCol();
		$data['menu'] = $this->dbmenu->readMenu();
		$data['submenu'] = $this->dbmenu->readSub();
		$this->load->view('backend/set_menu', $data);
	}

	public function turnMenu($id, $action)
	{
		if ($action=="on") {
			$data = array(
						'aktif' => 1
			);
		} else {
			$data = array (
						'aktif' => 0
			);
		}
		$this->dbmenu->updateMenu($id, $data);
		redirect('menu_settings');
	}

	public function turnSub($id, $action)
	{
		if ($action=="on") {
			$data = array(
						'aktif' => 1
			);
		} else {
			$data = array (
						'aktif' => 0
			);
		}
		$this->dbmenu->updateSub($id, $data);
		redirect('menu_settings');
	}

	public function addMenu(){
		$this->form_validation->set_rules('nama', 'Menu', 'required|trim');
		$this->form_validation->set_rules('link', 'Link', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|alpha_numeric');
		$this->form_validation->set_rules('level', 'Level', 'required|numeric');
		$this->form_validation->set_rules('aktif', 'Aktif', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->session->flashdata('errorMenu', 'Maaf, terjadi kesalahan');
			redirect('menu_settings');
		}
		else{
			$menuid = $this->dbmenu->getMenuid();
			$ubah = set_value('nama');
			$nama = ucwords(strtolower($ubah));
			$data =	array(
						'id'		=> $menuid,
						'nama'		=> htmlspecialchars($nama),
						'link'		=> htmlspecialchars(set_value('link')),
						'icon'		=> htmlspecialchars(set_value('icon')),
						'kategori'	=> set_value('kategori'),
						'level'		=> set_value('level'),
						'aktif'		=> set_value('aktif')
						);

			$this->dbmenu->addMenu($data);
			redirect('menu_settings');
		}
	}

	public function addCol(){
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');
		$this->form_validation->set_rules('aktif', 'Aktif', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->flashdata('errorMenu', 'Maaf, terjadi kesalahan');
			redirect('menu_settings');
		}
		else{
			$menuid = $this->dbmenu->getColid();
			$ubah = set_value('nama');
			$nama = ucwords(strtolower($ubah));
			$data =	array(
						'id'		=> $menuid,
						'kategori'	=> set_value('kategori'),
						'level'		=> set_value('level'),
						'aktif'		=> set_value('aktif')
						);

			$this->dbmenu->addCol($data);
			redirect('menu_settings');
		}
	}

	public function addSub(){
		$this->form_validation->set_rules('nama', 'Menu', 'required|alpha_numeric_spaces|trim');
		$this->form_validation->set_rules('link', 'Link', 'required|trim');
		$this->form_validation->set_rules('icon', 'Icon', 'required|trim');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required|alpha_numeric');
		$this->form_validation->set_rules('level', 'Level', 'required|numeric');
		$this->form_validation->set_rules('aktif', 'Aktif', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->session->flashdata('errorMenu', 'Maaf, terjadi kesalahan');
			redirect('menu_settings');
		}
		else{
			$subid = $this->dbmenu->getSubid();
			$ubah = set_value('nama');
			$nama = ucwords(strtolower($ubah));
			$data =	array(
						'id'		=> $subid,
						'nama'		=> $nama,
						'link'		=> htmlspecialchars(set_value('link')),
						'icon'		=> htmlspecialchars(set_value('icon')),
						'main'		=> set_value('kategori'),
						'level'		=> set_value('level'),
						'aktif'		=> set_value('aktif')
						);

			$this->dbmenu->addSub($data);
			redirect('menu_settings');
		}
	}

	public function dMenu($id){
		$this->dbmenu->deleteMenu($id);
		redirect('menu_settings');
	}

	public function dCol($id){
		$this->dbmenu->deleteCol($id);
		redirect('menu_settings');
	}

	public function dSub($id){
		$this->dbmenu->deleteSub($id);
		redirect('menu_settings');
	}

	public function icon_list(){
		$data['col'] = $this->dbmenu->readCol();
		$data['menu'] = $this->dbmenu->readMenu();
		$this->load->view('backend/icon', $data);
	}

}

/* End of file menu_settings.php */
/* Location: ./application/controllers/menu_settings.php */

?>