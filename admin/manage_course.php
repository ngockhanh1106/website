<?php
include('bridge-admin/menu.php')
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

            <a href="<?php echo SITEURL; ?>add_course.php" class="btn btn-primary mt-2">Thêm</a>
            <div class="table-responsive table-responsive-md">

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
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                        //bước 1:kết nối tời csdl(mysql)

                        //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                        $sql = "SELECT id_course,code_course,name_course,days,lesson,name_room,name_semester,startdate,enddate,credit,status FROM tb_course,tbl_room,tbl_semester where tb_course.id_room = tbl_room.id_room AND tb_course.id_semester = tbl_semester.id_semester";
                        // $sql = "SELECT image_name,nv.manv, nv.tennv, nv.chucvu, nv.email, nv.sodidong, dv.tendv FROM db_nhanvien nv, db_donvi dv WHERE nv.madv = dv.madv order by nv.manv";


                        // echo $sql;
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
                                    <td><?php echo $row['status']; ?> </td>
                                    <td><a href="update_course.php?id_course=<?php echo $row['id_course']; ?>"><i class="fas fa-edit"></i></a></td>
                                    <td><a href="delete_course.php?id_course=<?php echo $row['id_course']; ?>"><i class="fas fa-trash"></i></a></td>
                                </tr>
                        <?php
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



<?php
include('./bridge-admin/footer.php')
?>