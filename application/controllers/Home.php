<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	* The structure of Undangan Class.
	* 
	* @class Undangan
		+ @constructor
		+ @public index()
	*
*/

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();
	}

	/**
		* Index method
			show home page
			main: main content
			jsphp: optional javascript for specific requirement
		*
	*/
	public function index() {
		if (!$this->session->userdata('level')) {
			show_403();
			return 0;
		}
		$data['title']	= "Home";
		$data['main']	= "home/index";
		$data['cssphp']	= NULL;
		$data['jsphp']	= NULL;
		$this->load->view('backoffice/app', $data);
	}

}

/* End of file Undangan.php */
/* Location: ./application/controllers/Undangan.php */