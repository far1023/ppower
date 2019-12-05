<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//bereeeess
class dbbayar extends CI_Model {

	public function getid()
	{
		$this->db->select('RIGHT(pembayaran.id,4) as max',FALSE);
		$this->db->where('tanggal','CURDATE()',FALSE);
		$query=$this->db->get('pembayaran');
		$kd="";
		if ($query->num_rows()>0) {
			foreach ($query->result() as $value) {
				$kd=intval($value->max)+1;
			}
		}else {
			$kd=1;
		}
		$kd_max=str_pad($kd,4,"0",STR_PAD_LEFT);
		date_default_timezone_set('Asia/Jakarta');
		$date=date('dmy');
		$idpay = "PAY".$date.$kd_max;
		return $idpay;
	}

	public function read() {
		$level = $this->session->userdata('level');
		$aku = $this->session->userdata('username');

		if ($level!=2){
        return $this->db->order_by('id', 'desc')->get('pembayaran')->result();
		}
		elseif ($level==2){
        return $this->db->where('username', $aku)->order_by('id', 'desc')->get('pembayaran')->result();
		}
	}

	public function update($id, $data) {
		$this->db->where('id', $id)
				 ->update('pembayaran', $data);
	}

	public function search($id) {
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('pembayaran');
		if($hasil->num_rows() > 0){
			return $hasil->row();
		} else {
			return array();
		}
	}
	
	public function readb($cari=FALSE){
		if ($cari) {
			$this->db->like('nama',$cari);
		}
		return $this->db->order_by('id', 'desc')->limit(5)->get('pembayaran')->result();
	}
	
	public function delete($cari) {
		$this->db->where('username', $cari)
				 ->delete('pembayaran');
	}

}