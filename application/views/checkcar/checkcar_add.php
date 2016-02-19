<div class="col-md-12">
    <div class="row">
        <div class="col-sm-12">
             <center><h4><b>เพิ่มข้อมูลตรวจสภาพรถ</b></h4></center>
             <a class="btn btn-success " href="<?php echo base_url(); ?>index.php/CheckcarController/checkcar_detail"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
             <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <form id="checkcar_add" method="post" action="<?php echo base_url(); ?>index.php/CheckcarController/save_checkcar">
                    <fieldset>  
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
                                        <option value="<?php echo $row['pro_name']; ?>"><?php echo $row['pro_name']; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">วันที่ตรวจสภาพรถ :</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="chk_date" name="chk_date"    placeholder="วันที่ตรวจสภาพรถ" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ผลการตรวจสภาพ :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="chk_complete" name="chk_complete" required>
                                    <option value="">----เลือกผลการตรวจสภาพ----</option>
                                    <option value="ผ่าน">ผ่าน</option>
                                    <option value="ไม่ผ่าน">ไม่ผ่าน</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">รายการที่ตรวจไม่ผ่าน :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control " placeholder="รายการที่ตรวจไม่ผ่าน" id=" chk_text" name="chk_text" required> </textarea>
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
                var car_licenseplate = $('#car_licenseplate').val();
                var car_province = $('#car_province').val();
                var chk_date = $('#chk_date').val();
                var chk_complete = $('#chk_complete').val();

                if(  car_licenseplate == ""){
                    $('#value_message').html('กรุณาระบุ ทะเบียนรถ');
                    $('#myModal').modal('show');
                }else if ( car_province == "") {
                    $('#value_message').html('กรุณาระบุ จังหวัด');
                    $('#myModal').modal('show');
                }else if ( chk_date == "") {
                    $('#value_message').html('กรุณาระบุ วันที่ตรวจสภาพรถ');
                    $('#myModal').modal('show');
                }else if ( chk_complete == "") {
                    $('#value_message').html('กรุณาระบุ ผลการตรวจสภาพ');
                    $('#myModal').modal('show');
                }else{
                    $('#message_confirm').html('ท่านต้องการบันทึกข้อมูล ใช่หรือไม่');
                    $('#myModal_confirm').modal('show');
                    $('#confirm').click(function(){
                        $("#checkcar_add").submit();
                    });
                }
            });

        });
  </script>
