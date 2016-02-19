<?php 

class MainController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        
        if($this->session->userdata('loginuser') < 1){
            redirect('Welcome','refresh');
       }
    }
	public function load_main(){
		$this->load->view('include/header');
		$this->load->view('main');
		$this->load->view('include/footer');
	}
}
?>

