<?php
include('./bridge-admin/menu.php')
?>

<div class="container">
    <div class="wrapper">
        <h1>Thêm Sinh viên</h1>
        <br /><br />
    </div>
    <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Mã sinh viên</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="code_user" name="code_user">
            </div>
        </div>

        <div class="row mb-3">
            <label for="name_user" class="col-sm-2 col-form-label">Họ và Tên</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email">
            </div>
        </div>

        <div class="row mb-3">
            <label for="sex" class="col-sm-2 col-form-label">Giới Tính</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="sex" name="sex">
            </div>
        </div>

        <div class="row mb-3">
            <label for="birthdate" class="col-sm-2 col-form-label">Ngày sinh</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="birthdate" name="birthdate">
            </div>
        </div>

        <div class="row mb-3">
            <label for="sodidong" class="col-sm-2 col-form-label">So di dong</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control" id="phone" name="phone">
            </div>
        </div>

        <div class="row mb-3">
            <label for="pass" class="col-sm-2 col-form-label">Mật khẩu</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pass" name="pass">
            </div>
        </div>

        <button type="submit" class="btn btn-primary" name="btnAdd">Them</button>
    </form>

    <?php


    //kiểm tra xem đã ấn vào nút thêm chưa
    if (isset($_POST['btnAdd'])) {

        $code_user = $_POST['code_user'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $sex = $_POST['sex'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['phone'];
        $pass = $_POST['pass'];
        $role = 3;
        $pass_hash = password_hash($pass, PASSWORD_DEFAULT);




        $sql = "INSERT INTO tb_users(code_user,fullname,email,sex,birthdate,phone,pass,role)
         VALUES( '$code_user','$fullname','$email','$sex','$birthdate','$phone','$pass_hash','$role')";
        //echo $sql;

        if (mysqli_query($conn, $sql) == TRUE) {
            $_SESSION['noti'] = "thêm thành công";
            header("location:" . SITEURL . 'users.php');
            // echo ' ok';
        } else {
            $_SESSION['noti'] = "Lỗi không thành công, mã người dùng đã tồn tại";
            header("location:" . SITEURL . 'users.php');
        }
        mysqli_close($conn);
    }
    ?>

</div>
<?php
include('./bridge-admin/footer.php')
?>