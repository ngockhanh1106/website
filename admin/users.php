<?php
include("./bridge-admin/menu.php");
?>
<!-- <div class="row margin-top-10"> -->
    <div class="col-md-12">
        <!-- <div class="portlet "> -->
            <div class="portlet-body">
                <h4><?php
                    if (isset($_SESSION['noti'])) {
                        echo $_SESSION['noti'];
                        unset($_SESSION['noti']);
                    }
                    ?></h4>

                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 margin-bottom-10">
                                <div class="row">
                                    <div class="col-md-3 mt-1">
                                        <h4 class="bold">Loại tài khoản</h4>
                                        <select class="form-control rounded" id="account">
                                            <option selected>Chọn loại tài khoản</option>
                                            <option value="teacher">Tài khoản giáo viên</option>
                                            <option value="student">Tài khoản học sinh</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3 mt-5" >
                                        <a href="add_user.php" >
                                            <button class="border border-dark px-1 rounded">Thêm tài khoản Giáo viên</button>
                                        </a>
                                    </div>
                                    <div class="col-md-3 mt-5">
                                        <a href="addHS_account.php">
                                        <button class="border border-dark px-1 rounded">Thêm tài khoản Học sinh</button>
                                    </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 25px;">
                                <table class="table table-striped table-bordered table-hover" id="showaccount">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("./bridge-admin/footer.php");
?>