<?php
include('./bridge-admin/menu.php')
?>

<div class="main">
    <div class="container">
        <div class="mt-4 p-4 bg-white rounded shadow-sm">
            <div class="">
                <h3>Sửa thông tin</h3>
                <br /><br />
            </div>
            <?php
            //1. Get the ID of Selected Admin

            $id_course = $_GET['id_course'];

            //2. Create SQL Query to Get the Details
            $sql = "SELECT*FROM tb_course where id_course= $id_course";
            //echo $sql;

            //Execute the Query
            $res = mysqli_query($conn, $sql);


            //Check whether the query is executed or not
            if ($res == true) {
                // Check whether the data is available or not
                $count = mysqli_num_rows($res);
                //Check whether we have admin data or not
                if ($count == 1) {
                    // Get the Details
                    //echo "Admin Available";
                    $row = mysqli_fetch_assoc($res); //
                    $code_course = $row['code_course'];
                    $name_course = $row['name_course'];
                    $lesson = $row['lesson'];
                    $id_room = $row['id_room'];
                    $id_semester = $row['id_semester'];
                    $startdate = $row['startdate'];
                    $enddate = $row['enddate'];
                    $credit = $row['credit'];
                    $status = $row['status'];
                    $old_room = $id_room;
                    $old_semester = $id_semester;

                } else {
                    //Redirect to Manage Admin PAge
                    header('location:' . SITEURL . 'index.php');
                }
            }
            ?>
            <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="code_course" class="col-sm-2 col-form-label">Mã khoá học</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="code_course" name="code_course" value="<?php echo $code_course; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Tên khóa học</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_course" name="name_course" value="<?php echo $name_course; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Tiết học</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="lesson" name="lesson" value="<?php echo $lesson; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Phòng học</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="room">
                        <?php
                        $sql = "SELECT * FROM tbl_room";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id_room = $row['id_room'];
                                $name_room = $row['name_room'];
                        ?>
                                <option class="form-control" value="<?= $id_room; ?>" <?php if ($id_room == $old_room) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                    <?= $name_room ?></option>
                            <?php
                            }
                        } else {
                            ?>
                            <option value="0">No Found</option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Kỳ học</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="semester">
                        <?php
                        $sql = "SELECT * FROM tbl_semester";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id_semester = $row['id_semester'];
                                $name_semester = $row['name_semester'];
                        ?>
                                <option class="form-control" value="<?= $id_semester; ?>" 
                                <?php if ($id_semester == $old_semester) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                    <?= $name_semester ?></option>
                            <?php
                            }
                        } else {
                            ?>
                            <option value="0">No Found</option>
                        <?php
                        }
                        ?>
                    </select>                    </div>
                </div>

                <div class="row mb-3">
                    <label for="startdate" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="startdate" name="startdate" value="<?php echo $startdate; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="enddate" name="enddate" value="<?php echo $enddate; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="credit" class="col-sm-2 col-form-label">Tín chỉ</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="credit" name="credit" value="<?php echo $credit; ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="status" class="col-sm-2 col-form-label">Trạng thái</label>
                    <div class="col-sm-10">
                        <div class="form-group mt-2" style="font-size: larger;">
                            <select name="status" id="status" class="custom-select">
                                <option value="0" <?php echo $status == 0 ? 'selected' : '' ?>>Đóng</option>
                                <option value="1" <?php echo $status == 1 ? 'selected' : '' ?>>Mở</option>
                            </select>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id_course" value="<?php echo $id_course; ?>">
                <input type="submit" class="btn btn-primary" name="btnUpdate" value="Sửa">
            </form>
        </div>

    </div>
</div>


<?php
//Check whether the Submit Button is Clicked or not
if (isset($_POST['btnUpdate'])) {
    //echo "Button CLicked";
    //Get all the values from form to update
    $code_course = $_POST['code_course'];
    $name_course = $_POST['name_course'];
    $lesson = $_POST['lesson'];
    $id_room = $_POST['room'];
    $id_semester = $_POST['semester'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $credit = $_POST['credit'];
    $status = $_POST['status'];

 
   $sql = "UPDATE `tb_course` SET `code_course` = '$code_course', `name_course` ='$name_course', `id_room` = '$id_room' ,`id_semester` = '$id_semester', `startdate` = '$startdate', `enddate` = '$enddate', `lesson` = '$lesson', `status` = '$status' WHERE `id_course` = '$id_course'";
   echo $sql;

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($res == true) {
        //Query Executed and Admin Updated
        $_SESSION['noti'] = "sửa thành công";
        header("location:" . SITEURL . 'manage_course.php');
    } else {
        //Failed to Update Admin
        // $_SESSION['noti'] = "lỗi khi sửa";
        // header("location:" . SITEURL . 'manage_course.php');
        echo "loi";
    }
    mysqli_close($conn);

}

?>

<?php
include('./bridge-admin/footer.php')
?>