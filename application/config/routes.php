<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

# main index
$route[''] = 'main';

# main index
$route['home'] = 'main';

# iniciar sesion
$route['login'] = 'main/login';

# registrar usuario
$route['registrer'] = 'main/registrer';

# recuperar contraseña
$route['recover'] = 'main/recover';

# validar usuario
$route['check_login'] = 'main/check_login';