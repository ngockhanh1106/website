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

            $id_semester = $_GET['id_semester'];

            //2. Create SQL Query to Get the Details
            $sql = "SELECT*FROM tbl_semester where id_semester= $id_semester";
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
                    $id_semester = $row['id_semester'];
                    $name_semester = $row['name_semester'];
                    

                } else {
                    //Redirect to Manage Admin PAge
                    header('location:' . SITEURL . 'manage_semester.php');
                }
            }
            ?>
            <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
                <div class="row mb-3">
                    <label for="id_semester" class="col-sm-2 col-form-label">Mã kỳ học</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="id_semester" name="id_semester" value="<?php echo $id_semester; ?>">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Tên kỳ học</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_semester" name="name_semester" value="<?php echo $name_semester; ?>">
                    </div>
                </div>

                
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
    $id_semester = $_POST['id_semester'];
    $name_semester = $_POST['name_semester'];
   
   $sql = "UPDATE `tbl_semester` SET `name_semester` ='$name_semester' WHERE `id_semester` = '$id_semester'";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($res == true) {
        //Query Executed and Admin Updated
        $_SESSION['noti'] = "sửa thành công";
        header("location:" . SITEURL . 'manage_semester.php');
    } else {
        //Failed to Update Admin
        $_SESSION['noti'] = "lỗi khi sửa";
        header("location:" . SITEURL . 'manage_semester.php');
    }
    mysqli_close($conn);

}

?>

<?php
include('./bridge-admin/footer.php')
?>