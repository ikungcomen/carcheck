
<div class="col-md-12 ">
    <div class="row">
        <div class="col-sm-12">
             <h4><b>จัดการผู้ใช้</b>
             </h4><a class="btn btn-primary " href="<?php echo base_url(); ?>index.php/ManageUserController/load_add_user">เพิ่มผู้ใช้งาน</a>
             <hr width="100%">
            <br><br>
            <div class="panel-body form-horizontal payment-form">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ</th>
                        <th>นามสกุล</th>
                        <th>ชื่อผู้ใช้</th>
                        <th>รหัสผ่าน</th>
                        <th>สิทธิ์เข้าใช้งาน</th>
                        <th>สถานะ</th>
                        <th>ปรับปรุง</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                    <?php $count = 0;
                        foreach ($user as $row) {
                          $count++;
                        
                     ?>
                      <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $row['ad_name'];?></td>
                        <td><?php echo $row['ad_lastname'];?></td>
                        <td><?php echo $row['ad_username'];?></td>
                        <td><?php echo $row['ad_password'];?></td>
                        <td><?php echo $row['ad_role'];?></td>
                        <td><?php echo $row['ad_status'];?></td>
                        <td><a class=" btn btn-danger " id="" href="<?php echo base_url(); ?>index.php/ManageUserController/delete_user/<?php echo $row['ad_id'];?>" >ลบ</a>&nbsp;<a class="btn btn-info ">แก้ไข</a>&nbsp;
                        <?php if ($row['ad_status'] == 'NONAPPROVE' && $row['ad_role'] == 'user') {?>
                          <a class="btn btn-success" href="<?php echo base_url(); ?>index.php/ManageUserController/approve_user/<?php echo $row['ad_id'];?>">อนุมัติ</a>&nbsp;
                          <?php }else if ($row['ad_status'] == 'APPROVE' && $row['ad_role'] == 'user'){?>
                              <a class="btn btn-warning " href="<?php echo base_url(); ?>index.php/ManageUserController/unapprove_user/<?php echo $row['ad_id'];?>">ยกเลิก</a></td>
                          <?php }?>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">


   
</script>