<?php
include('./bridge/menu.php');
$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM tb_users WHERE id_user = $id_user";
$res = mysqli_query($conn, $sql);


if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $code_user = $row['code_user'];
    $fullname = $row['fullname'];
    $email = $row['email'];
    $sex = $row['sex'];
    $birthdate = $row['birthdate'];
    $phone = $row['phone'];
    $pass = $row['pass'];
    $role = $row['role'];
}


?>
<div class="col-md-12 " style="width:100%;">
        <div class="tab-content py-2">
            <div class="tab-pane active portlet" >
                <div class="panel panel-default" style="border: solid 1px #cddbd1;">
                    <div class="panel-heading text-center">Thông tin cá nhân</div>
                    <div class="panel-body">
                        <div class="row form-group p-3">
                            
                            <div class="col-xs-6 col-md-2">
                                <img class="" height="160px" width="130" alt="" src="">
                            </div>
                            <div class="col-md-10">
                                <div class="row form-group">
                                    <div class="col-md-6 py-2">
                                        <label class="bold">Họ và tên</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"  value="<?php echo $fullname ?>">
                                    </div>
                                    <div class="col-md-6 py-2">
                                        <label class="bold">Ngày sinh</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-touched ng-valid ng-not-empty"  value="<?php echo $birthdate ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6 py-2">
                                        <label class="bold">Email</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"  value="<?php echo $email ?>">
                                    </div>
                                    <div class="col-md-6 py-2">
                                        <label class="bold">Số điện thoại</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-touched ng-valid ng-not-empty"  value="<?php echo $phone ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('./bridge/footer.php')
?>