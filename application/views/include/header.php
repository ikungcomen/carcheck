<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <title>สถานตรวจสภาพรถเอกชน</title>

        <!-- css header table-->
        <link  href="<?php echo base_url();?>css/header_table.css" rel="stylesheet">
        <link  href="<?php echo base_url();?>css/mynavbar.css" rel="stylesheet">

        
        <script src="<?php echo base_url();?>js/mybootstrap.min.js"></script>
        <!-- jquery-->
        <script src="<?php echo base_url();?>js/jquery-1.4.2.min.js"></script>

        <!-- Modal -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

        <!-- Paging -->
        <script src="<?php echo base_url();?>js/tablepagegin.js"></script>

        
        
        
        <!--style="float:right;list-style-type:none;"-->
        <!--border-right:1px solid #bbb;-->
        <style>
            input.request{
                border-color: red;
            }
            select.request{
                border-color: red;
            }
            textarea.request{
                border-color: red;
            }
          a.non_underline {
              text-decoration: none;
          }
              ul.header{
                  list-style-type: none;
                  margin-top: 80px;
                  margin-left: 10px;
                  margin-right: 10px;
                  padding: 0;
                  overflow: hidden;
                  background-color: #424242;
                  height: 80px;

              }
              li{
                  float: left;
                  
                  
              }

              li:last-child {
                  border-right: none;
                  
              }


              li a {

                  display: block;
                  color: white;
                  text-align: center;
                  text-decoration: none;
                  padding: 30px 16px;
                 

              }

              li a:hover:not(.active) {
                  background-color: #0080FF;
                  color: #FAFAFA;
              }

              .start {
                  background-color: #0080FF;
              }
              div.title{
                background-color: #0080FF;
                height: 150px;
                width: 100%;
                position: fixed;
              }
              

              #footer {
                 position:fixed;
                 bottom:0;
                 width:100%;
                 height:80px;   /* Height of the footer */
                 background:#0080FF;
              }
              </style>
    </head>
    
    <body>

            <!--<nav class="navbar navbar-inverse navbar-fixed-top">
              <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="#">Ikung Developer</a>
                </div>
                <div>
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="<?php echo base_url(); ?>index.php/MainController/load_main"><span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;หน้าแรก</span></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/EmployeeController/employee_detail"><span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;ข้อมูลบุคคล</span></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/CarController/car_detail"><span class="glyphicon glyphicon-plane" aria-hidden="true">&nbsp;ข้อมูลรถ</span></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/PlbController/plb_detail"><span class="glyphicon glyphicon glyphicon-align-justify" aria-hidden="true">&nbsp;ข้อมูล พ.ร.บ</span></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/InsuranceController/insurance_detail"><span class="glyphicon glyphicon-book" aria-hidden="true">&nbsp;ข้อมูลประกันภัย</span></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/CheckcarController/checkcar_detail"><span class="glyphicon glyphicon-check" aria-hidden="true">&nbsp;ข้อมูลการตรวจสภาพ</span></a></li>
                    <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-indent-left" aria-hidden="true">&nbsp;ข้อมูล</span><span class="caret"></span></a>
                           <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php//">เพิ่มข้อมูลประเภทรถ</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php//">เพิ่มข้อมูลสีรถ</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php//">เพิ่มข้อมูลยี่ห้อรถ</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php//">เพิ่มข้อมูลตำบล</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php//">เพิ่มข้อมูลอำเภอ</a></li>
                                <li><a href="<?php echo base_url(); ?>index.php//">เพิ่มข้อมูลจังหวัด</a></li>
                          </ul>
                      </li>
                    
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                      <li class="active"><?php echo "<a>สวัสดีคุณ"." : ".$this->session->userdata('name')."&nbsp;&nbsp;&nbsp;&nbsp;สถานะ : ".$this->session->userdata('role')."</a>";?></li>
                      
                      <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">จัดการ <span class="caret"></span></a>
                           <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>index.php/ManageUserController/send_plobem">แจ้งปัญหาการใช้งาน</a></li>
                                <?php if($this->session->userdata('username') =='admin'){?>
                                        <li><a href="<?php echo base_url(); ?>index.php/ManageUserController/load_user">จัดการผู้ใช้</a></li>
                                   <?php }?>
                                
                                <li><a href="<?php echo base_url(); ?>index.php/ContactController/load_contact">ติดต่อผู้ดูแล</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url(); ?>index.php/Logincontoller/logout"><span class="glyphicon glyphicon-off" aria-hidden="true">&nbsp;<font color="red">ออกจากระบบ</font></span></a></li>
                          </ul>
                      </li>
                  </ul>
                </div>
              </div>
            </nav>
            -->
            <div class="title">
              <ul class="header">
                <li ><a href="<?php echo base_url(); ?>index.php/MainController/load_main"><span class="glyphicon glyphicon-home" aria-hidden="true">&nbsp;หน้าแรก</span></a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/EmployeeController/employee_detail"><span class="glyphicon glyphicon-user" aria-hidden="true">&nbsp;ข้อมูลบุคคล</span></a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/CarController/car_detail"><span class="glyphicon glyphicon-plane" aria-hidden="true">&nbsp;ข้อมูลรถ</span></a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/PlbController/plb_detail"><span class="glyphicon glyphicon glyphicon-align-justify" aria-hidden="true">&nbsp;ข้อมูล พ.ร.บ</span></a></li>
                      <li><a href="<?php echo base_url(); ?>index.php/InsuranceController/insurance_detail"><span class="glyphicon glyphicon-book" aria-hidden="true">&nbsp;ข้อมูลประกันภัย</span></a></li>
                      <li ><a href="<?php echo base_url(); ?>index.php/CheckcarController/checkcar_detail"><span class="glyphicon glyphicon-check" aria-hidden="true">&nbsp;ข้อมูลการตรวจสภาพ</span></a></li>
                      
                      <li  style="float:right;list-style-type:none;"><a class="non_underline" href="<?php echo base_url(); ?>index.php/Logincontoller/logout">ออกจากระบบ</a></li>
                      <li  class="start" style="float:right;list-style-type:none;"><a class="non_underline" href="<?php echo base_url(); ?>index.php/ContactController/load_contact">ติดต่อผู้ดูแล</a></li>
                    
              </ul>
            </div>
            <div class="MainContainer">
    </div>  
   

              <br><br><br><br><br>
              <div class="container">
                 <br><br><br>

    
  


 



      



          
         