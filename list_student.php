<?php
include('./bridge/menu.php');
?>
<div class="row">
    <div class="col-12">
        <h3>Danh sách sinh viên đăng kí học </h3>
        <div class="table-responsive table-responsive-md">
            <form method="POST">
                <table class="table table-striped table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Họ tên</th>
                            <th scope="col">Tên khóa học</th>
                            <th scope="col">Email</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Số điện thoại</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                        //bước 1:kết nối tời csdl(mysql)
                        $id_user = $_SESSION['id_user'];

                        //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                        $sql = "
                        SELECT id_assign,code_course,name_course,days,lesson,startdate,enddate,name_room,name_semester,credit 
                        FROM tb_users,tb_course,tbl_assign,tbl_room,tbl_semester 
                        where tbl_assign.id_course=tb_course.id_course and tbl_assign.id_user = tb_users.id_user and tb_course.id_room = tbl_room.id_room and tb_course.id_semester = tbl_semester.id_semester and tbl_assign.id_user=$id_user";

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
?>