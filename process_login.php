<?php
// if (isset($_POST['submit'])) {
//     $email = $_POST['email'];
//     $pass = $_POST['pass'];
//     require('config/constants.php');
//     $sql = "SELECT * FROM users WHERE email = '$email' and status = 1";
//     //echo $sql;
//     $result = mysqli_query($conn, $sql);
//     if ($result) {
//         $row = mysqli_fetch_assoc($result);
//         $pass_hash = $row['password'];
//         if (password_verify($pass, $pass_hash)) {
//             //biến quản lý làm việc
//             $_SESSION['login_check'] = $email;
//             $_SESSION['user']=$row["first_name"]. " " .$row["last_name"];

//             header("Location:index.php");
//             //echo "meejt moir";
//         } else {
//             echo "Xác nhận mật khẩu không đúng";
//         }
//     } else {
//         echo "Email không tồn tại";
//     }
// }
?>

<?php

if (isset($_POST['submit'])) {
    $code_user = $_POST['code_user'];
    $pass = $_POST['pass'];
     require('config/constants.php');
    $sql = "SELECT * FROM tb_users WHERE code_user = '$code_user' ";
    echo $sql;
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $pass_hash = $row['pass'];
        if (password_verify($pass, $pass_hash)) {
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
?>