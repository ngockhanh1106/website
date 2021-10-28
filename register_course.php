<?php
include('./bridge/menu.php')
?>

<div class="row">
    <div class="px-4 col-md-3" style="background-color: indianred;">meo</div>
    <div class="px-4 col-md-3" style="background-color:indigo;">meo</div>
    <div class="px-4 col-md-6" style="background-color: indianred;">ngay</div>
</div>
<div class="row mt-5">
    <div class="col-12">
        <div class="mt-4 p-4 bg-white rounded shadow-sm">
            <div class="mb-2 pb-2 border-bottom ">
                <div class="caption">
                    <i class="fa fa-th"></i>
                    Đăng ký học
                </div>
            </div>
            <div class="pt-2 row">
                <div class="col-3">
                    <h4>Môn học</h4>
                    <div class="scroll_body">
                        <table class="table table-bordered dataTable">
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="">llllll</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="">llllll</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <a href="">llllll</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="">llllll</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <a href="">llllll</a>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <a href="">llllll</a>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-9">
                    <h4>Lớp học phần</h4>
                    <div class="scroll_body">
                        <table class="table table-bordered dataTable ">
                            <tbody>

                                <tr class="bg-secondary disabled color-palette">
                                    <td colspan="5">

                                        Lớp chính: <strong>An toàn và bảo mật thông tin (61HT)</strong>
                                        <span>; Khóa: <strong>K61<span>
                                                    <span ng-if="e.status!= null"></span>

                                                </span></strong>; Trạng thái lớp học phần:

                                            <span class="text-white"><strong>Bình thường</strong></span>

                                        </span>

                                        <div class="md-checkbox margin-left-10" style="display: inline-block !important;">
                                            <input type="checkbox" id="" class="md-check" ng-checked="e.isSelected" ng-click="vm.toggleCourseSubjectEnrollment($event, e)" ng-disabled="(!vm.allowRegister &amp;&amp; !(vm.isAllowUnRegister==true &amp;&amp; e.isSelected==true) )||  (e.isOvelapTime!=null &amp;&amp; e.isOvelapTime) || (vm.currentCourseSubject.isForcedRegType!=null &amp;&amp; vm.currentCourseSubject.isForcedRegType==true) || vm.currentCourseSubject.isCancel==true || vm.currentCourseSubject.hasParaSubject==true || vm.currentCourseSubject.isAllowSubjectUnRegister==false" disabled="disabled" checked="checked">
                                            <label for="">
                                                <span></span> <span class="check"></span> <span class="box"></span>
                                            </label>
                                        </div>

                                        <span class="pull-right text-white">
                                            77/80
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th></th>
                                    <th>Tuần</th>
                                    <th>Thời gian</th>
                                    <th>Phòng</th>
                                    <th>Giáo viên</th>
                                </tr>


                                <tr>
                                    <th></th>
                                    <td style="width: 30%">
                                        <span>
                                            1<i class="fas fa-arrow-right"></i>8

                                            <span class="">
                                                (<b>06/09/2021</b>
                                                <i class="fas fa-arrow-right"></i>
                                                <b>31/10/2021</b>)
                                            </span>

                                        </span>
                                    </td>

                                    <td ng-if="t.weekIndex>0 &amp;&amp; t.weekIndex<8">Thứ <strong>4</strong> : Tiết 4
                                        <i class="fas fa-arrow-right"></i>Tiết 6
                                    </td>


                                    <td>347-A3</td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <th></th>
                                    <td style="width: 30%">
                                        <span>
                                            11<i class="fas fa-arrow-right"></i>18

                                            <span class="">
                                                (<b>15/11/2021</b>
                                                <i class="fas fa-arrow-right"></i>
                                                <b>09/01/2022</b>)
                                            </span>

                                        </span>
                                    </td>

                                    <td ng-if="t.weekIndex>0 &amp;&amp; t.weekIndex<8">Thứ <strong>2</strong> : Tiết 4
                                        <i class="fas fa-arrow-right"></i>Tiết 6
                                    </td>


                                    <td>243-A3</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <h1>Jumbotron Example</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat..</p>
        </div>
    </div>

    <?php
    include('./bridge/footer.php')
    ?>