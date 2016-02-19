<?php
  Class User extends CI_Model{
       function login($username, $password){
             
             /*$this -> db -> select('ad_id, ad_username, ad_password');
             $this -> db -> from('tb_admin');
             $this -> db -> where('ad_username', $username);
             $this -> db -> where('ad_password', MD5($password));
             $this -> db -> limit(1);
           
             $query = $this -> db -> get();
           
             if($query -> num_rows() == 1)
             {
               return $query->result();
             }
             else
             {
               return false;
             }*/
          $sql = "select * from tb_admin where ad_username = '" . $username . "' and ad_password = '" . $password. "' and ad_status = 'APPROVE'";
          $query = $this->db->query($sql);
          //return $query->num_rows();
          return $query;
       }
       public function get_list_user(){
          $sql = "select * from tb_admin order by ad_role";
          $query = $this->db->query($sql);
          $query = $query->result_array();
          return $query;
       }
       public function approve_user($id){
              $this->db->set('ad_status', "APPROVE");
              $this->db->where('ad_id', $id);
              $this->db->update('tb_admin'); 
              if ($this->db->affected_rows() > 0) {
                  return 1;
              } else {
                  return 0;
              }
       }
       public function unapprove($id){
          $this->db->set('ad_status', "NONAPPROVE");
          $this->db->where('ad_id', $id);
          $this->db->update('tb_admin'); 
          if ($this->db->affected_rows() > 0) {
                return 1;
            } else {
                return 0;
            }
       }

       public function add_user($gen,$name,$lastName,$username,$password,$role,$status,$date,$add_by){
          $this->db->set('ad_name',$gen." ".$name);
          $this->db->set('ad_lastname',$lastName);
          $this->db->set('ad_username',$username);
          $this->db->set('ad_password',$password);
          $this->db->set('ad_role',$role);
          $this->db->set('ad_status',$status);
          $this->db->set('create_date',$date);
          $this->db->set('create_user',$add_by);
          $this->db->set('update_date',$date);
          $this->db->set('update_user',$add_by);
          $this->db->insert('tb_admin');
          if ($this->db->affected_rows() > 0) {
            return 1;
          } else {
              return 0;
          }

       }
       public function delete_user($id){
          $this->db->where('ad_id', $id);
          $this->db->delete('tb_admin'); 
          if ($this->db->affected_rows() > 0) {
                return 1;
            } else {
                return 0;
            }
       }
       public function register_user($gen,$name,$lastName,$username,$password,$date,$add_by){
          $this->db->set('ad_name',$gen." ".$name);
          $this->db->set('ad_lastname',$lastName);
          $this->db->set('ad_username',$username);
          $this->db->set('ad_password',$password);
          $this->db->set('ad_role',"user");
          $this->db->set('ad_status',"NONAPPROVE");
          $this->db->set('create_date',$date);
          $this->db->set('create_user',$add_by);
          $this->db->set('update_date',$date);
          $this->db->set('update_user',$add_by);
          $this->db->insert('tb_admin');
          if ($this->db->affected_rows() > 0) {
            return 1;
          } else {
              return 0;
          }

       }
  }


?>