<?php
    require('../config/constants.php')
?>

<?php

    $id_semester = $_GET['id_semester'];

    $sql = "DELETE FROM tbl_semester WHERE id_semester=$id_semester";

    //echo $sql;

    $res = mysqli_query($conn,$sql);
    if($res == TRUE)
    {
        $_SESSION['noti'] = "Xóa thành công";
        header("location:".$SITEURL.'manage_semester.php');
    }
    else{
        $_SESSION['noti'] = "Lỗi khi xóa";
        header("location:".$SITEURL.'manage_semester.php');

    }

?>