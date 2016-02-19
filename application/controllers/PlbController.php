<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PlbController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->Model('DBhelper');
        $this->load->database();
        if($this->session->userdata('loginuser') < 1){
            redirect('Welcome','refresh');
       }
    }

	public function plb_add(){
		$data['province'] = $this->DBhelper->get_list_province();
		$this->load->view('include/header');
		$this->load->view('plb/plb_add',$data);
		$this->load->view('include/footer');
	}

	public function plb_detail(){
		//Cearsession
        $this->session->set_userdata('insert_employee','E');
		$data['plb'] = $this->DBhelper->get_list_plb();
		$this->load->view('include/header');
		$this->load->view('plb/plb_detail',$data);
		$this->load->view('include/footer');

	}

	public function save_plb(){
		$car_licenseplate     = $this->input->post('car_licenseplate');
		$car_province         = $this->input->post('car_province');
		$plb_company          = $this->input->post('plb_company');
		$plb_protection_start = $this->input->post('plb_protection_start');
		$plb_protection_end   = $this->input->post('plb_protection_end');
		$user = $this->session->userdata('username');
		$date = date("Y-m-d");
		$result_insert = $this->DBhelper->save_plb($car_licenseplate, $car_province, $plb_company, $plb_protection_start, $plb_protection_end, $date, $user);
		if($result_insert > 0){
            $this->session->set_userdata('insert_employee','C');
        }else{
            $this->session->set_userdata('insert_employee','N');
        }
        $data['plb'] = $this->DBhelper->get_list_plb();
		$this->load->view('include/header');
		$this->load->view('plb/plb_detail',$data);
		$this->load->view('include/footer');
		//redirect('PlbController/plb_detail','refresh');
	}
	public function delete_plb($id){
		$result_delete = $this->DBhelper->delete_plb($id);
		redirect('PlbController/plb_detail','refresh');
	}
}

