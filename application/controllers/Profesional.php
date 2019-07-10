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
            $this->load->view('profesional/header');
            $this->load->view('profesional/main');
            $this->load->view('profesional/footer');
        } else {
            redirect('');
        }
    }

}
