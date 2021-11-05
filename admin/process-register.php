<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Lấy giá trị từ FORM gửi sang và lưu vào BIẾN:
$first_name = $_POST['firstName'];
$last_name  = $_POST['lastName'];
$email      = $_POST['email'];
$pass1      = $_POST['pass1'];
$pass2      = $_POST['pass2'];

// QUY TRÌNH 4 bước:
// Bước 01:
include('config/constants.php');

// Bước 02: Xử lý truy vấn
$sql_1 = "SELECT * FROM users WHERE email='$email'";
$result_1 = mysqli_query($conn, $sql_1); //query chạy câu lệnh sql_1
if (mysqli_num_rows($result_1) > 0) // lấy ra dc số hàng của kết quả 
{
    $value = 'failed email';
    header("Location:register_account.php?reply=$value");
} elseif ($pass1 != $pass2) {
    $value = 'failed password';
    header("Location:register_account.php?reply=$value");
    //truyền qua URL thì dùng GET 


} else {
    // Bước 02.2 - Chèn dữ liệu đăng kí vào BẢNG
    // Mật khẩu phải được BĂM
    $pass = md5($pass1, PASSWORD_DEFAULT);
    $str = rand();
    $code = md5($str);

    $sql_2 = "INSERT INTO users(first_name, last_name, email, password,code)
     VALUES ('$first_name','$last_name','$email','$pass','$code')";
    $result_2 = mysqli_query($conn, $sql_2);  //Đối với lệnh INSERT, nếu CHÈN THÀNH CÔNG, nó trả về số NGUYÊN

    //$mail = new PHPMailer(true);
    if ($result_2 > 0) {
        require './PhpMail/Exception.php';
        require './PhpMail/PHPMailer.php';
        require './PhpMail/SMTP.php';

        $mail = new PHPMailer(true);
        try{
            $mail -> SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP(); // gửi mail SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'meoc419@gmail.com'; // SMTP username
            $mail->Password = 'bvypbcengnddnpqe'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port = 587; // TCP port to connect to
            $mail->CharSet = 'UTF-8';
            //Recipients
            $mail->setFrom('meoc419@gmail.com', 'Website Đại học Thủy Lợi');

            $mail->addReplyTo('meoc419@gmail.com', 'Đại học Thủy Lợi'); // nhận phải hồi từ người nhận
            //$email = 'viethung3052001@gmail.com';
            $mail->addAddress($email); // Add a recipient // dia chi ng nhan

            // Attachments
            // $mail->addAttachment('pdf/XTT/'.$data[11].'.pdf', $data[11].'_1.pdf'); // Add attachments
            //$mail->addAttachment('pdf/Giay_bao_mat_sau.pdf'); // Optional name

            // Content
            $mail->isHTML(true);   // Set email format to HTML
            $tieude = 'Kích hoạt quản trị viên Đại học Thủy Lợi';
            $mail->Subject = $tieude;

            $link = "http://localhost/website/admin/activation.php?email=" .$email ."&code=" .$code;
            $bodyContent = '<p>Chao ban!</p>';
            $bodyContent .= '<p>Bạn vui lòng nhấp vào đường linh dưới đây để kích hoạt tài khoản</p>';
            $bodyContent .= '<a href=' . $link . '>Kích hoạt</a>';
            $mail -> Body = $bodyContent;
            
            if($mail -> send()){
                $_SESSION['loginEmail'] = 'Đăng kí thành công. Kiểm tra Email để kích hoạt tài khoản';
                header("location:" .$siteurl ."login.php");
            }
            else{
                $_SESSION['loginEmail']='Lỗi khi kích hoạt tài khoản! Vui lòng thử lại ';
                header("location:" .$siteurl ."login.php");
            }
        }
        catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }
}

?>