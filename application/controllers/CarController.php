<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CarController extends CI_Controller {
	
	function __construct() {
        parent::__construct();
        $this->load->Model('DBhelper');
        $this->load->database();
        if($this->session->userdata('loginuser') < 1){
            redirect('Welcome','refresh');
       }
    }
	public function car_detail(){
		//Cearsession
        $this->session->set_userdata('insert_employee','E');
		$data['car'] = $this->DBhelper->get_list_car();
		$this->load->view('include/header');
		$this->load->view('car/car_detail',$data);
		$this->load->view('include/footer');
	}

	public function car_add(){
		$data['province'] = $this->DBhelper->get_list_province();
		$data['cartype']  = $this->DBhelper->get_list_cartype();
		$data['carbrand']  = $this->DBhelper->get_list_carbrand();
		$data['carcolor']  = $this->DBhelper->get_list_carcolor();
		$this->load->view('include/header');
		$this->load->view('car/car_add',$data);
		$this->load->view('include/footer');
	}
	public function delete_car($idCar = ''){
		$result_delete = $this->DBhelper->delete_car($idCar);
		redirect('CarController/car_detail');

	}
	public function save_car(){
		$em_employeeid    = $this->input->post('em_employeeid');
		$car_registerdate = $this->input->post('car_registerdate');
		$car_taxdate      = $this->input->post('car_taxdate');
		$car_type         = $this->input->post('car_type');
		$car_brand        = $this->input->post('car_brand');
		$car_number       = $this->input->post('car_number');
		$car_licenseplate = $this->input->post('car_licenseplate');
		$car_province     = $this->input->post('car_province');
		$car_color        = $this->input->post('car_color');
		$user = $this->session->userdata('username');
		$date = date("Y-m-d");
		$result_insert = $this->DBhelper->save_car($em_employeeid, $car_registerdate, $car_taxdate, $car_type, $car_brand, $car_number, $car_licenseplate, $car_province, $car_color, $date, $user);
		if($result_insert > 0){
            $this->session->set_userdata('insert_employee','C');
        }else{
            $this->session->set_userdata('insert_employee','N');
        }
        $data['car'] = $this->DBhelper->get_list_car();
		$this->load->view('include/header');
		$this->load->view('car/car_detail',$data);
		$this->load->view('include/footer');
		//redirect('CarController/car_detail');

	}
}

