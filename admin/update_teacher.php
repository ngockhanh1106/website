<?php
include('./bridge-admin/menu.php')
?>

<div class="main">
    <div class="container">
    <div class="mt-4 p-4 bg-white rounded shadow-sm">
        <div class="">
            <h3>Sửa thông tin</h3>
            <br /><br />
        </div>
        <?php
        //1. Get the ID of Selected Admin
         
        $id_user= $_GET['id_user'];
        
        //2. Create SQL Query to Get the Details
        $sql = "SELECT*FROM tb_users where id_user= $id_user";
        //echo $sql;

        //Execute the Query
        $res = mysqli_query($conn, $sql);


        //Check whether the query is executed or not
        if ($res == true) {
            // Check whether the data is available or not
            $count = mysqli_num_rows($res);
            //Check whether we have admin data or not
            if ($count == 1) {
                // Get the Details
                //echo "Admin Available";
                $row = mysqli_fetch_assoc($res); //

                $code_user = $row['code_user'];
                $fullname = $row['fullname'];
                $email = $row['email'];
                $sex = $row['sex'];
                $birthdate = $row['birthdate'];
                $phone = $row['phone'];
                $role = $row['role'];
                $current_image = $row['image_name'];


            } else {
                //Redirect to Manage Admin PAge
                header('location:' . SITEURL . 'index.php');
            }
        }
        ?>
        <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="code_user" class="col-sm-2 col-form-label">Mã giảng viên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="code_user" name="code_user" value="<?php echo $code_user; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="name_user" class="col-sm-2 col-form-label">Họ và Tên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name_user" name="fullname" value="<?php echo $fullname; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="username" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="sex" class="col-sm-2 col-form-label">Giới Tính</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="sex" name="sex" value="<?php echo $sex; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="birthdate" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="<?php echo $birthdate; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label for="sodidong" class="col-sm-2 col-form-label">So di dong</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="sodidong" name="phone" value="<?php echo $phone; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Hình ảnh hiện tại:</label>
                <div class="col-sm-10">
                    <?php
                    if ($current_image != "") {
                        //display image
                        //echo $current_image;
                    ?>
                        <img src="../image/staff/<?php echo $current_image ?>" alt="" width="15%">


                    <?php
                    } else {
                        //display message
                        echo "Chưa có ảnh";
                    }
                    ?>
                </div>
            </div>
            <div class="row mb-3">
                <label for="newimage" class="col-sm-2 col-form-label">Tải ảnh mới lên:</label>
                <div class="col-sm-10">
                    <input id="uploadImage" type="file" class="form-control" name="image">
                </div>
            </div>

            <input type="hidden" name="current_image">

           
            <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
            <input type="submit" class="btn btn-primary" name="btnUpdate" value="Sửa">
        </form>
    </div>

    </div>
</div>


<?php
//Check whether the Submit Button is Clicked or not
if (isset($_POST['btnUpdate'])) {
    //echo "Button CLicked";
    //Get all the values from form to update
    $id_user = $_POST['id_user'];
    $code_user = $_POST['code_user'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $sex = $_POST['sex'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $role = 2;
    $current_image = $_POST['current_image'];

    if (isset($_FILES['image']['name'])) {
        $image_name = $_FILES['image']['name'];
        // echo $image_name;

        if ($image_name != "") {
            $ext = end(explode('.', $image_name));

            $image_name = "Staff_list_" . rand(000, 999) . '.' . $ext; // e.g. Staff_list_116.jpg
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../image/staff/" . $image_name;

            $upload = move_uploaded_file($source_path, $destination_path);
            //echo $upload;

            if ($upload == false) {
                echo ' tai len ko thanh cong';
                die();
            }

            if ($current_image != "") {
                $remove_path = "../image/staff/" . $current_image;
                $remove = unlink($remove_path);
                if ($remove == false) {
                    echo 'loi khi bo anh';
                    die();
                }
            }
        } else {
            $image_name = $current_image;
        }
    } else {
        $image_name = $current_image;
    }


    $sql = "UPDATE `tb_users` SET `code_user` = '$code_user', `fullname` ='$fullname', `email` = '$email' ,`sex` = '$sex', `birthdate` = '$birthdate', `phone` = '$phone', `role` = '$role',image_name = '$image_name' WHERE `tb_users`.`id_user` = '$id_user'";


    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($res == true) {
        //Query Executed and Admin Updated
        $_SESSION['noti'] = "sửa thành công";
        header("location:" . SITEURL . 'users.php');
       
    } else {
        //Failed to Update Admin
        $_SESSION['noti'] = "lỗi khi sửa";
        header("location:" . SITEURL . 'users.php');
   
    }
}

?>

<?php 
include('./bridge-admin/footer.php')
?>