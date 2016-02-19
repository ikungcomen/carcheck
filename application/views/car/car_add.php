<div class="col-md-12 " >
    <div class="row">
        <div class="col-sm-12">
             <center><h4><b>เพิ่มข้อมูลรถ</b></h4></center>
             <a class="btn btn-success " href="<?php echo base_url(); ?>index.php/CarController/car_detail"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
             <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <form id="car_add" method="post" action="<?php echo base_url(); ?>index.php/CarController/save_car">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">เลขประจำตัวประชาชนผู้ครอบครองรถ :</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="number" maxlength="13" id="em_employeeid" name="em_employeeid"    placeholder="เลขประจำตัวประชาชนผู้ครอบครองรถ" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">วันที่จดทะเบียน :</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="car_registerdate" name="car_registerdate"    placeholder="วันที่จดทะเบียน" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">วันที่เสียภาษีประจำปี :</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="car_taxdate" name="car_taxdate"    placeholder="วันที่เสียภาษีประจำปี" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ประเภทรถ :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="car_type" name="car_type" required>
                                    <option value="">----เลือกประเภทรถ----</option>
                                   <?php foreach ($cartype as $row) { ?>
                                    <option value="<?php echo $row['cartype_type'];?>"><?php echo $row['cartype_type'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ยี่ห้อรถ :</label>
                            <div class="col-sm-10">

                                <select class="form-control" id="car_brand" name="car_brand" required>
                                <option value="">----เลือกยี่ห้อรถ----</option>
                                    <?php foreach ($carbrand as $row) { ?>
                                    <option value="<?php echo $row['carbrand_brand'];?>"><?php echo $row['carbrand_brand'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">หมายเลขตัวถังรถ :</label>
                            <div class="col-sm-10">
                                <input class="form-control " type="number"  maxlength="11" id="car_number" name="car_number" placeholder="หมายเลขตัวถังรถ" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ทะเบียนรถ :</label>
                            <div class="col-sm-10">
                                <input class="form-control " type="text" maxlength="20" id="car_licenseplate" name="car_licenseplate" placeholder="ทะเบียนรถ" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">จังหวัด :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="car_province" name="car_province" required>
                                <option value="">----เลือกจังหวัด----</option>
                                <?php foreach ($province as $row) { ?>
                                    <option value="<?php echo $row['pro_name'];?>"><?php echo $row['pro_name'];?></option>
                                <?php } ?>
                                    
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">สีรถ :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="car_color" name="car_color" required>
                                <option value="">----เลือกสีรถ----</option>
                                    <?php foreach ($carcolor as $row) { ?>
                                         <option value="<?php echo $row['carcolor_color'];?>"><?php echo $row['carcolor_color'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a id="save" class="btn btn-info btn-lg">บันทึกข้อมูล</a>
                                <button type="reset" class="btn btn-danger btn-lg">ยกเลิก</button>
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
                     var em_employeeid = $('#em_employeeid').val();
                     var car_registerdate = $('#car_registerdate').val();
                     var car_taxdate = $('#car_taxdate').val();
                     var car_type = $('#car_type').val();
                     var car_brand = $('#car_brand').val();
                     var car_number = $('#car_number').val();
                     var car_licenseplate = $('#car_licenseplate').val();
                     var car_province = $('#car_province').val();
                     var car_color = $('#car_color').val();


                     if( em_employeeid == ""){
                        $('#value_message').html('กรุณาระบุ เลขประจำตัวประชาชนผู้ครอบครองรถ');
                        $('#myModal').modal('show');
                     }else if ( car_registerdate == "") {
                        $('#value_message').html('กรุณาระบุ วันที่จดทะเบียน');
                        $('#myModal').modal('show');
                     }else if ( car_taxdate == "") {
                        $('#value_message').html('กรุณาระบุ วันที่เสียภาษีประจำปี ');
                        $('#myModal').modal('show');
                     }else if ( car_type == "") {
                        $('#value_message').html('กรุณาระบุ ประเภทรถ');
                        $('#myModal').modal('show');
                     }else if ( car_brand == "") {
                        $('#value_message').html('กรุณาระบุ ยี่ห้อรถ');
                        $('#myModal').modal('show');
                     }else if ( car_number == "") {
                        $('#value_message').html('กรุณาระบุ หมายเลขตัวถังรถ');
                        $('#myModal').modal('show');
                     }else if ( car_licenseplate == "") {
                        $('#value_message').html('กรุณาระบุ ทะเบียนรถ');
                        $('#myModal').modal('show');
                     }else if ( car_province == "") {
                        $('#value_message').html('กรุณาระบุ จังหวัด');
                        $('#myModal').modal('show');
                     }else if ( car_color == "") {
                        $('#value_message').html('กรุณาระบุ สีรถ');
                        $('#myModal').modal('show');
                     }else{
                        $('#message_confirm').html('ท่านต้องการบันทึกข้อมูล ใช่หรือไม่');
                        $('#myModal_confirm').modal('show');
                            $('#confirm').click(function(){
                                $("#car_add").submit();
                         });
                     }
                });
            $('#em_employeeid').keyup(function(){ 
                
                var limit = parseInt($(this).attr('maxlength'));  
                var text = $(this).val();  
                var chars = text.length;  
                if(chars > limit){  
                    var new_text = text.substr(0, limit);  
                    $(this).val(new_text);  
                } 
            });
            $('#car_number').keyup(function(){ 
                
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

