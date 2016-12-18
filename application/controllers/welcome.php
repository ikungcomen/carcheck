<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->session->set_userdata('user_login', 'E');
        $this->load->view('login');
    }

    public function load_register() {
        $this->session->set_userdata('register', 'E');
        $this->load->view('register');
    }

}
