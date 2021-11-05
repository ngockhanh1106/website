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
        <div class="my-3">
        <form action="" method="POST" style="display:flex;">
            <input class="form-control" type="search" name="search" placeholder="Tìm kiếm tên khóa học" required>
            <button class="btn btn-info text-light" type="submit" style="margin-left:20px;">Tìm</button>
        </form>
                   
        </div>

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
                        <th scope="col" class="text-center">Sửa</th>
                        <th scope="col" class="text-center">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                    $sql = "SELECT id_course,code_course,name_course,days,lesson,name_room,name_semester,startdate,enddate,credit,status FROM tb_course,tbl_room,tbl_semester where tb_course.id_room = tbl_room.id_room AND tb_course.id_semester = tbl_semester.id_semester";

                    if (isset($_POST['search'])) {
                        // print_r($_POST);
                        $s = $_POST['search'];
                        $sql = "SELECT id_course,code_course,name_course,days,lesson,name_room,name_semester,startdate,enddate,credit,status FROM tb_course,tbl_room,tbl_semester where name_course like '%$s%' and tb_course.id_room = tbl_room.id_room AND tb_course.id_semester = tbl_semester.id_semester";
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
                                <td><?php echo $row['status']; ?> </td>
                                <td class="text-center"><a href="update_course.php?id_course=<?php echo $row['id_course']; ?>"><i class="fas fa-edit text-success"></i></a></td>
                                <td class="text-center"><a href="delete_course.php?id_course=<?php echo $row['id_course']; ?>"><i class="fas fa-trash text-danger"></i></a></td>
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