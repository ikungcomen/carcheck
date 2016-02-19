<div class="col-md-12 ">
    <div class="row">
        <div class="col-sm-12">
             <center><h4><b>ข้อมูลรถ</b>
             </h4></center><a class="btn btn-primary " href="<?php echo base_url(); ?>index.php/CarController/car_add"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;เพิ่มข้อมูลรถ</span></a>
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
                <table class="table table-hover">
                    <thead>
                      <tr id="header_table">
                        <th class="text-center">ลำดับ</th>
                        <th>เลขประชาชน</th>
                        <th>วันที่จดทะเบียน</th>
                        <th>วันที่เสียภาษีประจำปี</th>
                        <th>ประเภทรถ</th>
                        <th>ยี่ห้อรถ</th>
                        <th>หมายเลขตัวถังรถ</th>
                        <th>ทะเบียนรถ</th>
                        <th>จังหวัด</th>
                        <th>สีรถ</th>
                        <th class="text-center">ปรับปรุง</th>

                      </tr>
                    </thead>
                    <tbody id="myTable">
                    <?php 
                        $count = 0;
                        foreach ($car as $row ){
                            $count++;
                        ?>
                      <tr>
                        <td class="text-center"><?php echo $count;?></td>
                        <td><?php echo $row['em_employeeid'];?></td>
                        <td><?php echo $row['car_registerdate']; ?></td>
                        <td><?php echo $row['car_taxdate']; ?></td>
                        <td><?php echo $row['car_type']; ?></td>
                        <td><?php echo $row['car_brand']; ?></td>
                        <td><?php echo $row['car_number']; ?></td>
                        <td><?php echo $row['car_licenseplate']; ?></td>
                        <td><?php echo $row['car_province']; ?></td>
                        <td><?php echo $row['car_color']; ?></td>
                        <td class="text-center"><a class=" btn btn-danger " id="<?php echo $row['car_id']; ?>" href="<?php echo base_url(); ?>index.php/CarController/delete_car/<?php echo $row['car_id']; ?>" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;<a class="btn btn-info "><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
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

<script type="text/javascript">
$(document).ready(function() {
          //$("").click(function() {
           // alert("Hello jQuery!");
          //});
      $("#alert-message").alert();
                window.setTimeout(function() { $("#alert-message").alert('close'); }, 2000);
    });

   
</script>