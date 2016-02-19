<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class InsuranceController extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->Model('DBhelper');
        $this->load->database();
        if($this->session->userdata('loginuser') < 1){
            redirect('Welcome','refresh');
       }
    }
	
	public function insurance_detail(){
		//Cearsession
        $this->session->set_userdata('insert_employee','E');
		$data['insurance'] = $this->DBhelper->get_list_insurance();
		$this->load->view('include/header');
		$this->load->view('insurance/insurance_detail',$data);
		$this->load->view('include/footer');
	}
	public function insurance_add(){
		$data['province'] = $this->DBhelper->get_list_province();
		$this->load->view('include/header');
		$this->load->view('insurance/insurance_add',$data);
		$this->load->view('include/footer');

		
	}
	public function save_insurance(){
		$car_licenseplate    = $this->input->post('car_licenseplate');
		$car_province        = $this->input->post('car_province');
		$in_company          = $this->input->post('in_company');
		$in_type             = $this->input->post('in_type');
		$in_protection_start = $this->input->post('in_protection_start');
		$in_protection_end   = $this->input->post('in_protection_end');
		$in_money            = $this->input->post('in_money');
		$user = $this->session->userdata('username');
		$date = date("Y-m-d");
		$result_insert = $this->DBhelper->save_insurance($car_licenseplate, $car_province, $in_company, $in_type, $in_protection_start, $in_protection_end, $in_money, $user, $date);
		if($result_insert > 0){
            $this->session->set_userdata('insert_employee','C');
        }else{
            $this->session->set_userdata('insert_employee','N');
        }
        $data['insurance'] = $this->DBhelper->get_list_insurance();
		$this->load->view('include/header');
		$this->load->view('insurance/insurance_detail',$data);
		$this->load->view('include/footer');
		//redirect('InsuranceController/insurance_detail','refresh');
		
	}
	public function delete_insurance($idInsurance){
		$result_delete = $this->DBhelper->delete_insurance($idInsurance);
		redirect('InsuranceController/insurance_detail','refresh');

		
	}
}

