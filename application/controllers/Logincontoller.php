<?php 

class Logincontoller extends CI_Controller {
	
	function __construct(){
   		parent::__construct();
   		$this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->helper('html');
        $this->load->database();
        $this->load->library('form_validation');
        $this->load->model('User');
        //if($this->session->userdata('loginuser') < 1){
            //redirect('Welcome');
       //}
        

 	}
 
	 

	public function checkLogin(){
		//get the posted values
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $this->form_validation->set_rules("username", "Username", "trim|required");
        $this->form_validation->set_rules("password", "Password", "trim|required");
		
		if ($this->form_validation->run() == FALSE){
               //validation fails
            $this->session->set_userdata('user_login','N');
            $this->load->view('login');
            
               
        }else{
               
                    //check if username and password is correct
                    $usr_result = $this->User->login($username, $password);
                    //if ($usr_result > 0) {//active user record is present
                    $role = "";
                    $name = "";
                    foreach ($usr_result->result() as $row){
                        $name =  $row->ad_name;
                        $role =  $row->ad_role;

                        
                    }

                    if ($usr_result->num_rows() > 0) {//active user record is present
                        $sessiondata = array(
                              'username' => $username,
                              'name' => $name,
                              'role' => $role,
                              'loginuser' => TRUE
                         );
                         $this->session->set_userdata($sessiondata);
                         //redirect("index");
                         $this->load->view('include/header');
            			 $this->load->view('main');
            			 $this->load->view('include/footer');
                         $this->session->set_userdata('user_login','C');
                    }
                    else{
                         $this->session->set_userdata('user_login','N');
                         $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                         redirect('Logincontoller/checkLogin');
                       
                         //$this->load->view('login');
                    }
               
          }
		
	}

	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('loginuser');
        $this->session->unset_userdata('insert');
        $this->session->unset_userdata('user_login');
		$this->session->sess_destroy();
		redirect('Welcome','refresh');
         
	}
}
?>

