<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function show_403() {
	$CI = &get_instance();
	$CI->load->view('errors/html/error_403.php');
}