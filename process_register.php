<?php 
require ('./config/constants.php');


$id_course = $_GET['id_course'];
$id_user = $_SESSION['id_user'];
$sql = "INSERT INTO tbl_register(id_course,id_user,status) VALUES( '$id_course','$id_user',1) ";
if (mysqli_query($conn, $sql) == TRUE) {
    $_SESSION['noti'] = "Thêm thành công";
    header("location:list_course.php");
} else {
    $_SESSION['noti'] = "Lỗi khi thêm";
    header("location:list_course.php");
}

mysqli_close($conn);
?>