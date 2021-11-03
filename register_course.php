<?php
include('./bridge/menu.php')
?>

<div class="row">
    <div class="col-12">
        <?php
        if (isset($_SESSION['noti'])) //Checking whether the SEssion is Set of Not
        {
            echo $_SESSION['noti']; //Display the SEssion Message if SEt
            unset($_SESSION['noti']); //Remove Session Message
        }
        ?>
        <br />

        <h3>Quản Lý Khóa Học</h3>

        <div class="table-responsive table-responsive-md">
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
                                Đăng ký
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                        //bước 1:kết nối tời csdl(mysql)

                        //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                        $sql = "SELECT id_course,code_course,name_course,days,lesson,name_room,name_semester,startdate,enddate,credit,status FROM tb_course,tbl_room,tbl_semester where tb_course.id_room = tbl_room.id_room AND tb_course.id_semester = tbl_semester.id_semester and tb_course.status=1";
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
                                        <button type="submit" name="submit"><i class="fas fa-book-medical"></i></button>
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
include('./bridge/footer.php')
?>
<?php
include('./bridge/footer.php');
if (isset($_POST['submit'])) {
    $id_course= $_POST['id_course'];
    $id_user= $_SESSION['id_user'];

    $sql = "INSERT INTO tbl_register(id_course,id_user,status)
    VALUES( '$id_course','$id_user',1)";
        

        if (mysqli_query($conn, $sql) == TRUE) {
            $_SESSION['noti'] = "thêm thành công";
            // header("location:" . SITEURL . '');
        } else {
            $_SESSION['noti'] = "Lỗi khi thêm";
            // header("location:" . SITEURL . '');
        }
        mysqli_close($conn);
}
?>