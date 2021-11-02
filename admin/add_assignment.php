<?php
include('./bridge-admin/menu.php')
?>

<div class="container">
    <div class="wrapper">
        <h1>Thêm phân công giảng dạy</h1>
        <br /><br />
    </div>
    <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
        
        <div class="row mb-3">
            <label for="course" class="col-sm-2 col-form-label">Tên khóa học</label>
            <div class="col-sm-10">
                <select class="form-select" name="course" id="course">
                    <?php
                    $sql1 = "SELECT*FROM tb_course";
                    $res1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($res1) > 0) {
                        while ($row = mysqli_fetch_assoc($res1)) {
                            echo '<option class="form-control" value ="' . $row['id_course'] . '">' . $row['name_course'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="startdate" class="col-sm-2 col-form-label">Tên giảng viên</label>
            <div class="col-sm-10">
            <select class="form-select" name="user" id="user">
                    <?php
                    $sql1 = "SELECT*FROM tb_users where role = 2";
                    $res1 = mysqli_query($conn, $sql1);
                    if (mysqli_num_rows($res1) > 0) {
                        while ($row = mysqli_fetch_assoc($res1)) {
                            echo '<option class="form-control" value ="' . $row['id_user'] . '">' . $row['fullname'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>
        </div>


        <button type="submit" class="btn btn-primary" name="btnAdd">Them</button>
    </form>

    <?php


    //kiểm tra xem đã ấn vào nút thêm chưa
    if (isset($_POST['btnAdd'])) {

    
        $id_course = $_POST['course'];
        $id_user = $_POST['user'];


        $sql = "INSERT INTO tbl_assign(id_course,id_user)
         VALUES( '$id_course','$id_user')";
        //echo $sql;

        if (mysqli_query($conn, $sql) == TRUE) {
            $_SESSION['noti'] = "thêm thành công";
            header("location:" . SITEURL . 'manage_assignment.php');
            // echo ' ok';
        } else {
            $_SESSION['noti'] = "Lỗi khi thêm";
            header("location:" . SITEURL . 'manage_assignment.php');
        }
        mysqli_close($conn);
    }
    ?>

</div>
<?php
include('./bridge-admin/footer.php')
?>