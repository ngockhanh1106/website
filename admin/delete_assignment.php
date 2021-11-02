<?php
    require('../config/constants.php')
?>

<?php

    $id_assign = $_GET['id_assign'];

    $sql = "DELETE FROM tbl_assign WHERE id_assign=$id_assign";

    //echo $sql;

    $res = mysqli_query($conn,$sql);
    if($res == TRUE)
    {
        $_SESSION['noti'] = "Xóa thành công";
        header("location:".$SITEURL.'manage_assignment.php');
    }
    else{
        $_SESSION['noti'] = "Lỗi khi xóa";
        header("location:".$SITEURL.'manage_assignment.php');

    }

?>