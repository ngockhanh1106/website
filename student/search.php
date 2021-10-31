<?php
include('./bridge-student/menu.php')
?>
<div class="row margin-top-10">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 margin-bottom-10">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4 class="bold">Năm học</h4>
                                        <select class="form-control">
                                            <option selected>2020-2021</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="bold">Học kì</h4>
                                        <select class="form-control">
                                            <option selected>Học kì 1</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="bold">Môn học</h4>
                                        <select class="form-control">
                                            <option value="0" selected>Chọn môn học</option>
                                            <option value="1">Toán</option>
                                            <option value="2">Lý</option>
                                            <option value="3">Hóa</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="bold">Lớp</h4>
                                        <select class="form-control">
                                            <option value="0" selected>Chọn Lớp</option>
                                            <option value="1">10</option>
                                            <option value="2">11</option>
                                            <option value="3">12</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3" style="margin-top: 10px;">
                                        <button>Tra cứu</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12" style="margin-top: 25px;">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>STT</th>
                                            <th>Tên học sinh</th>
                                            <th>Ngày sinh</th>
                                            <th>Lớp</th>
                                            <th>Điểm miệng</th>
                                            <th>Điểm 15 phút</th>
                                            <th>Điểm 1 tiết</th>
                                            <th>Điểm học kì</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
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
include('./bridge-student/footer.php')
?>