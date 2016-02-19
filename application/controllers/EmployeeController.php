<?php

class EmployeeController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->Model('DBhelper');
        $this->load->database();
       if($this->session->userdata('loginuser') < 1){
            redirect('Welcome','refresh');
       }
    }

    public function employee_detail() {
        //Cearsession
        $this->session->set_userdata('insert_employee','E');
        $this->load->view('include/header');
        
        $data['employee'] = $this->DBhelper->get_list_employee();
        $this->load->view('employee/employee_detail', $data);
        $this->load->view('include/footer');
    }

    public function add_employee() {
        
        $this->load->view('include/header');
        $data['province'] = $this->DBhelper->get_list_province();
        $data['district'] = $this->DBhelper->get_list_district();
        $data['subdistrict'] = $this->DBhelper->get_list_subdistrict();
        $this->load->view('employee/employee_add', $data);
        $this->load->view('include/footer');
    }

    public function change_subdistrict($id) {
        $data = $this->DBhelper->change_subdistrict($id);
        echo  json_encode($data); 
    }
    public function change_district_get_subdistrict($id) {
        $data = $this->DBhelper->change_district_get_subdistrict($id);
        echo  json_encode($data); 
    }
    public function change_district_get_province($id) {
        $data = $this->DBhelper->change_district_get_province($id);
        echo  json_encode($data); 
    }
    public function get_district_fornChange_district($id) {
        $data = $this->DBhelper->get_district_fornChange_district($id);
        $pro_id;
        foreach ($data->result() as $row){
            $pro_id =  $row->pro_id;
        }
        echo  $pro_id; 
    }

    public function get_district_id($id) {
        $usr_result = $this->DBhelper->get_district_id($id);
        $name;
        foreach ($usr_result->result() as $row){
            $name =  $row->dis_id;
        }
        echo  $name; 
    }
    public function change_province_get_subdistrict($id) {
        $data = $this->DBhelper->change_province_get_subdistrict($id);
        echo  json_encode($data); 
    }
    public function change_province_get_district($id) {
        $data = $this->DBhelper->change_province_get_district($id);
        echo  json_encode($data); 
    }
    public function insert_employee() {
        $user = "addmin";
        $gen = $this->input->post("gen");
        $name = $this->input->post("name");
        $lastName = $this->input->post("lastName");
        $employeeId = $this->input->post("employeeId");
        $phonenumber = $this->input->post("phonenumber");
        $address = $this->input->post("address");
        $subdistrict = $this->input->post("subdistrict");
        $district = $this->input->post("district");
        $province = $this->input->post("province");
        $postCode = $this->input->post("postCode");

        $subName = $this->DBhelper->get_subName($subdistrict);
        $disName = $this->DBhelper->get_disName($district);
        $proName = $this->DBhelper->get_proName($province);
        foreach ($subName->result() as $row){
            $subName =  $row->sub_name;
        }
        foreach ($disName->result() as $row){
            $disName =  $row->dis_name;
        }
        foreach ($proName->result() as $row){
            $proName =  $row->pro_name;
        }
        $date = date("Y-m-d");
        $result = $this->DBhelper->insert_employee($user, $gen, $name, $lastName, $employeeId, $phonenumber, $address, $subName, $disName, $proName, $postCode, $date);
        if($result > 0){
            $this->session->set_userdata('insert_employee','C');
        }else{
            $this->session->set_userdata('insert_employee','N');
        }
        $data['employee'] = $this->DBhelper->get_list_employee();
        $this->load->view('include/header');
        $this->load->view('employee/employee_detail', $data);
        $this->load->view('include/footer');
        
    }

    public function delete_employee($id = '') {
        $result = $this->DBhelper->delete_employee($id);
        if ($result > 0) {
            echo "<script>alert('ลบข้อมูลเรียบร้อย');</script>";
        }else{
            echo "<script>alert('ไม่สามารถลบข้อมูลได้');</script>";
        }
        $this->load->view('include/header');
        $data['employee'] = $this->DBhelper->get_list_employee();
        $this->load->view('employee/employee_detail', $data);
        $this->load->view('include/footer');
    }

}
?>

