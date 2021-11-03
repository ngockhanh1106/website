<?php
session_start();
include('./bridge/checklogin.php')
?>
<?php
include('./bridge/menu.php')
?>
<div class="row">

    <?php
    if ($_SESSION['role'] == 3) {
    ?>
        <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
            <div class="dash-let">
                <a href="course.php">
                    <i class="fa fa-university"></i>
                    <span>Thông tin khóa học</span>
                </a>
            </div>
        </div>
    
        <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
            <div class="dash-let">
                <a href="register_course.php">
                    <i class="fa fa-university"></i>
                    <span>Đăng ký học</span>
                </a>
            </div>
        </div>
    
        <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
            <div class="dash-let">
                <a href="list_course.php">
                    <i class="fa fa-university"></i>
                    <span>Kết quả đăng ký học</span>
                </a>
            </div>
        </div>
    
        <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
            <div class="dash-let">
                <a href="course.php">
                    <i class="fa fa-university"></i>
                    <span>Thông tin học sinh</span>
                </a>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="col-md-3 col-sm-4 col-xs-12 margin-top-10">
        <div class="dash-let">
            <a href="contact.php">
                <i class="fa fa-university"></i>
                <span>Liên hệ</span>
            </a>
        </div>
    </div>

</div>

<?php
include('./bridge/footer.php')
?>