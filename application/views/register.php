<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>ลงทะเบียน</title>
	<link  href="<?php echo base_url();?>css/mynavbar.css" rel="stylesheet">
    <!-- jquery-->
    <script src="<?php echo base_url();?>js/jquery-1.4.2.min.js"></script>

    <!-- Modal -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <style>
          a.non_underline {
              text-decoration: none;
          }
    </style>
</head>
<body >
    <br><br><br>
		<div class="container">
            <div class="panel-body form-horizontal payment-form">
            <p id="profile-name" class="profile-name-card"></p>
            <form id="register_add" class="form-signin" action="<?php echo base_url(); ?>index.php/ManageUserController/register_user" method="post">
                <center><img src="<?php echo base_url();?>img/ikunglogo-s.jpg" alt=""></center><br>
                <center><p><h4>ลงทะเบียนเข้าใช้งานระบบ</h4></p></center>
                <br><br><br>
                <div class="form-group">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <?php if($this->session->userdata('register') == 'C' ){?>
                            <div id="alert-message" class="alert alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> บันทึกข้อมูลเรียบร้อย
                            </div>
                        <?php }else if($this->session->userdata('register') == 'N' ){?>
                            <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Warning!</strong> ไม่สามารถบันทึกข้อมูลได้
                            </div>
                        <?php }?>
                    </div>
                    <div class="col-sm-4">
                    </div>

                </div>
                
                <div class="form-group">
                            <label  class="col-sm-4 control-label">คำนำหน้า :</label>
                            <div class="col-sm-4">
                                <select class="form-control"   id="gen" name="gen">
                                    <option value="">----เลือกคำนำหน้า----</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                <div class="form-group">
                    <label  class="col-sm-4 control-label text-right">ชื่อ :</label>
                    <div class="col-sm-4">
                        <input class="form-control selectValue"  type="text"  maxlength="30" id="name" name="name"  required>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 control-label text-right">นามสกุล :</label>
                    <div class="col-sm-4">
                        <input class="form-control selectValue"  type="text"  maxlength="30" id="lastname" name="lastname"  required>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 control-label text-right">ชื่อผู้ใช้งาน :</label>
                    <div class="col-sm-4">
                        <input class="form-control selectValue"  type="text" maxlength="20" id="username" name="username"  required>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-4 control-label text-right">รหัสผ่าน :</label>
                    <div class="col-sm-4">
                        <input class="form-control selectValue"  type="text"  maxlength="20"  id="password" name="password"  required>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4 text-left" >
                       <a class="non_underline" href="<?php echo base_url(); ?>index.php/Welcome/index" class="forgot-password">
                        เข้าสู่ระบบ ?
                    </a>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4 text-center">
                    <a id="save" class="btn btn-info btn-lg">บันทึกข้อมูล</a>
                    <button  type="reset" class="btn btn-danger btn-lg">ยกเลิก</button>
                    </div>
                    <div class="col-sm-4">
                    </div>
                </div>
            </form><!-- /form -->
        </div>
    </div><!-- /container -->
    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><font color="red">Error Message</font></h4>
        </div>
        <div class="modal-body">
          <p id="value_message"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

  <!-- Confirm Modal-->
  <div class="modal fade" id="myModal_confirm" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><font color="blue">Confirm Dialog</font></h4>
            </div>
            <div class="modal-body">
              <p id="message_confirm"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="confirm" data-dismiss="modal" class="btn btn-primary" id="delete">ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
          </div>
    </div>
  </div>
  <script type="text/javascript">
        $(document).ready(function() {
          $("#save").click(function() {
                var gen = $('#gen').val();
                var name = $('#name').val();
                var lastname = $('#lastname').val();
                var username = $('#username').val();
                var password = $('#password').val();

               
                if(gen == ""){
                    $('#value_message').html('กรุณาระบุ คำนำหน้า');
                    $('#myModal').modal('show');
                 }else if (name == "") {
                    $('#value_message').html('กรุณาระบุ ชื่อ');
                    $('#myModal').modal('show');
                 }else if (lastname == "") {
                    $('#value_message').html('กรุณาระบุ นามสกุล');
                    $('#myModal').modal('show');
                 }else if (username == "") {
                    $('#value_message').html('กรุณาระบุ ชื่อผู้ใช้งาน');
                    $('#myModal').modal('show');
                 }else if (password == "") {
                    $('#value_message').html('กรุณาระบุ รหัสผ่าน');
                    $('#myModal').modal('show');
                 }else{
                    $('#message_confirm').html('ท่านต้องการบันทึกข้อมูล ใช่หรือไม่');
                    $('#myModal_confirm').modal('show');
                        $('#confirm').click(function(){
                            $("#register_add").submit();
                     });
                 }

          });
        $("#alert-message").alert();
                window.setTimeout(function() { $("#alert-message").alert('close'); }, 2000);
        });
  </script>
</body>
</html>