<?php
include('./bridge-admin/menu.php')
?>

<div class="main">
    <div class="container">
    <div class="mt-4 p-4 bg-white rounded shadow-sm">
        <div class="">
            <h3>Sửa thông tin</h3>
            <br /><br />
        </div>
        <?php
            // include("config/constants.php");


        //1. Get the ID of Selected Admin
        if (isset($_GET['id_user'])) {
            $id_user = $_GET['id_user'];
        }
        //2. Create SQL Query to Get the Details
        $sql = "SELECT * FROM users where id_user= $id_user";
        //echo $sql;

        //Execute the Query
        $res = mysqli_query($conn, $sql);


        //Check whether the query is executed or not
        if ($res == true) {
            // Check whether the data is available or not
            $count = mysqli_num_rows($res);
            //Check whether we have admin data or not
            if ($count == 1) {
                // Get the Details
                //echo "Admin Available";
                $row = mysqli_fetch_assoc($res); //

                $id_user = $row['id_user'];
                $name = $row['name'];
                $username = $row['username'];
                $sex = $row['sex'];
                $birthdate = $row['birthdate'];
                $phone = $row['phone'];
                $pass = $row['pass'];
                $level = $row['level'];
            } else {
                //Redirect to Manage Admin PAge
                header('location:' . SITEURL . 'index.php');
            }
        }
        ?>
        <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="id_user" class="col-sm-2 col-form-label">id</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="id_user" name="id_user" value="<?php echo $id_user; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="name_user" class="col-sm-2 col-form-label">Họ Tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name_user" name="name" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Tên đăng nhập</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="sex" class="col-sm-2 col-form-label">Giới Tính</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $sex; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="birthdate" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="sodidong" class="col-sm-2 col-form-label">So di dong</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="sodidong" name="sodidong" value="<?php echo $phone; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pass" class="col-sm-2 col-form-label">Mật khẩu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pass" name="pass" value="<?php echo $pass; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="level" class="col-sm-2 col-form-label">cấp độ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="level" name="level" value="<?php echo $level; ?>">
                </div>
            </div>

            <input type="submit" class="btn btn-primary" name="btnUpdate" value="Sửa">
        </form>
    </div>

    </div>
</div>


<?php
//Check whether the Submit Button is Clicked or not
if (isset($_POST['btnUpdate'])) {
    //echo "Button CLicked";
    //Get all the values from form to update
    // $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $sex = $_POST['sex'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['sodidong'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    $sql ="UPDATE `users` SET `id_user` = '$id_user', `name` ='$name', `username` = '$username' , `birthdate` = '$birthdate', `phone` = '$phone', `pass` = '$pass', `level` = '$level' WHERE `users`.`id_user` = '$id_user'";


    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($res == true) {
        //Query Executed and Admin Updated
        $_SESSION['noti'] = "sửa thành công";
        header("location:" . SITEURL . 'manage_teacher.php');
       
    } else {
        //Failed to Update Admin
        $_SESSION['noti'] = "lỗi khi sửa";
        header("location:" . SITEURL . 'manage_teacher.php');
   
    }
}

?>

<?php 
include('./bridge-admin/footer.php')
?>