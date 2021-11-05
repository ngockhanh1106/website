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
        <br/>
        <h3>Danh sách sinh viên đăng ký khóa học</h3>

        <div class="my-3">
            <form action="" method="POST" style="display:flex;">
                <input class="form-control" type="search" name="search_stu" placeholder="Tìm kiếm tên khóa học" required>
                <button class="btn btn-info text-light" type="submit" style="margin-left:20px;">Tìm</button>
            </form>

        </div>

        <div class="table-responsive table-responsive-md">

            <table class="table table-striped table-hover table-bordered mt-3">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Mã khóa học</th>
                        <th scope="col">Tên khóa học</th>
                        <th scope="col">Mã sinh viên</th>
                        <th scope="col">Tên sinh viên</th>


                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "SELECT id_register,tb_course.code_course,tb_users.code_user,name_course,fullname From tbl_register,tb_course,tb_users where tb_course.id_course = tbl_register.id_course and tb_users.id_user = tbl_register.id_user";
                    if (isset($_POST['search_stu'])) {
                        // print_r($_POST);
                        $s = $_POST['search_stu'];
                        $sql = "SELECT id_register,tb_course.code_course,tb_users.code_user,name_course,fullname From tbl_register,tb_course,tb_users where name_course like '%$s%' and tb_course.id_course = tbl_register.id_course and tb_users.id_user = tbl_register.id_user";
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
                                <td><?php echo $row['code_user']; ?> </td>
                                <td><?php echo $row['fullname']; ?> </td>


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