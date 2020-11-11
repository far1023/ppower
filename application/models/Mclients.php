<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mclients extends CI_Model {

	public function getByUsername() {
		$data	= $this->db->where('username', $this->input->post('username'))->limit(1)->get('clients');
		
		if($data->num_rows() > 0){
			return $data->row();
		} else {
			return array();
		}
	}
}

/* End of file Mclients.php */
/* Location: ./application/models/Mclients.php */