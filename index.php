<?php
session_start();
//if (!isset($_SESSION['login_check'])) {
// header("location:login.php");
//}
?>
<?php
include('./bridge/menu.php')
?>
<div class="row" style="
        margin-right: -15px;
        margin-left: -15px;">
    <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
        <div class="dash-let">
            <a href="studentmarks.php">
                <i class="fa fa-university"></i>
                <span>Kết quả đăng kí học </span>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
        <div class="dash-let">
            <a href="accounts.php">
                <i class="fa fa-university"></i>
                <span>Quản lí tài khoản</span>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
        <div class="dash-let">
            <a href="#">
                <i class="fa fa-university"></i>
                <span>Thông tin học sinh</span>
            </a>
        </div>
    </div>
    <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
        <div class="dash-let">
            <a href="contact.php">
                <i class="fa fa-university"></i>
                <span>Liên hệ</span>
            </a>
        </div>
    </div>
</div>
</div>
<?php
include('./bridge/footer.php')
?>