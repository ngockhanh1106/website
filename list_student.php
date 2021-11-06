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
// var_dump($id_user);die;
                        //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                        $sql = "
                        SELECT * FROM `tb_users`
JOIN tbl_assign 
on tb_users.id_user = tbl_assign.id_user
WHERE tb_users.role = 2 AND tb_users.id_user = 27;";
                        $result = mysqli_query($conn, $sql);

                        //bước 3 xử lý kết quả trả về
                        $dataTecheer = mysqli_fetch_assoc($result);
                        if(!empty($dataTecheer)){
                           $idCourse = $dataTecheer['id_course'];
                           $sql1 = "
                           SELECT * FROM tb_course
                           JOIN tbl_register 
                           on tb_course.id_course = tbl_register.id_course
                           JOIN tb_users 
                           ON tbl_register.id_user = tb_users.id_user
                           WHERE tb_course.id_course = ".$idCourse.";";
                        //    echo $sql1;
                            $resultStudent = mysqli_query($conn, $sql1);
                            // var_dump
                        //    var_dump(mysqli_fetch_assoc($resultStudent));
                            $dataStudent = mysqli_fetch_all($resultStudent);
                           
                            $i = 1;
                            foreach ($dataStudent as $row) {
                                // var_dump($row);die;
                                

                        ?>

                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>

                                    <td><?php echo $row['17']; ?> </td>
                                    <td><?php echo $row['2']; ?> </td>
                                    <td><?php echo $row['18']; ?> </td>
                                    <td><?php echo $row['19']; ?> </td>
                                    <td><?php echo $row['20']; ?> </td>
                                    <td><?php echo $row['21']; ?> </td>

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