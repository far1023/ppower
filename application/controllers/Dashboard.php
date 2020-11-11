<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	* The structure of Dashboard Class.
	* 
	* @class Dashboard
		+ @constructor
		+ @public index()
	*
*/

class Dashboard extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (!$this->session->userdata('level')) {
			show_404();
		}
	}

	/**
		* Index method
			show home page
			main: main content
			jsphp: optional javascript for specific requirement
		*
	*/
	public function index() {
		if ($this->session->userdata('level') == 1) {
			$view	=	'dashboard';
			$data['main']	= $view;
			$data['jsphp']	= $view.'JS';
		}
		$this->load->view('backoffice/app', $data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */