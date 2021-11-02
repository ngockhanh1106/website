<?php
include_once "config/constants.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/Logo-be-Thuy_Loi.png" type="image/png">
    <title>Đăng nhập - Cổng sinh viên Đại học Thủy Lợi</title>
    <link rel="stylesheet" href="./fontawesome-free-5.15.4-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div class="main ">
        <div class="container">
            <div class="login-container">


                <div class="login-box">
                    <div class="login-img">
                        <img src="../image/60year.png" class="img-fluid" alt="">
                    </div>
                    <form action="" method="POST" class="login-form" >
                        <div class="user-box">
                            <input type="text" name="code_user" required="">
                            <!-- <input type="text" name="code_user"class="form-control" id="code_user" > -->
                            <label>Tên đăng nhập</label>
                        </div>
                        <div class="user-box">
                            <input type="password" name="pass" required="">
                            <!-- <input type="password" name="pass" class="form-control" id="pass" > -->
                            <label>Mật khẩu</label>
                        </div>
                        <button type="submit" name="submit">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Đăng nhập
                        </button>


                        <br></br>

                        <p class="note-login">(*) Đăng nhập bằng tài khoản/mật khẩu của <b>trang khai báo thông tin thí sinh.</b></p>
                        <p class="note-login">(*) Điện thoại + zalo hỗ trợ: </br><b>0367.282.676 - 0362.500.881 </b></p>

                    </form>
                </div>

            </div>

        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>


<?php

if (isset($_POST['submit'])) {
    $code_user = $_POST['code_user'];
    $pass = $_POST['pass'];
    // require('config/constants.php');
    $sql = "SELECT * FROM tb_users WHERE code_user = '$code_user' and role = 1";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (md5($pass) == $row['pass']) {
            //biến quản lý làm việc
            $_SESSION['login_check'] = $code_user;
            $_SESSION['user']=$row["fullname"];

            header("Location:index.php");
            //echo "meejt moir";
        } else {
            echo "Xác nhận mật khẩu không đúng";
        }
    } else {
        echo "tài khoản không tồn tại";
    }
}



