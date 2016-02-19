<?php 

class ManageUserController extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->Model('User');
        $this->load->Model('DBhelper');
        $this->load->database();
        if($this->session->userdata('loginuser') < 1){
           redirect('Welcome','refresh');
       }
    }

    public function load_user() {
    	//Cearsession
        $this->session->set_userdata('insert_user','E');
        $this->load->view('include/header');
        $data['user'] = $this->User->get_list_user();
        $this->load->view('manage_user', $data);
        $this->load->view('include/footer');
    }

    public function approve_user($id = ''){
    	$result = $this->User->approve_user($id);
    	redirect('ManageUserController/load_user');
    }
    public function unapprove_user($id = ''){
    	$result = $this->User->unapprove($id);
    	redirect('ManageUserController/load_user');
	}
	public function delete_user($id = ''){
    	$result = $this->User->delete_user($id);
    	redirect('ManageUserController/load_user');
	}
	public function load_add_user(){
		$this->load->view('include/header');
		$this->load->view('add_user');
		$this->load->view('include/footer');
	}
	public function add_user(){
		$gen = $this->input->post('gen');
		$name = $this->input->post('name');
		$lastName = $this->input->post('lastName');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$role = $this->input->post('role');
		$status = $this->input->post('status');
		$date = date("Y-m-d");
		$add_by = $this->session->userdata('username');
		$result = $this->User->add_user($gen,$name,$lastName,$username,$password,$password,$role,$status,$date,$add_by);
		if($result > 0){
            $this->session->set_userdata('insert_user','C');
        }else{
            $this->session->set_userdata('insert_user','N');
        }
        $data['user'] = $this->User->get_list_user();
        $this->load->view('include/header');
        
        $this->load->view('manage_user', $data);
        $this->load->view('include/footer');
		//redirect('ManageUserController/load_user');

	}
	
	public function register_user(){
		$gen = $this->input->post('gen');
		$name = $this->input->post('name');
		$lastName = $this->input->post('lastname');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$date = date("Y-m-d");
		$add_by = "user";
		$result = $this->User->register_user($gen,$name,$lastName,$username,$password,$date,$add_by);
		if($result > 0){
            $this->session->set_userdata('register','C');
        }else{
            $this->session->set_userdata('register','N');
        }
		//redirect('Welcome/index');
		$this->load->view('register');
	}
	public function send_plobem(){
		$this->load->view('include/header');
		//Cearsession
		$this->session->set_userdata('insert','E');
		$this->load->view('plobem/plobem');
		$this->load->view('include/footer');
	}
	public function save_plobem(){
		$plobem = $this->input->post('plobem');
		$date = date("Y-m-d");
		$user = $this->session->userdata('username');
		$result_insert= $this->DBhelper->save_plobem($plobem,$date,$user);
		if($result_insert > 0){
			$this->session->set_userdata('insert','C');
		}else{
			$this->session->set_userdata('insert','N');
		}
		$this->load->view('include/header');
		$this->load->view('plobem/plobem');
		$this->load->view('include/footer');
	}

}

?>