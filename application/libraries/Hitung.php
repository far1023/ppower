<?php defined('BASEPATH') or exit('No direct script access allowed');

class Hitung {
	public function __construct(){
		$this->CI = &get_instance();
	}

	public function baris($table, $field, $param) {
		$this->CI->db->where($field, $param);
		$query = $this->CI->db->get($table);
		return $query->num_rows();
	}
}
