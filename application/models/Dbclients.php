<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dbclients extends CI_Model {
	
	public function create($data=FALSE) {
		$this->db->set('id','UUID()',FALSE);
		$this->db->insert('clients', $data);

		$insert_id = $this->db->insert_id();
		return $insert_id;
	}

	public function creategbr($datagbr=FALSE) {
		$this->db->set('id','UUID()',FALSE);
		$this->db->insert('gambar', $datagbr);
	}

	public function createttd($datattd=FALSE) {
		$this->db->set('id','UUID()',FALSE);
		$this->db->insert('gambar', $datattd);
	}

	public function inpttd($datattd=FALSE) {
		$this->db->set('id','UUID()',FALSE);
		$this->db->insert('gambar', $datattd);
	}

	public function new_join()
	{
		return $this->db->limit(4)->get('clients')->result();
	}

	public function all()
	{
		return $this->db->where('level',2)->order_by('id', 'desc')->get('clients')->result();
	}

	public function allDoc()
	{
		return $this->db->where('level',3)->order_by('id', 'desc')->get('clients')->result();
	}
	
	public function read($i) {
		if ($i=="showOfficer") {
			$this->db->where('level !=',2)->order_by('id', 'desc');	
		} else {
			$this->db->where('level',2)->order_by('id', 'desc');
		}
        return $this->db->get('clients')->result();
	}

	public function update($id, $data) {
		$this->db->where('id', $id)
				 ->update('clients', $data);
	}

	public function updategbr($id=FALSE, $datagbr) {
		$this->db->where('id_user', $id)->where('purpose', 1)->update('gambar', $datagbr);
	}

	public function updatettd($id=FALSE, $datattd) {
		$this->db->where('id_user', $id)->where('purpose', 2)->update('gambar', $datattd);
	}

	public function getGbr($id){
		$data = $this->db->where('id_user', $id)
							->where('purpose', 1)
							->limit(1)
						 	->get('gambar');
		
		if($data->num_rows() > 0){
			return $data->row();
		} else {
			return array();
		}
	}

	public function getTtd($id){
		$data = $this->db->where('id_user', $id)
							->where('purpose', 2)
							->limit(1)
						 	->get('gambar');
		
		if($data->num_rows() > 0){
			return $data->row();
		} else {
			return array();
		}
	}
	
	public function delete($id) {
		$this->db->where('id', $id)
				 ->delete('clients');
	}
	
	public function deletegbr($id) {
		$this->db->where('id_user', $id)
				 ->delete('gambar');
	}
	
	public function search($id) {
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('clients');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function searchd($uname) {
		$hasil = $this->db->where('username', $uname)
						  ->limit(1)
						  ->get('clients');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
}