<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organization extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    # organization main index
    public function index()
    {
        if ($this->session->userdata("user")) {
            $this->load->view('organization/principal/header');
            $this->load->view('organization/principal/main');
            $this->load->view('organization/principal/footer');
        } else {
            redirect('');
        }
    }

}
