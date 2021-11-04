<?php
include('./bridge/menu.php')
?>

<div class="row">
    <div class="col-12">
        
       

        <h3>Quản Lý Khóa Học</h3>
        
        <span style="font-size: 20px; position: relative; top: 10px">
            <form action="find_course.php" method="get">
                Tìm kiếm:
                <input type="text" name="search" id="">
                <input type="submit" name="submit" id="" value="Tìm kiếm">
            </form>
        </span>

        
        <div class="table-responsive table-responsive-md" style="margin-top: 10px;">
            <form method="POST">
                <table class="table table-striped table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã khóa học</th>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Ngày</th>
                            <th scope="col">Tiết học</th>
                            <th scope="col">Phòng học</th>
                            <th scope="col">Kỳ học</th>
                            <th scope="col">Ngày bắt đầu</th>
                            <th scope="col">Ngày kết thúc</th>
                            <th scope="col">Tín chỉ</th>
                            <th scope="col">
                                Hủy môn học
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                        //bước 1:kết nối tời csdl(mysql)

                        //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                        $sql = "SELECT tb_course.id_course,code_course,name_course,days,lesson,startdate,enddate,credit,name_room,name_semester  
                        FROM tb_course,tbl_register,tb_users,tbl_room,tbl_semester 
                        where tb_course.id_room = tbl_room.id_room AND tb_course.id_semester = tbl_semester.id_semester 
                        AND tb_course.id_course = tbl_register.id_course AND tb_users.id_user = tbl_register.id_user and tbl_register.status=1";

                        $result = mysqli_query($conn, $sql);

                        //bước 3 xử lý kết quả trả về
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>

                                    <td><?php echo $row['code_course']; ?> </td>
                                    <td><?php echo $row['name_course']; ?> </td>
                                    <td><?php echo $row['days']; ?> </td>
                                    <td><?php echo $row['lesson']; ?> </td>
                                    <td><?php echo $row['name_room']; ?> </td>
                                    <td><?php echo $row['name_semester']; ?> </td>
                                    <td><?php echo $row['startdate']; ?> </td>
                                    <td><?php echo $row['enddate']; ?> </td>
                                    <td><?php echo $row['credit']; ?> </td>
                                    <td>
                                        <button type="submit" name="submit"><i class="fas fa-window-close"></i></button>
                                        <input type="hidden" name="id_course" value="<?php echo $row['id_course']; ?>">
                                    </td>
                                </tr>
                        <?php
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<?php
include('./bridge/footer.php');
if (isset($_POST['submit'])) {
    $id_course = $_POST['id_course'];
    $id_user = $_SESSION['id_user'];

    $sql = "UPDATE tbl_register SET status=0 where id_course='$id_course' and id_user='$id_user' ";

    if (mysqli_query($conn, $sql) == TRUE) {
        $_SESSION['noti'] = "Xóa thành công";
        header("location:list_course.php");
    } else {
        $_SESSION['noti'] = "Lỗi khi xóa";
        header("location:list_course.php");
    }
    mysqli_close($conn);
}
?>