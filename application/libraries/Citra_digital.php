<?php defined('BASEPATH') or exit('No direct script access allowed');

class Citra_digital {
	public function __construct(){
		// $this->CI = &get_instance();
	}

	public function orientation($img_path) {
		list($width, $height) = getimagesize($img_path);
		if ($width > $height) {
			return 'landscape';
		} else {
			return 'portrait';
		}
	}
}
