<?php
    if(!isset($_SESSION)){
        session_start();
    }

 //Create Constants to Store Non Repeating Values
 //tạo biến hằng số
    define('SITEURL', 'http://localhost/new%20folder/website/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'dhtl_db');

//kết nối với mysqll
$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD,DB_NAME);//$conn biến kết nối

// kiểm tra knoi đc chưa
if (!$conn) {
    die("Không thể kết nối,kiểm tra lại các tham số kết nối");
}

?>