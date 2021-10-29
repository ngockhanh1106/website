<?php
include('./bridge-admin/menu.php')
?>

<div class="container">
    <div class="wrapper">
        <h1>Thêm danh bạ</h1>
        <br /><br />
    </div>
    <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="id_user" class="col-sm-2 col-form-label">id</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="id_user" name="id_user">
            </div>
        </div>

        <div class="row mb-3">
            <label for="name_user" class="col-sm-2 col-form-label">Họ Tên</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_user" name="name_user">
            </div>
        </div>

        <div class="row mb-3">
            <label for="username" class="col-sm-2 col-form-label">Tên đăng nhập</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username">
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
                <input type="tel" class="form-control" id="sodidong" name="sodidong">
            </div>
        </div>

        <div class="row mb-3">
            <label for="pass" class="col-sm-2 col-form-label">Mật khẩu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pass" name="pass">
            </div>
        </div>
        
        <div class="row mb-3">
            <label for="level" class="col-sm-2 col-form-label">cấp độ</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="level" name="level">
            </div>
        </div>

       

        <button type="submit" class="btn btn-primary" name="btnAdd">Them</button>
    </form>

    <?php


    //kiểm tra xem đã ấn vào nút thêm chưa
    if (isset($_POST['btnAdd'])) {

        $id_user = $_POST['id_user'];
        $name = $_POST['name_user'];
        $username = $_POST['username'];
        $sex = $_POST['sex'];
        $birthdate = $_POST['birthdate'];
        $phone = $_POST['sodidong'];
        $pass = $_POST['pass'];
        $level = $_POST['level'];
        



        $sql = "INSERT INTO users(id_user,name,username,sex,birthdate,phone,pass,level)
         VALUES( '$id_user','$name','$username','$sex','$birthdate','$phone','$pass','$level')";
         echo $sql;

        if (mysqli_query($conn, $sql) == TRUE) {
            $_SESSION['noti'] = "thêm thành công";
            header("location:" . SITEURL . 'manage_teacher.php');
            // echo ' ok';
        } else {
            // $_SESSION['noti'] = "Lỗi không thành công";
            // header("location:" . SITEURL . 'manage_teacher.php');
            echo 'false';
        }
        mysqli_close($conn);
    }
    ?>

</div>
<?php 
include('./bridge-admin/footer.php')
?>