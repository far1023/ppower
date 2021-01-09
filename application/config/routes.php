<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller']   = 'maintenance';
$route['translate_uri_dashes'] = FALSE;

$route['login']		= 'auth/login';
$route['logout']	= 'auth/logout';

$route['404_override']	= 'custom_error/err404';