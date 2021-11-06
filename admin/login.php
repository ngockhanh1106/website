<?php
// include_once "config/constants.php";
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
<style>
    body{
        background: linear-gradient(#75859f, #2c5b8f);
    }
    .login-img{
        min-height: 400px;
    }
</style>

<body>
    <div class="main ">
        <div class="container">
            <div class="login-container">
                <div class="login-box">
                    <div class="login-img" >
                        <img src="../image/60year.png" class="img-fluid" alt="">
                    </div>
                    <form action="" method="POST" class="login-form">
                        <div class="user-box">
                            <input type="text" name="email" required="">
                            <label>Email</label>
                        </div>
                        <div class="user-box">
                            <input type="password" name="pass" required="">
                            <!-- <input type="password" name="pass" class="form-control" id="pass" > -->
                            <label>Mật khẩu</label>
                        </div>
                        <div class="mb-3">
                            <input type="checkbox" value="remember-me">
                            <label class="form-check-label text-light" for="remember">Lưu mật khẩu</label>
                            <a href="#" class="float-end text-danger">Quên mật khẩu</a>
                        </div>
                        <button type="submit" name="submit">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                            Đăng nhập
                        </button>

                        <p class="text-center my-4 text-light">Bạn chưa có tài khoản? <a href="./register_account.php">Đăng ký tại đây</a></p>

                </div>

                </form>
            </div>

        </div>

    </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

</html>


<?php
include_once "config/constants.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    // require('config/constants.php');
    $sql = "SELECT * FROM users WHERE email = '$email' and status = 1";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if (md5($pass) == $row['password']) {
            //biến quản lý làm việc
            $_SESSION['login-check'] = $email;
            $_SESSION['users']=$row["first_name"]. " " .$row["last_name"];
            $_SESSION['userid']=$row['userid'];
            $_SESSION['welcome']= "<script> alert('Chào mừng bạn đến với trang quản trị viên')</script>";
            header("Location:index.php");
        } else {
            echo "<script> alert('Xác nhận mật khẩu không đúng')</script>";
        }
    } else {
        echo "<script> alert('Tài khoản không đúng')</script>";
    }
}
