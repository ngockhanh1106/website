<?php
include('bridge-admin/menu.php')
?>

<div class="mt-4 p-4 bg-white rounded shadow-sm">
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
            <a href="<?php echo SITEURL; ?>add_user.php" class="btn btn-primary mt-2">Thêm</a>
            <div class="table-responsive table-responsive-md">

                <table class="table table-striped table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã người dùng</th>
                            <th scope="col">Họ và tên</th>
                            <th scope="col">Email</th>
                            <th scope="col">Giới tính</th>
                            <th scope="col">Ngày sinh</th>
                            <th scope="col">Số di động</th>
                            <th scope="col">Mật khẩu</th>
                            <th scope="col">Quyền</th>
                            <th scope="col">Sửa</th>
                            <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                        //bước 1:kết nối tời csdl(mysql)

                        //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                        $sql = "SELECT*FROM tb_users";

                        //echo $sql;
                        $result = mysqli_query($conn, $sql);

                        //bước 3 xử lý kết quả trả về
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {


                        ?>

                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>

                                    <td><?php echo $row['code_user']; ?> </td>
                                    <td><?php echo $row['fullname']; ?> </td>
                                    <td><?php echo $row['email']; ?> </td>
                                    <td><?php echo $row['sex']; ?> </td>
                                    <td><?php echo $row['birthdate']; ?> </td>
                                    <td><?php echo $row['phone']; ?> </td>
                                    <td><?php echo $row['pass']; ?> </td>
                                    <td><?php echo $row['role']; ?> </td>

                                    <td><a href="update_user.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i></a></td>
                                    <td><a href="delete_user.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i></a></td>
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

</div>

<?php
include('./bridge-admin/footer.php')
?>