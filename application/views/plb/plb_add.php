<div class="col-md-12">
    <div class="row">
        <div class="col-sm-12">
             <center><h4><b>เพิ่มข้อมูล พ.ร.บ</b></h4></center>
             <a class="btn btn-success " href="<?php echo base_url(); ?>index.php/PlbController/plb_detail"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true">&nbsp;ย้อนกลับ</span></a>
             <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <form id="plb_add" method="post" action="<?php echo base_url(); ?>index.php/PlbController/save_plb">
                    <fieldset>  
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ทะเบียนรถ :</label>
                            <div class="col-sm-10">
                                <input class="form-control " maxlength="20" type="text" id="car_licenseplate" name="car_licenseplate" placeholder="ทะเบียนรถ" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">จังหวัด :</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="car_province" name="car_province" required>
                                    <option value="">----เลือกจังหวัด----</option>
                                    <?php foreach ($province as $row ) {?>
                                       <option value="<?php echo $row['pro_name'];?>"><?php echo $row['pro_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">บริษัท :</label>
                            <div class="col-sm-10">
                                <input class="form-control" maxlength="50" type="text" id="plb_company" name="plb_company"    placeholder="บริษัท" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">วันที่คุ้มครองเริ่มต้น :</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="plb_protection_start" name="plb_protection_start"  value=""  placeholder="วันที่คุ้มครองเริ่มต้น" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">วันที่คุ้มครองสิ้นสุด :</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" id="plb_protection_end" name="plb_protection_end"    placeholder="วันที่คุ้มครองสิ้นสุด" required>
                            </div>
                        </div>
                        
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                <a  id="save" class="btn btn-info btn-lg">บันทึกข้อมูล</a>
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
           //var d = new Date(),
           //var date = ((d.getUTCDate()+'/'+(d.getUTCMonth()+1)+'/'+d.getUTCFullYear()));
           //$(".plb_protection_start").html(date);
          $("#save").click(function() {
             //$(this).attr("plb_protection_start").value();
             var plb_protection_start = $('#plb_protection_start').val();
             var fromArr = plb_protection_start.split('-');
             var StartDateF = new Date(fromArr[0],fromArr[1]-1,fromArr[2]);
             var plb_protection_end = $('#plb_protection_end').val()
             var toArr  =  plb_protection_end.split("-");
             var StopDateF = new Date(toArr[0],toArr[1]-1,toArr[2]);
             
             var car_licenseplate = $('#car_licenseplate').val();
             var plb_company = $('#plb_company').val();
             var car_province = $('#car_province').val();

             if(car_licenseplate == ""){
                $('#value_message').html('กรุณาระบุ ทะเบียนรถ');
                $('#myModal').modal('show');
             }else if (car_province == "") {
                $('#value_message').html('กรุณาระบุ จังหวัด');
                $('#myModal').modal('show');
             }else if (plb_company == "") {
                $('#value_message').html('กรุณาระบุ บริษัท');
                $('#myModal').modal('show');
             }else if (plb_protection_start == "") {
                $('#value_message').html('กรุณาระบุ วันที่คุ้มครองเริ่มต้น');
                $('#myModal').modal('show');
             }else if (plb_protection_end == "") {
                $('#value_message').html('กรุณาระบุ วันที่คุ้มครองสิ้นสุด');
                $('#myModal').modal('show');
             }else if (StopDateF < StartDateF){
                $('#value_message').html('กรุณาระบุวันที่คุ้มครองเริ่มต้น  มากกว่า วันที่คุ้มครองสิ้นสุด');
                 $('#myModal').modal('show');
              }else{
                $('#message_confirm').html('ท่านต้องการบันทึกข้อมูล ใช่หรือไม่');
                $('#myModal_confirm').modal('show');
                    $('#confirm').click(function(){
                        $("#plb_add").submit();
                 });
                    
              }       

          });
        
        $('#car_licenseplate').keyup(function(){ 
            var limit = parseInt($(this).attr('maxlength'));  
            var text = $(this).val();  
            var chars = text.length;  
            if(chars > limit){  
                var new_text = text.substr(0, limit);  
                $(this).val(new_text);  
            } 
        });
        $('#car_province').keyup(function(){ 
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
