<?php
    require('config/constants.php')
?>

<?php

    $id = $_GET['id'];

    $sql = "DELETE FROM tb_users WHERE id=$id";

    //echo $sql;

    $res = mysqli_query($conn,$sql);
    if($res == TRUE)
    {
        $_SESSION['noti'] = "Xóa thành công";
        header("location:".$SITEURL.'manage_user.php');
    }
    else{
        $_SESSION['noti'] = "Lỗi khi xóa";
        header("location:".$SITEURL.'manage_user.php');

    }

?>