<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CheckcarController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->Model('DBhelper');
        $this->load->database();
        if($this->session->userdata('loginuser') < 1){
            redirect('Welcome','refresh');
       }
    }
	public function checkcar_detail(){
		//Cearsession
        $this->session->set_userdata('insert_employee','E');
		$data['checkcar'] = $this->DBhelper->get_list_checkcar();
		$this->load->view('include/header');
		$this->load->view('checkcar/checkcar_detail',$data);
		$this->load->view('include/footer');
	}

	public function checkcar_add(){
		$data['province'] = $this->DBhelper->get_list_province();
		$this->load->view('include/header');
		$this->load->view('checkcar/checkcar_add',$data);
		$this->load->view('include/footer');
	}
	public function save_checkcar(){
		$car_licenseplate = $this->input->post('car_licenseplate');
		$car_province = $this->input->post('car_province');
		$chk_date = $this->input->post('chk_date');
		$chk_complete = $this->input->post('chk_complete');
		$chk_text = $this->input->post('chk_text');
		$user = $this->session->userdata('username');
		$date = date("Y-m-d");
		$result_insert = $this->DBhelper->save_checkcar($car_licenseplate, $car_province, $chk_date, $chk_complete, $chk_text, $user, $date);
		if($result_insert > 0){
            $this->session->set_userdata('insert_employee','C');
        }else{
            $this->session->set_userdata('insert_employee','N');
        }
        $data['checkcar'] = $this->DBhelper->get_list_checkcar();
		$this->load->view('include/header');
		$this->load->view('checkcar/checkcar_detail',$data);
		$this->load->view('include/footer');
		//redirect('CheckcarController/checkcar_detail','refresh');
		
	}
	public function delete_checkcar($idCheckcar){
		$result_delete = $this->DBhelper->delete_checkcar($idCheckcar);
		redirect('CheckcarController/checkcar_detail','refresh');
	}
}

