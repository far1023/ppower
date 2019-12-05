<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dblogin extends CI_Model {

	public function read()
	{	
		$cek = $this->session->userdata('level');
		if (!$cek) {	
			$username = set_value('username');
		}
		else {
			$username = $this->session->userdata('username');
		}
		
		$data = $this->db->where('username', $username)
						  ->limit(1)
						  ->get('clients');
		
		if($data->num_rows() > 0){
			return $data->row();
		} else {
			return array();
		}
	}

}