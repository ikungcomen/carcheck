<div class="col-md-12 ">
    <div class="row">
        <div class="col-sm-12">
            <h4><b>เพิ่มผู้ใช้งาน</b>

            </h4>
            <a class="btn btn-success " href="<?php echo base_url(); ?>index.php/ManageUserController/load_user">ย้อนกลับ</a>
            <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <form id="user_add" method="post" action="<?php echo base_url(); ?>index.php/ManageUserController/add_user">
                    <fieldset> 


                        <div class="form-group">
                            <label  class="col-sm-2 control-label">คำนำหน้า :</label>
                            <div class="col-sm-10">
                                <select class="form-control" required autofocus id="gen" name="gen">
                                    <option value="">----เลือกคำนำหน้า----</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="นาง">นาง</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ชื่อ :</label>
                            <div class="col-sm-10">
                                <input class="form-control selectValue" type="text" maxlength="30" id="name" name="name"    required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">นามสกุล :</label>
                            <div class="col-sm-10">
                                <input class="form-control selectValue" type="text" maxlength="30" id="lastName" name="lastName"    required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ชื่อผู้ใช้งาน :</label>
                            <div class="col-sm-10">
                                <input class="form-control selectValue"  type="text"  maxlength="20" id="username " name="username"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">รหัสผ่าน :</label>
                            <div class="col-sm-10">
                                <input class="form-control selectValue" type="text"    maxlength="20"  id="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">สิทธิ์เข้าใช้งาน :</label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="role" name="role">
                                    <option value="">----เลือกสิทธิ์เข้าใช้งาน----</option>
                                    <option value="admin">admin</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">สถานะ :</label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="status" name="status">
                                    <option value="">----เลือกสถานะ----</option>
                                    <option value="APPROVE">อนุมัติ</option>
                                    <option value="NONAPPROVE">ไม่อนุมัติ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                
                                <a id="save" class="btn btn-info btn-lg">บันทึกข้อมูล</a>
                                <button  type="reset" class="btn btn-danger btn-lg">ยกเลิก</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

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
                var name = $('#name').val();
                var gen = $('#gen').val();
                var lastName = $('#lastName').val();
                var username = $('#username').val();
                var password = $('#password').val();
                var role = $('#role').val();
                var status = $('#status').val();

                if(gen == ""){
                    $('#value_message').html('กรุณาระบุ คำนำหน้า');
                    $('#myModal').modal('show');
                 }else if (name == "") {
                    $('#value_message').html('กรุณาระบุ ชื่อ');
                    $('#myModal').modal('show');
                 }else if (lastName == "") {
                    $('#value_message').html('กรุณาระบุ นามสกุล');
                    $('#myModal').modal('show');
                 }else if (username == "") {
                    $('#value_message').html('กรุณาระบุ ชื่อผู้ใช้งาน');
                    $('#myModal').modal('show');
                 }else if (password == "") {
                    $('#value_message').html('กรุณาระบุ รหัสผ่าน');
                    $('#myModal').modal('show');
                 }else if (role == "") {
                    $('#value_message').html('กรุณาระบุ สิทธิ์เข้าใช้งาน');
                    $('#myModal').modal('show');
                 }else if (status == "") {
                    $('#value_message').html('กรุณาระบุ สถานะ');
                    $('#myModal').modal('show');
                 }else{
                    $('#message_confirm').html('ท่านต้องการบันทึกข้อมูล ใช่หรือไม่');
                    $('#myModal_confirm').modal('show');
                        $('#confirm').click(function(){
                            $("#user_add").submit();
                     });
                 }
                
            });
        $(".selectValue").click(function(event) {
           $(this).select();
        });
    });
    

</script>