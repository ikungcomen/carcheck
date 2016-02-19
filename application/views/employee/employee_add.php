<div class="col-md-12 ">
    <div class="row">
        <div class="col-sm-12">
            <center><h4><b>เพิ่มข้อมูลบุคคล</b></h4></center>
            <a class="btn btn-success " href="<?php echo base_url(); ?>index.php/EmployeeController/employee_detail"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
            <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <form id="employee_add" method="post" action="<?php echo base_url(); ?>index.php/EmployeeController/insert_employee">
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
                                <input class="form-control selectValue" maxlength="40" type="text" id="name" name="name"    required >
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">นามสกุล :</label>
                            <div class="col-sm-10">
                                <input class="form-control selectValue" maxlength="40"  type="text" id="lastName" name="lastName"    required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label  class="col-sm-2 control-label">เลขที่บัตรประจำตัวประชาชน :</label>
                            <div class="col-sm-10">
                                <input class="form-control selectValue employeeId"  type="number" maxlength="13" id="employeeId " name="employeeId"  required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">เบอร์ที่ติดต่อได้ :</label>
                            <div class="col-sm-10">
                                <input class="form-control selectValue phonenumber" type="number"   maxlength="10" id="phonenumber" name="phonenumber" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ที่อยู่ปัจจุบัน :</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control selectValue"  id="address" name="address" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ตำบล :</label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="subdistrict" name="subdistrict">
                                    <option value="">---เลือกตำบล---</option>
                                    <?php foreach ($subdistrict as $row) { ?>
                                        <option value="<?php echo $row['dis_id']; ?>"><?php echo $row['sub_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">อำเภอ :</label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="district" name="district">
                                    <option value="">---เลือกอำเภอ---</option>
                                    <?php foreach ($district as $row) { ?>
                                        <option value="<?php echo $row['dis_id']; ?>"><?php echo $row['dis_name']; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">จังหวัด :</label>
                            <div class="col-sm-10">
                                <select class="form-control" required id="province" name="province">
                                    <option value="">---เลือกจังหวัด---</option>
                                    <?php foreach ($province as $row) { ?>
                                        <option value="<?php echo $row['pro_id']; ?>"><?php echo $row['pro_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">รหัสไปรษณีย์ :</label>
                            <div class="col-sm-10">
                                <input class="form-control selectValue postCode" type="number" maxlength="5" id="postCode" name="postCode"  required>
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
        $("#subdistrict").change(function(){
            $("#district").empty();//ล้างข้อมูล
            $("#province").empty();//ล้างข้อมูล
            var  dis_id = $('#subdistrict').val();
            //alert(dis_id);
            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/EmployeeController/change_subdistrict/"+dis_id,
                    dataType: "JSON",
                    success:function(data){
                        var opt_dis;//="<option>---เลือกอำเภอ---</option>";
                        var opt_pro;
                        $.each(data, function(key, val){
                            opt_dis +="<option value='"+ val["dis_id"] +"'>"+val["dis_name"]+"</option>"
                            opt_pro +="<option value='"+ val["pro_id"] +"'>"+val["pro_name"]+"</option>"
                        });
                        $("#district").html(opt_dis);
                        $("#province").html(opt_pro);
                    },
            });
        });

        $("#district").change(function(){
            $("#subdistrict").empty();//ล้างข้อมูล
            $("#province").empty();//ล้างข้อมูล
            var  dis_id = $('#district').val();
            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/EmployeeController/change_district_get_subdistrict/"+dis_id,
                    dataType: "JSON",
                    success:function(data){
                        var opt_subdis;//="<option>---เลือกอำเภอ---</option>";
                        $.each(data, function(key, val){
                            opt_subdis +="<option value='"+ val["sub_id"] +"'>"+val["sub_name"]+"</option>"
                        });
                        $("#subdistrict").html(opt_subdis);
                       
                    },
            });

            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/EmployeeController/get_district_fornChange_district/"+dis_id,
                    dataType: "html",
                    success:function(data){
                        //alert(data);
                        $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>index.php/EmployeeController/change_district_get_province/"+data,
                                dataType: "JSON",
                                success:function(data){
                                    var opt_subdis;//="<option>---เลือกอำเภอ---</option>";
                                    $.each(data, function(key, val){
                                        opt_subdis +="<option value='"+ val["pro_id"] +"'>"+val["pro_name"]+"</option>"
                                    });
                                    $("#province").html(opt_subdis);
                                   
                                },
                        });
                       
                    },
            });
        });




        $("#province").change(function(){
            $("#subdistrict").empty();//ล้างข้อมูล
            $("#district").empty();//ล้างข้อมูล
            var pro_id = $('#province').val();
            var dis_id;
            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/EmployeeController/change_province_get_district/"+pro_id,
                    dataType: "JSON",
                    success:function(data){
                        var opt_subdis;//="<option>---เลือกอำเภอ---</option>";

                        $.each(data, function(key, val){
                            opt_subdis +="<option value='"+ val["dis_id"] +"'>"+val["dis_name"]+"</option>"
                        });
                        $("#district").html(opt_subdis);
                       
                    },
            });
            $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/EmployeeController/get_district_id/"+pro_id,
                    dataType: "html",
                    success:function(data){
                        dis_id  = data;
                        $.ajax({
                                type: "POST",
                                url: "<?php echo base_url(); ?>index.php/EmployeeController/change_province_get_subdistrict/"+dis_id,
                                dataType: "JSON",
                                success:function(data){
                                    var opt_subdis;//="<option>---เลือกอำเภอ---</option>";
                                    $.each(data, function(key, val){
                                        opt_subdis +="<option value='"+ val["sub_id"] +"'>"+val["sub_name"]+"</option>"
                                    });
                                    $("#subdistrict").html(opt_subdis);
                                   
                                },
                        });
                    },
            });
        });
        $("#save").click(function() {
            var gen = $('#gen').val();
            var name = $('#name').val();
            var lastName = $('#lastName').val();
            var employeeId = $('.employeeId').val();
            var phonenumber = $('#phonenumber').val();
            var address = $('#address').val();
            var subdistrict = $('#subdistrict').val();
            var district = $('#district').val();
            var province = $('#province').val();
            var postCode = $('#postCode').val();
            if(gen == ""){
                $('#value_message').html('กรุณาระบุ คำนำหน้า');
                $('#myModal').modal('show');
            }else if (name == "") {
                $('#value_message').html('กรุณาระบุ ชื่อ');
                $('#myModal').modal('show');
            }else if (lastName == "") {
                $('#value_message').html('กรุณาระบุ นามสกุล');
                $('#myModal').modal('show');
            }else if (employeeId == "") {
                $('#value_message').html('กรุณาระบุ เลขที่บัตรประจำตัวประชาชน');
                $('#myModal').modal('show');
            }else if (phonenumber == "") {
                $('#value_message').html('กรุณาระบุ เบอร์ที่ติดต่อได้');
                $('#myModal').modal('show');
            }else if (address == "") {
                $('#value_message').html('กรุณาระบุ ที่อยู่ปัจจุบัน');
                $('#myModal').modal('show');
            }else if (subdistrict == "") {
                $('#value_message').html('กรุณาระบุ ตำบล');
                $('#myModal').modal('show');
            }else if (district == "") {
                $('#value_message').html('กรุณาระบุ อำเภอ');
                $('#myModal').modal('show');
            }else if (province == "") {
                $('#value_message').html('กรุณาระบุ จังหวัด');
                $('#myModal').modal('show');
            }else if (postCode == "") {
                $('#value_message').html('กรุณาระบุ รหัสไปรษณีย์');
                $('#myModal').modal('show');
            }else{
                $('#message_confirm').html('ท่านต้องการบันทึกข้อมูล ใช่หรือไม่');
                $('#myModal_confirm').modal('show');
                $('#confirm').click(function(){
                    $("#employee_add").submit();
                });
            }
        });
       $('#name').keyup(function(){ 
            var limit = parseInt($(this).attr('maxlength'));  
            var text = $(this).val();
            var chars = text.length;  
            if(chars > limit){  
                var new_text = text.substr(0, limit);  
                $(this).val(new_text);  
            } 
        });
        $('#lastName').keyup(function(){ 
            var limit = parseInt($(this).attr('maxlength'));  
            var text = $(this).val();  
            var chars = text.length;  
            if(chars > limit){  
                var new_text = text.substr(0, limit);  
                $(this).val(new_text);  
            } 
        });
        $('.employeeId').keyup(function(){ 
            
            var limit = parseInt($(this).attr('maxlength'));  
            var text = $(this).val();  
            var chars = text.length;  
            if(chars > limit){  
                var new_text = text.substr(0, limit);  
                $(this).val(new_text);  
            } 
        });
        $('#phonenumber').keyup(function(){ 
            var limit = parseInt($(this).attr('maxlength'));  
            var text = $(this).val();  
            var chars = text.length;  
            if(chars > limit){  
                var new_text = text.substr(0, limit);  
                $(this).val(new_text);  
            } 
        });
        $('.postCode').keyup(function(){ 
            var limit = parseInt($(this).attr('maxlength'));  
            var text = $(this).val();  
            var chars = text.length;  
            if(chars > limit){  
                var new_text = text.substr(0, limit);  
                $(this).val(new_text);  
            } 
        });
        
        
    });

</script>