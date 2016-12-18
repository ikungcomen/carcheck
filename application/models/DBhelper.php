<?php

class DBhelper extends CI_Model {

    public function get_list_employee() {
        $sql = "select * from tb_employee";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
        // $this->db->select("*");
        // $this->db->from("tb_province");
        //$result = $this->db->get();
        //return $result->result_array();
    }
    public function get_employee($id) {
        $sql = "select * from tb_employee where em_id  = '$id'";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
        
    }

    public function get_list_gen() {
        $sql = "select * from tb_gen order by gen_id desc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_list_province() {
        $sql = "select * from tb_province order by pro_name desc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function get_list_district() {
        $sql = "select * from tb_district order by dis_name asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function change_subdistrict($id) {
        $sql = "select td.dis_id as   dis_id "
            ." ,td.dis_name as dis_name"
            ." ,tp.pro_name as pro_name "
            ." ,tp.pro_id as pro_id "
            ." from tb_district td "
            ." inner join tb_province tp on tp.pro_id = td.pro_id "
            ." where td.dis_id =  ".$id;

        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function get_subName($id) {
        $sql = "select * from tb_subdistrict where sub_id = ".$id;
        $result = $this->db->query($sql);
        return $result;
    }
    public function get_subName_xx($id) {
        $sql = "select * from tb_subdistrict where dis_id = ".$id;
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_disName($id) {
        $sql = "select * from tb_district where dis_id = ".$id;
        $result = $this->db->query($sql);
        return $result;
    }

    public function get_proName($id) {
        $sql = "select * from tb_province where pro_id = ".$id;
        $result = $this->db->query($sql);
        return $result;
    }


    public function change_district_get_province($id) {
        $sql = "select * from tb_province where pro_id = ".$id;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function change_district_get_subdistrict($id) {
        $sql = "select * from tb_subdistrict where dis_id = ".$id;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function get_district_fornChange_district($id) {
        $sql = "select * from tb_district where dis_id = ".$id;
        $result = $this->db->query($sql);
        return $result;
    }

    public function change_province_get_subdistrict($id) {
        $sql = "select * from tb_subdistrict where dis_id = ".$id;
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }


    public function change_province_get_district($id) {
        $sql = "select * from tb_district where pro_id = ".$id." order by dis_id asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function get_district_id($id) {
        $sql = "select dis_id from tb_district where pro_id = ".$id." order by dis_id asc limit 1 ";
        $result = $this->db->query($sql);
        //$result = $result->result_array();
        return $result;
    }

    public function get_list_subdistrict() {
        $sql = "select * from tb_subdistrict order by sub_name asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function insert_employee($user,$gen,$name,$lastName,$employeeId,$phonenumber,$address,$subdistrict,$district,$province,$postCode,$date) {
        $this->db->set('em_gen',$gen);
        $this->db->set('em_name',$name);
        $this->db->set('em_lastname',$lastName);
        $this->db->set('em_employeeid',$employeeId);
        $this->db->set('em_phonenumber',$phonenumber);
        $this->db->set('em_address',$address);
        $this->db->set('em_subdistrict',$subdistrict);
        $this->db->set('em_district',$district);
        $this->db->set('em_province',$province);
        $this->db->set('em_postcode',$postCode);
        $this->db->set('create_date',$date);
        $this->db->set('create_user',$user);
        $this->db->set('update_date',$date);
        $this->db->set('update_user',$user);
        $this->db->insert('tb_employee');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function save_employee($user,$gen,$name,$lastName,$employeeId,$phonenumber,$address,$subdistrict,$district,$province,$postCode,$date,$id) {
        $this->db->set('em_gen',$gen);
        $this->db->set('em_name',$name);
        $this->db->set('em_lastname',$lastName);
        $this->db->set('em_employeeid',$employeeId);
        $this->db->set('em_phonenumber',$phonenumber);
        $this->db->set('em_address',$address);
        $this->db->set('em_subdistrict',$subdistrict);
        $this->db->set('em_district',$district);
        $this->db->set('em_province',$province);
        $this->db->set('em_postcode',$postCode);
        $this->db->set('update_date',$date);
        $this->db->set('update_user',$user);
        $this->db->where('em_id',$id);
        $this->db->update('tb_employee');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete_employee($id = ''){
        $this->db->where('em_id', $id);
        $this->db->delete('tb_employee'); 
        if ($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function get_list_car(){
        $sql   = " select em_employeeid    as em_employeeid "
                ."       ,car_registerdate as car_registerdate "
                ."       ,car_taxdate      as car_taxdate "
                ."       ,car_type         as car_type "
                ."       ,car_brand        as car_brand"
                ."       ,car_number       as car_number"
                ."       ,car_licenseplate as car_licenseplate"
                ."       ,car_province     as car_province "
                ."       ,car_color        as car_color "
                ."       ,car_id           as car_id "
                ." from tb_car ";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_list_cartype() {
        $sql = "select  cartype_type from tb_cartype order by   cartype_id asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_list_carbrand() {
        $sql = "select  carbrand_brand from tb_carbrand order by   carbrand_id asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function get_list_carcolor() {
        $sql = "select  carcolor_color from tb_carcolor order by    carcolor_id asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function save_car($em_employeeid, $car_registerdate, $car_taxdate, $car_type, $car_brand, $car_number, $car_licenseplate, $car_province, $car_color, $date, $user){
        $this->db->set('em_employeeid',$em_employeeid);
        $this->db->set('car_registerdate',$car_registerdate);
        $this->db->set('car_taxdate',$car_taxdate);
        $this->db->set('car_type',$car_type);
        $this->db->set('car_brand',$car_brand);
        $this->db->set('car_number',$car_number);
        $this->db->set('car_licenseplate',$car_licenseplate);
        $this->db->set('car_province',$car_province);
        $this->db->set('car_color',$car_color);
        $this->db->set('create_date',$date);
        $this->db->set('create_user',$user);
        $this->db->set('update_date',$date);
        $this->db->set('update_user',$user);
        $this->db->insert('tb_car');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete_car($id = ''){
        $this->db->where('car_id', $id);
        $this->db->delete('tb_car'); 
        if ($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    public function get_list_plb() {
        $sql = "select  * from tb_plb order by   plb_id asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }

    public function save_plb($car_licenseplate, $car_province, $plb_company, $plb_protection_start, $plb_protection_end, $date, $user){
        $this->db->set('car_licenseplate',$car_licenseplate);
        $this->db->set('car_province',$car_province);
        $this->db->set('plb_company',$plb_company);
        $this->db->set('plb_protection_start',$plb_protection_start);
        $this->db->set('plb_protection_end',$plb_protection_end);
        $this->db->set('create_date',$date);
        $this->db->set('create_user',$user);
        $this->db->set('update_date',$date);
        $this->db->set('update_user',$user);
        $this->db->insert('tb_plb');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete_plb($id = ''){
        $this->db->where('plb_id', $id);
        $this->db->delete('tb_plb'); 
        if ($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function get_list_insurance() {
        $sql = "select  * from tb_insurance order by   in_id asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function save_insurance($car_licenseplate, $car_province, $in_company, $in_type, $in_protection_start, $in_protection_end, $in_money, $user, $date){
        $this->db->set('car_licenseplate',$car_licenseplate);
        $this->db->set('car_province',$car_province);
        $this->db->set('in_company',$in_company);
        $this->db->set('in_type',$in_type);
        $this->db->set('in_protection_start',$in_protection_start);
        $this->db->set('in_protection_end',$in_protection_end);
        $this->db->set('in_money',$in_money);
        $this->db->set('create_date',$date);
        $this->db->set('create_user',$user);
        $this->db->set('update_date',$date);
        $this->db->set('update_user',$user);
        $this->db->insert('tb_insurance');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function delete_insurance($id = ''){
        $this->db->where('in_id', $id);
        $this->db->delete('tb_insurance'); 
        if ($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }

    public function get_list_checkcar() {
        $sql = "select * from tb_checkcar order by chk_id asc";
        $result = $this->db->query($sql);
        $result = $result->result_array();
        return $result;
    }
    public function save_checkcar($car_licenseplate, $car_province, $chk_date, $chk_complete, $chk_text, $user, $date){
        $this->db->set('car_licenseplate',$car_licenseplate);
        $this->db->set('car_province',$car_province);
        $this->db->set('chk_date',$chk_date);
        $this->db->set('chk_complete',$chk_complete);
        $this->db->set('chk_text',$chk_text);
        $this->db->set('create_date',$date);
        $this->db->set('create_user',$user);
        $this->db->set('update_date',$date);
        $this->db->set('update_user',$user);
        $this->db->insert('tb_checkcar');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function delete_checkcar($id = ''){
        $this->db->where('chk_id', $id);
        $this->db->delete('tb_checkcar'); 
        if ($this->db->affected_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }
    public function save_plobem($plobem,$date,$user) {
        $this->db->set('plobem_detail',$plobem);
        $this->db->set('create_date',$date);
        $this->db->set('create_user',$user);
        $this->db->set('update_date',$date);
        $this->db->set('update_user',$user);
        $this->db->insert('tb_plobem');
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

}

?>
