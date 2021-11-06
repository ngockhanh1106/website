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
<<<<<<< HEAD
                        $sql1 = " SELECT * FROM tb_users, tbl_assign WHERE tb_users.id_user = tbl_assign.id_user AND tb_users.id_user = $id_user  ";
                        $result1 = mysqli_query($conn, $sql1);
=======
                        // $sql = "SELECT tbl_register.id_user,tbl_assign.id_user, fullname FROM tbl_register,tbl_assign,tb_users where tbl_assign.id_course=tbl_register.id_course and tb_users.role=3 and  tb_users.id_user= '$id_user'";
                        $sql="SELECT tbl_register.id_user,tbl_assign.id_user,tb_course.id_course,fullname FROM tbl_assign,tbl_register,tb_course,tb_users where tbl_register.id_course=tbl_assign.id_course  and tb_users.role=3 AND tbl_assign.id_user=$id_user";

                         echo $sql;
                        $result = mysqli_query($conn, $sql);

                        //bước 3 xử lý kết quả trả về
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
>>>>>>> 2f7e26f088a8ae34dc581bce25188ba4cc568dfa

                        if (mysqli_num_rows($result1) > 0) {
                            $row1 = mysqli_fetch_assoc($result1);
                            $id_course1 = $row1['id_course'];
                            $sql2 = "SELECT *  
                             FROM tb_course,tbl_register,tb_users, tbl_assign
                             where tb_users.id_user = tbl_register.id_user and tbl_register.id_course = tb_course.id_course 
                             and tb_course.id_course = tbl_assign.id_course AND tb_course.id_course = $id_course1";
                            $result2 = mysqli_query($conn, $sql2);
                            if (mysqli_num_rows($result2) > 0) {
                                $i = 1;
                                while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>

                                    <tr>
                                        <th scope="row"><?php echo $i; ?> </th>

<<<<<<< HEAD
                                        <td><?php echo $row2['fullname']; ?> </td>
                                        <td><?php echo $row2['name_course']; ?> </td>
                                        <td><?php echo $row2['email']; ?> </td>
                                        <td><?php echo $row2['sex']; ?> </td>
                                        <td><?php echo $row2['birthdate']; ?> </td>
                                        <td><?php echo $row2['phone']; ?> </td>
=======
                                    <td><?php echo $row['id_user']; ?> </td>
                                    <td><?php echo $row['fullname']; ?> </td>
                                    <td><?php echo $row['name_course']; ?> </td>
                                    <td><?php echo $row['email']; ?> </td>
                                    <td><?php echo $row['sex']; ?> </td>
                                    <td><?php echo $row['birthdate']; ?> </td>
                                    <td><?php echo $row['phone']; ?> </td>
>>>>>>> 2f7e26f088a8ae34dc581bce25188ba4cc568dfa

                                    </tr>
                        <?php
                                    $i++;
                                }
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