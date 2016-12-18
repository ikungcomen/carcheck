<div class="col-md-12 ">
    <div class="row">
        <div class="col-sm-12">
            <center><h4><b>ข้อมูลบุคคล</b></h4></center>
            <a class="btn btn-primary " href="<?php echo base_url(); ?>index.php/EmployeeController/add_employee"><span class="glyphicon glyphicon-plus" aria-hidden="true">&nbsp;เพิ่มบุคคล</span></a>
            <hr width="100%">
            <?php if ($this->session->userdata('insert_employee') == 'C') { ?>
                <div id="alert-message" class="alert alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Success!</strong> บันทึกข้อมูลเรียบร้อย
                </div>
            <?php } else if ($this->session->userdata('insert_employee') == 'N') { ?>
                <div id="alert-message" class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Warning!</strong> ไม่สามารถบันทึกข้อมูลได้
                </div>
            <?php } ?>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr id="header_table">
                            <th class="text-center">ลำดับ</th>
                            <th class="text-center">ชื่อ-นามสกุล</th>
                            <th>เลขที่บัตรประชาชน</th>
                            <th>เบอร์โทรศัพท์</th>
                            <th>ที่อยู่</th>
                            <th>รหัสไปรษณีย์</th>
                            <th class="text-center">ปรับปรุง</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $count = 0;
                        foreach ($employee as $row) {
                            $count++;
                            ?>
                            <tr>
                                <td class="text-center"><?php echo $count; ?></td>
                                <td><?php echo $row['em_gen'] . " " . $row['em_name'] . " " . $row['em_lastname']; ?></td>
                                <td><?php echo $row['em_employeeid']; ?></td>
                                <td><?php echo "0" . $row['em_phonenumber']; ?></td>
                                <td><?php echo $row['em_address'] . " ต." . $row['em_subdistrict'] . " อ." . $row['em_district'] . "<br>จ." . $row['em_province']; ?></td>
                                <td><?php echo $row['em_postcode']; ?></td>
                                <td class="text-center"><a class=" btn btn-danger " id="<?php echo $row['em_id']; ?>" href="<?php echo base_url(); ?>index.php/EmployeeController/delete_employee/<?php echo $row['em_id']; ?>" ><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>&nbsp;<a   class="btn btn-info" href="<?php echo base_url(); ?>index.php/EmployeeController/employee_eidt/<?php echo $row['em_id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a></td>
                            <?php } ?>
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
    $(document).ready(function () {
        //$("").click(function() {
        // alert("Hello jQuery!");
        //});
        $("#alert-message").alert();
        window.setTimeout(function () {
            $("#alert-message").alert('close');
        }, 2000);
    });
</script>