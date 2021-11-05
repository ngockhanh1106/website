

        <thead>
            <tr>
                <th>STT</th>
                <th>Mã Giáo viên</th>
                <!-- <th>Mật khẩu</th> -->
                <th>Tên Giáo viên</th>
                <th>Email</th>
                <th>Giới tính</th>
                <th>Ngày sinh</th>
                <th>Số điện thoại</th>
                <th>Sửa</th>
                <th>Xóa</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include('../config/constants.php');
            $sql = "SELECT * FROM `tb_users` WHERE role = 2";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['code_user'] ?></td>
                        <!-- <td>?= $row['pass'] ?></td> -->
                        <td><?= $row['fullname'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['sex'] ?></td>
                        <td><?= $row['birthdate'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td>
                            <a href="update_teacher.php?id_user=<?php echo $row['id_user']; ?>"><i class="fas fa-edit"></i></a>
                        </td>

                        <td><a href="delete_user.php?id_user=<?php echo $row['id_user']; ?>"><i class="fas fa-trash"></i></a></td>
                        </td>
                    </tr>
            <?php
                    $i++;
                }
            }
            ?>
        </tbody>
</div>