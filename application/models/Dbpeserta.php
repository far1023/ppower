<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dbpeserta extends CI_Model {
	
	public function getid($ujian=FALSE)
	{
		$this->db->select('RIGHT(peserta.id,4) as kd',FALSE);
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$string=preg_replace("/[^a-zA-Z0-9 &%|{.}=,?!*()-_+$@;<>']/", '', $ujian);
        $trim=trim($string);
        $pre_slug=strtolower(str_replace(" ", "-", $trim));
        $slug=$pre_slug.'.html';
		$query=$this->db->where('ujian',$slug)->get('peserta');
		if ($query->num_rows()>0) {
			$data=$query->row();
			$kd = intval($data->kd)+1;
		}else {
			$kd=1;
		}
		$kd_max=str_pad($kd,4,"0",STR_PAD_LEFT);
		if ($ujian=="Jurusan Kuliah") {
			$idpes = "PP-01-".$kd_max;
		}elseif($ujian=="Tumbuh Balita") {
			$idpes = "PP-02-".$kd_max;			
		}
		return $idpes;
	}

	public function getinfo($cari=FALSE)
	{
		$level = $this->session->userdata('level');
		$aku = $this->session->userdata('username');
		$where = "(ujian='jurusan-kuliah.html' AND id LIKE '$cari') OR (ujian='jurusan-kuliah.html' AND nama LIKE '$cari')";
		//
        return $this->db->where($where)
           				->get('peserta')->result();   
    }

	public function cek()
	{	
		$username = set_value('username');
		$ukey = set_value('ukey');
		$data = $this->db->where('username', $username)
							->where('ukey like binary', $ukey)
							->limit(1)
							->get('peserta');

		if($data->num_rows() > 0){
			return $data->row();
		} else {
			return array();
		}
	}

	public function create($data=FALSE) {
		$this->db->insert('peserta', $data);
	}
	
	public function read($ujian=FALSE, $cari=FALSE) {
		$level = $this->session->userdata('level');
		$aku = $this->session->userdata('username');

		if ($level!=2) {
            return $this->db->where('ujian', $ujian)->get('peserta')->result();
        } else {
            return $this->db->where('username', $aku)->get('peserta')->result();
        }
	}

	public function predelete($cari) {
		return $this->db->where('username', $cari)->get('peserta')->result();
	}

	public function search($id=FALSE) {
		$hasil = $this->db->where('id_bayar', $id)
						  ->or_where('id', $id)
						  ->limit(1)
						  ->get('peserta');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}

	public function update($idpes, $ubah)
	{
		$this->db->where('id', $idpes)
				 ->update('peserta', $ubah);
	}

	public function test()
	{
		$where = "ujian='jurusan-kuliah.html' AND status='Aktif'";
		return $this->db->where($where)->order_by('id', 'desc')->get('peserta')->result();
	}
	
	public function delete($id) {
		$this->db->where('id_bayar', $id)
				 ->delete('peserta');
	}	
}