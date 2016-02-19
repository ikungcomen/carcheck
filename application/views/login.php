<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>เข้าสู่ระบบ</title>
    
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/mycsslogin.css">
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <!-- jquery-->
    <script src="<?php echo base_url();?>js/jquery-1.4.2.min.js"></script>



    <!-- Modal -->
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
        <div class="card card-container">
            <center><img src="<?php echo base_url();?>img/ikunglogo-s.jpg" alt=""></center><br>
            <center><p><h4>เข้าสู่ระบบ</h4></p></center>
            <!--<img id="profile-img" class="profile-img-card" src="<?php echo base_url();?>img/ikunglogo-s.jpg" />-->
            
            <?php if($this->session->userdata('user_login') == 'N'){ ?>
                <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert">ชื่อผู้ใช้ของท่านยังไม่ผ่านการอนุมัติ</div>
            <?php }?>

            <form id="aaa" class="form-signin" action="<?php echo base_url(); ?>index.php/logincontoller/checkLogin" method="post">
                <input type="text" id="inputEmail"  name="username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <!--<div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>-->
                <a class="non_underline" href="<?php echo base_url(); ?>index.php/Welcome/load_register" class="forgot-password">
                ลงทะเบียน ?
            </a><br><br>
                
                <center><a id="btn_login"  class="btn btn-info btn-lg">เข้าสู่ระบบ</a></center>
            </form><!-- /form -->
            
        </div><!-- /card-container -->
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
            $("#btn_login").click(function() {
                var inputEmail = $('#inputEmail').val();
                var inputPassword = $('#inputPassword').val();
                if(inputEmail == ""){
                    $('#value_message').html('กรุณาระบุ username');
                    $('#myModal').modal('show');
                 }else if (inputPassword == "") {
                    $('#value_message').html('กรุณาระบุ password');
                    $('#myModal').modal('show');
                 }else{
                    $("#aaa").submit();
                 }
                
            });
            window.setTimeout(function() { $("#alert-message").alert('close'); }, 2000);
        });

    </script>
</body>
</html>