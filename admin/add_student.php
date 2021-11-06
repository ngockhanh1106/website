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
        <div class="row mb-3">
                <label for="newimage" class="col-sm-2 col-form-label">Tải ảnh lên:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="image">
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
        $pass = md5($_POST['pass']);
        $role = 3;
        if (isset($_FILES['image']['name'])) {

            $image_name = $_FILES['image']['name'];

            if ($image_name != "") {
                $ext = end(explode('.', $image_name));

                //dat lai ten file
                $image_name = "Staff_list_" . rand(000, 999) . '.' . $ext; // e.g. Staff_list_116.jpg
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../image/staff/" . $image_name;

                $upload = move_uploaded_file($source_path, $destination_path);


                if ($upload == false) {
                    echo ' tai len ko thanh cong';
                    die();
                }
            }
        } else {
            $image_name = "";
        }


        $sql = "INSERT INTO tb_users(code_user,fullname,email,sex,birthdate,phone,pass,role,image_name)
         VALUES( '$code_user','$fullname','$email','$sex','$birthdate','$phone','$pass','$role','$image_name')";
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