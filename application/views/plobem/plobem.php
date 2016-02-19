<div class="col-md-12 ">
    <div class="row">
        <div class="col-sm-12">
            <h4><b>แจ้งปัญหาที่เกี่ยวข้องกับระบบ</b></h4>
            
            <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <form id="plobem_add" method="post" action="<?php echo base_url(); ?>index.php/ManageUserController/save_plobem">
                    <fieldset> 
                        <?php if($this->session->userdata('insert') == 'C' ){?>
                            <div id="alert-message" class="alert alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Success!</strong> บันทึกข้อมูลเรียบร้อย
                            </div>
                        <?php }else if($this->session->userdata('insert') == 'N' ){?>
                            <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Warning!</strong> ไม่สามารถบันทึกข้อมูลได้
                            </div>
                        <?php }?>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">ปัญหา :</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="plobem" name="plobem"></textarea>
                            </div>
                        </div>
                        <div class="form-group text-right">
                            <div class="col-sm-12">
                                
                                <a id="save" class="btn btn-info btn-lg">แจ้งปัญหา</a>
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
                var plobem = $('#plobem').val();
                if( plobem == ""){
                    $('#value_message').html('กรุณาระบุ ปัญหา');
                    $('#myModal').modal('show');
                }else{
                    $('#message_confirm').html('ท่านต้องการบันทึกข้อมูล ใช่หรือไม่');
                    $('#myModal_confirm').modal('show');
                    $('#confirm').click(function(){
                        $("#plobem_add").submit();
                    });
                }
            });
            $("#alert-message").alert();
                window.setTimeout(function() { $("#alert-message").alert('close'); }, 2000);
        });
  </script>
