<div class="col-md-12 " id="loading">
    <div class="row">
        <div class="col-sm-12">
             <center><h4><b>ข้อมูล พ.ร.บ</b>
             </h4></center><a class="btn btn-primary " href="<?php echo base_url(); ?>index.php/PlbController/plb_add"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;เพิ่มข้อมูล พ.ร.บ</span></a>
             <hr width="100%">
            <br><br>
            <?php if($this->session->userdata('insert_employee') == 'C' ){?>
                <div id="alert-message" class="alert alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> บันทึกข้อมูลเรียบร้อย
                </div>
            <?php }else if($this->session->userdata('insert_employee') == 'N' ){?>
                <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> ไม่สามารถบันทึกข้อมูลได้
                </div>
            <?php }?>
            <div class="panel-body form-horizontal payment-form">
                <table class="table table-hover" >
                    <thead>
                      <tr id="header_table">
                        <th class="text-center">ลำดับ</th>
                        <th>ทะเบียนรถ</th>
                        <th>จังหวัด</th>
                        <th>บริษัท</th>
                        <th>วันที่คุ้มครองเริ่มต้น</th>
                        <th>วันที่คุ้มครองสิ้นสุด</th>
                        <th class="text-center">ปรับปรุง</th>

                      </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php 
                        $count = 0;
                        foreach ($plb as $row ){
                            $count++;
                        ?>
                      <tr>
                        <td class="text-center"><?php echo $count;?></td>
                        <td><?php echo $row['car_licenseplate'];?></td>
                        <td><?php echo $row['car_province']; ?></td>
                        <td><?php echo $row['plb_company']; ?></td>
                        <td><?php echo $row['plb_protection_start']; ?></td>
                        <td><?php echo $row['plb_protection_end']; ?></td>
                        <td class="text-center"><a class=" btn btn-danger confirm_delete" id="<?php echo $row['plb_id'];?>" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;<a class="btn btn-info "><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                    <?php }?>
                      </tr>
                      
                    </tbody>
                  </table>

            </div>
            <div class="col-md-12 text-center">
              <ul class="pagination pagination-lg pager" id="myPager"></ul>
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
                <button type="button" id="confirm" data-dismiss="modal" class="btn btn-primary" >ตกลง</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            </div>
          </div>
    </div>
  </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.confirm_delete').click(function(){
            var id = $(this).attr('id');
            $('#message_confirm').html('ท่านต้องการลบข้อมูล ใช่หรือไม่');
            $('#myModal_confirm').modal('show');
            $('#confirm').click(function(){
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/PlbController/delete_plb/"+id,
                    dataType: "html",
                    success:function(data){
                        var site_url = "<?php echo base_url(); ?>index.php/PlbController/plb_detail"; //append id at end
                        $("#loading").load(site_url);
                        
                    },

                });
            });
        });
        $("#alert-message").alert();
                window.setTimeout(function() { $("#alert-message").alert('close'); }, 2000);
    });
       
  

   
</script>