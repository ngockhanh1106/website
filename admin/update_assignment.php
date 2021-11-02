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

            $id_assign = $_GET['id_assign'];

            //2. Create SQL Query to Get the Details
            $sql = "SELECT*FROM tbl_assign where id_assign= $id_assign";
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
                    $row = mysqli_fetch_assoc($res);
                     
                    $id_course = $row['id_course'];
                    $id_user = $row['id_user'];
    
                    $old_course = $id_course;
                    $old_user = $id_user;

                } else {
                    //Redirect to Manage Admin PAge
                    header('location:' . SITEURL . 'index.php');
                }
            }
            ?>
            <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
                
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Tên Khóa học</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="course">
                        <?php
                        $sql = "SELECT * FROM tb_course";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id_course = $row['id_course'];
                                $name_course = $row['name_course'];
                        ?>
                                <option class="form-control" value="<?= $id_course; ?>" <?php if ($id_course == $old_course) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                    <?= $name_course ?></option>
                            <?php
                            }
                        } else {
                            ?>
                            <option value="0">No Found</option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="semester" class="col-sm-2 col-form-label">Tên Giảng viên</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="user">
                        <?php
                        $sql = "SELECT * FROM tb_users where role = 2";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id_user = $row['id_user'];
                                $fullname = $row['fullname'];
                        ?>
                                <option class="form-control" value="<?= $id_user; ?>" <?php if ($id_user == $old_user) {
                                                                                        echo "selected";
                                                                                    } ?>>
                                    <?= $fullname ?></option>
                            <?php
                            }
                        } else {
                            ?>
                            <option value="0">No Found</option>
                        <?php
                        }
                        ?>
                    </select>                    </div>
                </div>

                
                <input type="hidden" name="id_assign" value="<?php echo $id_assign; ?>">
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
    $id_course = $_POST['course'];
    $id_user = $_POST['user'];
 

 
   $sql = "UPDATE `tbl_assign` SET `id_course` = '$id_course', `id_user` ='$id_user' WHERE `id_assign` = '$id_assign'";
   echo $sql;

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($res == true) {
        //Query Executed and Admin Updated
        $_SESSION['noti'] = "sửa thành công";
        header("location:" . SITEURL . 'manage_assignment.php');
    } else {
        //Failed to Update Admin
        // $_SESSION['noti'] = "lỗi khi sửa";
        // header("location:" . SITEURL . 'manage_course.php');
        echo "loi";
    }
}

?>

<?php
include('./bridge-admin/footer.php')
?>