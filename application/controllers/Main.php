<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    # main index
    public function index()
    {
        $this->load->view('main/header');
        $this->load->view('main/home');
        $this->load->view('main/footer');
    }

    # iniciar sesion
    public function login()
    {
        $this->load->view('main/header');
        $this->load->view('main/login');
        $this->load->view('main/footer');
    }

    # registrar usuario
    public function registrer()
    {
        $this->load->view('main/header');
        $this->load->view('main/registrer');
        $this->load->view('main/footer');
    }

    # recuperar contraseña
    public function recover()
    {
        $this->load->view('main/header');
        $this->load->view('main/recover');
        $this->load->view('main/footer');
    }
    /*
    public function index()
    {
    if ($this->session->userdata("patient")) {
    $this->load->view('patient/principal/header');
    $this->load->view('patient/principal/main');
    $this->load->view('patient/principal/footer');
    } else if ($this->session->userdata("profesional")) {
    $this->load->view('profesional/principal/header');
    $this->load->view('profesional/principal/main');
    $this->load->view('profesional/principal/footer');
    } else if ($this->session->userdata("organization")) {
    $this->load->view('organization/principal/header');
    $this->load->view('organization/principal/main');
    $this->load->view('organization/principal/footer');
    } else {
    $this->load->view('main/header');
    $this->load->view('main/home');
    $this->load->view('main/footer');
    }
    }
     */

    # validar usuario
    public function check_login()
    {
        $profile = $this->input->post('profile');
        $rut = $this->input->post('rut');
        $pass = $this->input->post('pass');
        $url = '';

        if ($profile == 1) {
            $url = 'https://projectmedisync.firebaseapp.com/api/v1/patient/' . $rut;
        } else if ($profile == 2) {
            $url = 'https://projectmedisync.firebaseapp.com/api/v1/profesional/' . $rut;
        } else if ($profile == 3) {
            $url = 'https://projectmedisync.firebaseapp.com/api/v1/organization/' . $rut;
        }

        $json = file_get_contents($url);
        $arrayUser = json_decode($json);

        if ($arrayUser->password === md5($pass)) {
            if ($profile == 1) {
                $this->session->set_userdata("patient", $arrayUser);
            } else if ($profile == 2) {
                $this->session->set_userdata("profesional", $arrayUser);
            } else if ($profile == 3) {
                $this->session->set_userdata("organization", $arrayUser);
            }
            echo 1;
        } else {
            echo 0;
        }
    }

}
