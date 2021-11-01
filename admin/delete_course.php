<?php
    require('../config/constants.php')
?>

<?php

    $id_course = $_GET['id_course'];

    $sql = "DELETE FROM tb_course WHERE id_course=$id_course";

    //echo $sql;

    $res = mysqli_query($conn,$sql);
    if($res == TRUE)
    {
        $_SESSION['noti'] = "Xóa thành công";
        header("location:".$SITEURL.'manage_course.php');
    }
    else{
        $_SESSION['noti'] = "Lỗi khi xóa";
        header("location:".$SITEURL.'manage_course.php');

    }

?>