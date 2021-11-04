<?php
include('./bridge-admin/menu.php')
?>

<div class="main">
    <div class="container">
        <div class="mt-4 p-4 bg-white rounded shadow-sm">
            <div class="">
                <h3>Thêm kỳ học</h3>
                <br /><br />
            </div>
            <form action="#" method="POST" class="mb-4" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control" id="id_semester" name="id_semester" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Tên kỳ học</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="name_semester" name="name_semester" >
                    </div>
                </div>

                
                <input type="submit" class="btn btn-primary" name="btnAdd" value="Thêm">
            </form>
        </div>

    </div>
</div>


<?php
//Check whether the Submit Button is Clicked or not
if (isset($_POST['btnAdd'])) {
    //echo "Button CLicked";
    //Get all the values from form to update
    $id_semester = $_POST['id_semester'];
    $name_semester = $_POST['name_semester'];
   
   $sql = "INSERT INTO tbl_semester(name_semester) VALUES ('$name_semester')";
  
    //Execute the Query
    $res = mysqli_query($conn, $sql);

    //Check whether the query executed successfully or not
    if ($res == true) {
        //Query Executed and Admin Updated
        $_SESSION['noti'] = "thêm thành công";
        header("location:" . SITEURL . 'manage_semester.php');
    } else {
        //Failed to Update Admin
        $_SESSION['noti'] = "lỗi khi thêm";
        header("location:" . SITEURL . 'manage_semester.php');
    }
    mysqli_close($conn);

}

?>

<?php
include('./bridge-admin/footer.php')
?>