<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dbjurusan extends CI_Model {
	
	public function create($data=FALSE) {
		$this->db->set('id', 'UUID()', FALSE);
		$this->db->insert('jurusan', $data);
	}
	
	public function read($cari=FALSE, $config=FALSE) {
		$hasilquery=$this->db->order_by('nama', 'asc')->get('jurusan');
        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;  
		}
	}

	public function update($id, $data) {
		$this->db->where('id', $id)
				 ->update('jurusan', $data);
	}
	
	public function delete($id) {
		$this->db->where('id', $id)
				 ->delete('jurusan');
	}
	
	public function search($id) {
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('jurusan');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
}