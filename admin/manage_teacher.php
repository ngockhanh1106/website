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
            <a href="<?php echo SITEURL; ?>add_teacher.php" class="btn btn-primary ">Thêm</a>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">id</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Tên đăng nhâp</th>
                        <th scope="col">giới tính</th>
                        <th scope="col">ngày sinh</th>
                        <th scope="col">Số di động</th>
                        <th scope="col">mật khẩu</th>
                        <th scope="col">cấp độ</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
                    //bước 1:kết nối tời csdl(mysql)

                    //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
                    $sql = "SELECT*FROM users";

                    //echo $sql;
                    $result = mysqli_query($conn, $sql);

                    //bước 3 xử lý kết quả trả về
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                            <tr>
                                <th scope="row"><?php echo $i; ?> </th>

                                <td><?php echo $row['id_user']; ?> </td>
                                <td><?php echo $row['name']; ?> </td>
                                <td><?php echo $row['username']; ?> </td>
                                <td><?php echo $row['sex']; ?> </td>
                                <td><?php echo $row['birthdate']; ?> </td>
                                <td><?php echo $row['phone']; ?> </td>
                                <td><?php echo $row['pass']; ?> </td>
                                <td><?php echo $row['level']; ?> </td>

                                <td><a href="update_teacher.php?id_user=<?php echo $row['id_user']; ?>"><i class="fas fa-edit"></i></a></td>
                                <td><a href="delete_teacher.php?id_user=<?php echo $row['id_user']; ?>"><i class="fas fa-trash"></i></a></td>
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