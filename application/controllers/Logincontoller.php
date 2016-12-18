<?php

class Logincontoller extends CI_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->library('session');
        $this->load->model('User');
        
    }

    public function checkLogin() {
        $username = $this->input->post("inputEmail");
        $password = $this->input->post("inputPassword");
        $usr_result = $this->User->login($username, $password);
        $role = "";
        $name = "";
        foreach ($usr_result->result() as $row) {
            $name = $row->ad_name;
            $role = $row->ad_role;
        }

        if ($usr_result->num_rows() > 0) {
            $sessiondata = array(
                'username' => $username,
                'name' => $name,
                'role' => $role,
                'loginuser' => TRUE
            );
            $this->session->set_userdata($sessiondata);
            redirect("MainController/load_main");
            $this->session->set_userdata('user_login', 'C');
        } else {
            $this->session->set_userdata('user_login', 'N');
            $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
            redirect('Welcome','refresh');
        }
    }

    public function logout() {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('loginuser');
        $this->session->unset_userdata('insert');
        $this->session->unset_userdata('user_login');
        $this->session->sess_destroy();
        redirect('Welcome','refresh');
    }

}
?>

