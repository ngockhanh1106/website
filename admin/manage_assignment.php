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

            <a href="<?php echo SITEURL; ?>add_assignment.php" class="btn btn-primary mt-2">Thêm</a>
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

                        $sql ="SELECT id_assign,name_course,fullname From tbl_assign,tb_course,tb_users where tb_course.id_course = tbl_assign.id_course and tb_users.id_user = tbl_assign.id_user";
                
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