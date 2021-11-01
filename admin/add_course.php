<?php
include('./bridge-admin/menu.php')
?>

<div class="container">
    <div class="wrapper">
        <h1>Thêm Khoá học</h1>
        <br /><br />
    </div>
    <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="code_course" class="col-sm-2 col-form-label">Mã khoá học</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="code_course" name="code_course">
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Tên khóa học</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name_course" name="name_course">
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Tiết học</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="lesson" name="lesson">
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Phòng học</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="room" name="room">
            </div>
        </div>
    

        <div class="row mb-3">
            <label for="semester" class="col-sm-2 col-form-label">Kỳ học</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="semester" name="semester">
            </div>
        </div>

        <div class="row mb-3">
            <label for="startdate" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="startdate" name="startdate">
            </div>
        </div>

        <div class="row mb-3">
            <label for="" class="col-sm-2 col-form-label">Ngày kết thúc</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" id="enddate" name="enddate">
            </div>
        </div>

        <div class="row mb-3">
            <label for="credit" class="col-sm-2 col-form-label">Tín chỉ</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="credit" name="credit">
            </div>
        </div>
        <div class="row mb-3">
            <label for="status" class="col-sm-2 col-form-label">Trạng thái</label>
            <div class="col-sm-10">
                <!-- <input type="text" class="form-control" id="role" name="role"> -->
                <div class="form-group mt-2" style="font-size: larger;">
                    <select name="status" id="status" class="custom-select">
                        <option value="0" <?php echo isset($meta['status']) && $meta['status'] == 0 ? 'selected' : '' ?>>Đóng</option>
                        <option value="1" <?php echo isset($meta['status']) && $meta['status'] == 1 ? 'selected' : '' ?>>Mở</option>
                    </select>
                </div>
            </div>
        </div>



        <button type="submit" class="btn btn-primary" name="btnAdd">Them</button>
    </form>

    <?php


    //kiểm tra xem đã ấn vào nút thêm chưa
    if (isset($_POST['btnAdd'])) {

        $code_course = $_POST['code_course'];
        $name_course = $_POST['name_course'];
        $lesson = $_POST['lesson'];
        $room = $_POST['room'];
        $semester = $_POST['semester'];
        $startdate = $_POST['startdate'];
        $enddate = $_POST['enddate'];
        $credit = $_POST['credit'];
        $status = $_POST['status'];

        $sql = "INSERT INTO tb_course(code_course,name_course,room,semester,startdate,enddate,credit,lesson,status)
         VALUES( '$code_course','$name_course','$room','$semester','$startdate','$enddate','$credit','$lesson','$status')";
        //echo $sql;

        if (mysqli_query($conn, $sql) == TRUE) {
            $_SESSION['noti'] = "thêm thành công";
            header("location:" . SITEURL . 'manage_course.php');
            // echo ' ok';
        } else {
            $_SESSION['noti'] = "Lỗi khi thêm";
            header("location:" . SITEURL . 'manage_course.php');
        }
        mysqli_close($conn);
    }
    ?>

</div>
<?php
include('./bridge-admin/footer.php')
?>