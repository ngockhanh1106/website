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

        <h3>Phân công giảng dạy</h3>

        <div class="my-3">
            <form action="" method="POST" style="display:flex;">
                <input class="form-control" type="search" name="search_course" placeholder="Tìm kiếm tên khóa học" required>
                <button class="btn btn-info text-light" type="submit" style="margin-left:20px;">Tìm</button>
            </form>

        </div>

        <a href="<?php echo SITEURL; ?>add_assignment.php" class="btn btn-primary my-2">Thêm</a>
        <div class="table-responsive table-responsive-md">

            <table class="table table-striped table-hover table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên khóa học</th>
                        <th scope="col">Tên giảng viên</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT id_assign,name_course,fullname From tbl_assign,tb_course,tb_users where tb_course.id_course = tbl_assign.id_course and tb_users.id_user = tbl_assign.id_user";

                    if (isset($_POST['search_course'])) {
                        // print_r($_POST);
                        $s = $_POST['search_course'];
                        $sql = "SELECT id_assign,name_course,fullname From tbl_assign,tb_course,tb_users where name_course like '%$s%' and tb_course.id_course = tbl_assign.id_course and tb_users.id_user = tbl_assign.id_user";
                        echo " <h4 class='text-success text-center'>Kết quả tìm kiếm của bạn trả về '$s'</h4>";
                        // $sql = "SELECT id_course,code_course,name_course,days,lesson,name_room,name_semester,startdate,enddate,credit,status FROM tb_course,tbl_room,tbl_semester where name_course like '%$s%' and tb_course.id_room = tbl_room.id_room AND tb_course.id_semester = tbl_semester.id_semester";
                      }
                    $result = mysqli_query($conn, $sql);

                    //bước 3 xử lý kết quả trả về
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?> </th>


                                <td><?php echo $row['name_course']; ?> </td>
                                <td><?php echo $row['fullname']; ?> </td>

                                <td><a href="update_assignment.php?id_assign=<?php echo $row['id_assign']; ?>"><i class="fas fa-edit"></i></a></td>
                                <td><a href="delete_assignment.php?id_assign=<?php echo $row['id_assign']; ?>"><i class="fas fa-trash"></i></a></td>
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