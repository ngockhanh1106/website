<?php
include_once "config/constants.php";

$email = $_GET['email'];
$code = $_GET['code'];

$sql = "SELECT * FROM users WHERE email = '$email' and code = '$code'";
$res1 = mysqli_query($conn, $sql);


if (mysqli_num_rows($res1)) {
    // thay doi status
    $sql = "UPDATE users SET status = 1 WHERE email = '$email' and code = '$code'";
   // echo $sql;
    $res = mysqli_query($conn, $sql);
    if ($res) {
        // đã kích hoạt
        $_SESSION['loginEmail'] = "<p class = 'text-success'>Tài khoản của bạn đã được kích hoạt.</p>";
        header("location:" . $siteurl . 'login.php');
    }
      else {
         $_SESSION['loginEmail'] = "<p class = 'text-danger'>Lỗi khi kích hoạt tài khoản. Hãy thử lại.</p>";
        header("location:" . $siteurl . 'register_account.php');
     }
} else {
    echo ' khong ton tai tai khoan';
    //$_SESSION['loginEmail'] = "<p class = 'text-danger'>Lỗi khi kích hoạt tài khoản. Hãy thử lại.</p>";
    //header("location:" . $siteurl . 'login.php');
}