<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dbhasil extends CI_Model {

	public function getid()
	{
		$this->db->select('RIGHT(hasil.id_peserta,4) as kd',FALSE);
		$this->db->order_by('id','ASC');
		$this->db->limit(1);
		$query=$this->db->get('hasil');
		if ($query->num_rows()>0) {
			$data=$query->row();
			$kd = intval($data->kd)+1;
		}else {
			$kd=1;
		}
		$kd_max=str_pad($kd,4,"0",STR_PAD_LEFT);
		$idtemp = "PP-01-".$kd_max;
		return $idtemp;
	}
	
	public function create($data=FALSE) {
		$this->db->set('id','UUID()', FALSE);
		$this->db->set('id_doc', $this->session->userdata('id'));
		$this->db->insert('hasil', $data);
	}
	
	public function read() {
		$level = $this->session->userdata('level');
		$aku = $this->session->userdata('username');

		if ($level!=2) {
            return $this->db->get('hasil')->result();
        } else {
            return $this->db->where('username', $aku)->get('hasil')->result();
        }
	}
	
	public function delete($id) {
		$this->db->where('id', $id)
				 ->delete('hasil');
	}

	public function predelete($id) {
		return $this->db->where('id_doc', $id)->get('hasil')->result();
	}

	public function get($id_peserta) {
		$hasil = $this->db->where('id_peserta', $id_peserta)
						  ->limit(1)
						  ->get('hasil');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function getinfo($id) {
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('hasil');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}	
}