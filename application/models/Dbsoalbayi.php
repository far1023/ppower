<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//bereeeess
class dbsoalbayi extends CI_Model {

	public function create($data=FALSE) {
		$this->db->set('id','UUID()',FALSE);
		$this->db->insert('soalbayi', $data);
	}

	public function read() {
		$level = $this->session->userdata('level');
		$aku = $this->session->userdata('username');

		$this->db->order_by('id', 'desc');
		
		return $this->db->get('soalbayi')->result();
	}

	public function update($id, $data) {
		$this->db->where('id', $id)
				 ->update('soalbayi', $data);
	}

	public function delete($id) {
		$this->db->where('id', $id)
				 ->delete('soalbayi');
	}

	public function search($id) {
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('soalbayi');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

}