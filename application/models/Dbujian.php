<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dbujian extends CI_Model {

	public function create($data){
		$this->db->set('id','UUID()',FALSE);
		$this->db->insert('ujian', $data);
	}

	public function bayar($data){
		$this->db->insert('pembayaran', $data);
	}

	public function read($cari=FALSE){
		if ($cari) {
			$this->db->like('nama',$cari);
		}
		return $this->db->get('ujian')->result();
	}

	public function update($id, $data){
		$this->db->where('id', $id)
				 ->update('ujian', $data);
	}
	
	public function delete($id){
		$this->db->where('id', $id)
				 ->delete('ujian');
	}
		
	public function search($slug=FALSE){
		$hasil = $this->db->where('slug', $slug)
						  ->limit(1)
						  ->get('ujian');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
}