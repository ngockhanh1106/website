<?php
require ('./config/constants.php');
    $id_course = $_GET['id_course'];

    $sql = "DELETE from tbl_register where id_course='$id_course' ";
    echo $sql;
    if (mysqli_query($conn, $sql) == TRUE) {
        $_SESSION['noti'] = "Xóa thành công";
        header("location:list_course.php");
    } else {
        $_SESSION['noti'] = "Lỗi khi xóa";
        header("location:list_course.php");
    }

?>