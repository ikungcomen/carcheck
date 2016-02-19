<div class="col-md-12">
    <div class="row">
        <div class="col-sm-12">
             <center><h4><b>เพิ่มข้อมูลประกันภัย</b></h4></center>
             <a class="btn btn-success " href="<?php echo base_url(); ?>index.php/InsuranceController/insurance_detail"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
             <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <form id="insurance_add" method="post" action="<?php echo base_url(); ?>index.php/InsuranceController/save_insurance">
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
                                <select class="form-control" id="car_province"  name="car_province" required>
                                    <option value="">----เลือกจังหวัด----</option>
                                    <?php foreach ($province as $row) {?>
                                    <option value="<?php echo $row['pro_name'];?>"><?php echo $row['pro_name'];?></option>
                                    <?php }?>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">บริษัท :</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" maxlength="50" id="in_company" name="in_company"    placeholder="บริษัท" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ประเถทประกัน :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="in_type" name="in_type" required>
                                <option value="">----เลือกประเถทประกัน----</option>
                                <option value="1">ประกันชั้น 1</option>
                                <option value="2">ประกันชั้น 2</option>
                                <option value="3">ประกันชั้น 3</option>
                                <option value="4">ประกันชั้น 4</option>
                                
                                    
                                    
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">วันที่คุ้มครองเริ่มต้น :</label>
                            <div class="col-sm-10">
                                <input class="form-control " type="date"  id="in_protection_start" name="in_protection_start" placeholder="วันที่คุ้มครองเริ่มต้น" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">วันที่คุ้มครองสิ้นสุด :</label>
                            <div class="col-sm-10">
                                <input class="form-control " type="date"  id="in_protection_end" name="in_protection_end" placeholder="วันที่คุ้มครองสิ้นสุด" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">เบี้ยประกัน :</label>
                            <div class="col-sm-10">
                                <input class="form-control " type="number" maxlength="11"  id="in_money" name="in_money" placeholder="เบี้ยประกัน" required>
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
            var in_company = $('#in_company').val();
            var in_type = $('#in_type').val();
            var in_protection_start = $('#in_protection_start').val();
            var fromArr = in_protection_start.split('-');
            var StartDateF = new Date(fromArr[0],fromArr[1]-1,fromArr[2]);
            var in_protection_end = $('#in_protection_end').val()
            var toArr  =  in_protection_end.split("-");
            var StopDateF = new Date(toArr[0],toArr[1]-1,toArr[2]);
            var in_money = $('#in_money').val();
            if( car_licenseplate == ""){
                $('#value_message').html('กรุณาระบุ ทะเบียนรถ');
                $('#myModal').modal('show');
            }else if ( car_province == "") {
                $('#value_message').html('กรุณาระบุ จังหวัด');
                $('#myModal').modal('show');
            }else if (in_company == "") {
                $('#value_message').html('กรุณาระบุ บริษัท');
                $('#myModal').modal('show');
            }else if ( in_type == "") {
                $('#value_message').html('กรุณาระบุ ประเถทประกัน');
                $('#myModal').modal('show');
            }else if (in_protection_start == "") {
                $('#value_message').html('กรุณาระบุ วันที่คุ้มครองเริ่มต้น');
                $('#myModal').modal('show');
             }else if (in_protection_end == "") {
                $('#value_message').html('กรุณาระบุ วันที่คุ้มครองสิ้นสุด');
                $('#myModal').modal('show');
             }else if (StopDateF < StartDateF) {
                $('#value_message').html('กรุณาระบุ วันที่คุ้มครองเริ่มต้น มากกว่า วันที่คุ้มครองสิ้นสุด');
                $('#myModal').modal('show');
            }else if ( in_money == "") {
                $('#value_message').html('กรุณาระบุ เบี้ยประกัน');
                $('#myModal').modal('show');
            }else{
                $('#message_confirm').html('ท่านต้องการบันทึกข้อมูล ใช่หรือไม่');
                $('#myModal_confirm').modal('show');
                $('#confirm').click(function(){
                    $("#insurance_add").submit();
                });
            }
        });
        $('#in_money').keyup(function(){ 
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
