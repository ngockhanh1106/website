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

            <h3>Cập nhật kỳ học</h3>

            <a href="<?php echo SITEURL; ?>add_semester.php" class="btn btn-primary mt-2">Thêm</a>
            <div class="table-responsive table-responsive-md">

                <table class="table table-striped table-hover table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Mã kỳ học</th>
                            <th scope="col">Tên kỳ học</th>
                            <th scope="col" class="text-center">Sửa</th>
                            <th scope="col" class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $sql ="SELECT*FROM tbl_semester";
                
                        $result = mysqli_query($conn, $sql);

                        //bước 3 xử lý kết quả trả về
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {

                        ?>

                                <tr>
                                    <th scope="row"><?php echo $i; ?> </th>

                
                                    <td><?php echo $row['id_semester']; ?> </td>
                                    <td><?php echo $row['name_semester']; ?> </td>
            
                                    <td class="text-center"><a href="update_semester.php?id_semester=<?php echo $row['id_semester']; ?>"><i class="fas fa-edit text-success "></i></a></td>
                                    <td class="text-center"><a href="delete_semester.php?id_semester=<?php echo $row['id_semester']; ?>"><i class="fas fa-trash text-danger "></i></a></td>
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