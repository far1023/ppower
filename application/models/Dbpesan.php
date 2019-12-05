<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dbpesan extends CI_Model {
	
	public function create($data=FALSE) {
		$this->db->set('id','UUID()',FALSE);
		$this->db->insert('contact', $data);
	}
	
	public function read() {
		$level = $this->session->userdata('level');
		$uname = $this->session->userdata('username');

		if ($level!=2) {
			$hasilquery=$this->db->order_by('id', 'desc')->get('contact');
		}
		elseif ($level==2) {
			$hasilquery=$this->db->where('email', $uname)->order_by('id', 'desc')->get('contact');
		}

        if ($hasilquery->num_rows() > 0) {
            foreach ($hasilquery->result() as $value) {
                $data[]=$value;
            }
            return $data;  
		}
	}

	public function search($id) {
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('contact');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function delete($id) {
		$this->db->where('id', $id)
				 ->delete('contact');
	}

	public function update($id, $data) {
		$this->db->where('id', $id)
				 ->update('contact', $data);
	}
}