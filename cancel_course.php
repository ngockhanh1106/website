<?php
require ('./config/constants.php');
    $id_course = $_GET['id_course'];
    $id_user = $_SESSION['id_user'];
    $sql = "DELETE from tbl_register where id_course='$id_course' and id_user='$id_user' ";
    echo $sql;
    if (mysqli_query($conn, $sql) == TRUE) {
        $_SESSION['noti'] = "Xóa thành công";
        header("location:list_course.php");
    } else {
        $_SESSION['noti'] = "Lỗi khi xóa";
        header("location:list_course.php");
    }

?>