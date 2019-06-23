<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

# main index
$route[''] = 'main';

# main index
$route['principal'] = 'main/principal';

# main index
$route['set_patient'] = 'main/set_patient';

# main index
$route['set_profesional'] = 'main/set_profesional';

# main index
$route['set_organization'] = 'main/set_organization';

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

# agregar profesional
$route['add_profesional'] = 'main/add_profesional';
