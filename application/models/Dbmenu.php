<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbmenu extends CI_Model {

	public function getMenuid()
	{
		$this->db->select('RIGHT(menumain.id,2) as max',FALSE);
		$query=$this->db->get('menumain');
		$kd="";
		if ($query->num_rows()>0) {
			foreach ($query->result() as $value) {
				$kd=intval($value->max)+1;
			}
		}else {
			$kd=1;
		}
		$kd_max=str_pad($kd,2,"0",STR_PAD_LEFT);
		$menuid = "MENU".$kd_max;
		return $menuid;
	}

	public function getColid()
	{
		$this->db->select('RIGHT(menucol.id,2) as max',FALSE);
		$query=$this->db->get('menucol');
		$kd="";
		if ($query->num_rows()>0) {
			foreach ($query->result() as $value) {
				$kd=intval($value->max)+1;
			}
		}else {
			$kd=1;
		}
		$kd_max=str_pad($kd,2,"0",STR_PAD_LEFT);
		$colid = "COL".$kd_max;
		return $colid;
	}

	public function getSubid()
	{
		$this->db->select('RIGHT(menusub.id,2) as max',FALSE);
		$query=$this->db->get('menusub');
		$kd="";
		if ($query->num_rows()>0) {
			foreach ($query->result() as $value) {
				$kd=intval($value->max)+1;
			}
		}else {
			$kd=1;
		}
		$kd_max=str_pad($kd,2,"0",STR_PAD_LEFT);
		$subid = "SUB".$kd_max;
		return $subid;
	}

	public function readCol() {
		$this->db->order_by('id', 'asc');
	    return $this->db->get('menucol')->result();
	}

	public function readMenu(){
		$this->db->order_by('id','asc');
		return $this->db->get('menumain')->result();
	}

	public function readSub(){
		$this->db->order_by('id','asc');
		return $this->db->get('menusub')->result();
	}

	public function addMenu($data){
		$this->db->insert('menumain',$data);
	}

	public function addCol($data){
		$this->db->insert('menucol',$data);
	}

	public function addSub($data){
		$this->db->insert('menusub',$data);
	}

	public function updateMenu($id, $data) {
		$this->db->where('id', $id)
				 ->update('menumain', $data);
	}

	public function updateSub($id, $data) {
		$this->db->where('id', $id)
				 ->update('menusub', $data);
	}

	public function deleteMenu($id){
		$this->db->where('id', $id)
					->delete('menumain');
	}

	public function deleteCol($id){
		$this->db->where('id', $id)
					->delete('menucol');
	}

	public function deleteSub($id){
		$this->db->where('id', $id)
					->delete('menusub');
	}
	
	public function getMain($main) {
		$hasil = $this->db->where('link', $main)
						  ->limit(1)
						  ->get('menumain');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function getSub($mainid) {
		return $this->db->where('main', $mainid)->get('menusub')->result();
	}

}


/* End of file dbmenu.php */
/* Location: ./application/models/dbmenu.php */