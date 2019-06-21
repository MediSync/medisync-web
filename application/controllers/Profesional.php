<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profesional extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    # profesional main index
    public function index()
    {
        if ($this->session->userdata("user")) {
            $this->load->view('profesional/principal/header');
            $this->load->view('profesional/principal/main');
            $this->load->view('profesional/principal/footer');
        } else {
            redirect('');
        }
    }

}
