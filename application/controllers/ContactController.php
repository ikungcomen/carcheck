<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ContactController extends CI_Controller {

	function __construct() {
        parent::__construct();
        if($this->session->userdata('loginuser') < 1){
           redirect('Welcome','refresh');
       }
    }
	
	public function load_contact(){
		$this->load->view('include/header');
		$this->load->view('contact');
		$this->load->view('include/footer');
	}
}

