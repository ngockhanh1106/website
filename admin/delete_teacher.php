<?php
    require('config/constants.php')
?>

<?php

    $id_user = $_GET['id_user'];

    $sql = "DELETE FROM users WHERE id_user=$id_user";

    //echo $sql;

    $res = mysqli_query($conn,$sql);
    if($res == TRUE)
    {
        $_SESSION['noti'] = "Xóa thành công";
        header("location:".$SITEURL.'manage_teacher.php');
    }
    else{
        $_SESSION['noti'] = "Lỗi khi xóa";
        header("location:".$SITEURL.'manage_teacher.php');

    }

?>