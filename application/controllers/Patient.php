<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patient extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    # patient main index
    public function index()
    {
        if ($this->session->userdata("user")) {
            $this->load->view('patient/principal/header');
            $this->load->view('patient/principal/main');
            $this->load->view('patient/principal/footer');
        } else {
            redirect('');
        }
    }

}
