<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//bereeeess
class dbbank extends CI_Model {

	public function read(){
		return $this->db->order_by('nama', 'asc')->get('bank')->result();
	}

}