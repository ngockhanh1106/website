<?php
include('./bridge/menu.php')
?>

<div class="row">
    <div class="col-12">



        <h3>Quản Lý Khóa Học</h3>

        <div class="my-3">
            <form action="" method="POST" style="display:flex;">
                <input class="form-control" type="search" name="search" placeholder="Tìm kiếm tên khóa học" required>
                <button class="btn btn-info text-light" type="submit" style="margin-left:20px;">Tìm</button>
            </form>

        </div>


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
                        $id_user = $_SESSION['id_user'];
                        $sql = "SELECT tb_course.id_course,code_course,name_course,days,lesson,startdate,enddate,credit,name_room,name_semester  
                        FROM tb_course,tbl_register,tb_users,tbl_room,tbl_semester
                        where tb_course.id_room = tbl_room.id_room AND tb_course.id_semester = tbl_semester.id_semester 
                        AND tb_course.id_course = tbl_register.id_course AND tb_users.id_user = tbl_register.id_user and tb_users.id_user= '$id_user'";

                        if (isset($_POST['search'])) {
                            // print_r($_POST);
                            $s = $_POST['search'];
                            $sql = "SELECT tb_course.id_course,code_course,name_course,days,lesson,startdate,enddate,credit,name_room,name_semester  
                            FROM tb_course,tbl_register,tb_users,tbl_room,tbl_semester 
                            where tb_course.id_room = tbl_room.id_room AND tb_course.id_semester = tbl_semester.id_semester 
                            AND tb_course.id_course = tbl_register.id_course AND tb_users.id_user = tbl_register.id_user and and tb_users.id_user= '$id_user'
                            and name_course like '%$s%'";
    
                            echo " <h4 class='text-success text-center'>Kết quả tìm kiếm của bạn trả về '$s'</h4>";
                        }
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
            
                                        <a href="cancel_course.php?id_course=<?php echo $row['id_course'];?>"  >  <i class="fas fa-times text-danger" ></i></a>
                                        
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
?>