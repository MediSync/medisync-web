<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

# Main
$route[''] = 'main';

# Login
$route['login'] = 'main/login';
