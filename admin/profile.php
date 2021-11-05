<?php
include('./bridge-admin/menu.php');


$userid = $_SESSION['userid'];

$sql = "SELECT * FROM users WHERE userid = $userid";
$res = mysqli_query($conn, $sql);


if (mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    // $fullname = $row['fullname'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
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
                                <img class="img-fluid" max-height="160px" width="130" alt="" src="../image/kkkkk.jpg">
                            </div>
                            <div class="col-md-10">
                                <div class="row form-group">
                                    <div class="col-md-6 py-2">
                                        <label class="bold">Họ</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"  value="<?php echo $first_name ?>">
                                    </div>
                                    <div class="col-md-6 py-2">
                                        <label class="bold">Tên</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-touched ng-valid ng-not-empty"  value="<?php echo $last_name ?>">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6 py-2">
                                        <label class="bold">Email</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty"  value="<?php echo $email ?>">
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
include('./bridge-admin/footer.php')
?>