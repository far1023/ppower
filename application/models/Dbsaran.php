<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dbsaran extends CI_Model {
	
	public function create($data=FALSE) {
		$this->db->set('id','UUID()',FALSE);
		$this->db->insert('saran', $data);
	}
	
	public function read() {
        return $this->db->get('saran')->result();
	}
	
	public function readk() {
        return $this->db->where('subtes', '')->get('saran')->result();
	}

	public function update($idupdate, $data) {
		$this->db->where('id', $idupdate)
				 ->update('saran', $data);
	}
	
	public function delete($id, $data) {
		$this->db->where('id', $id)
				 ->update('saran', $data);
	}
	
	public function get($sub) {
		$hasil = $this->db->where('subtes', $sub)
						  ->limit(1)
						  ->get('saran');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function getk() {
		$hasil = $this->db->where('subtes', '')
						  ->limit(1)
						  ->get('saran');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
}