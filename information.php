<?php
include('./bridge/menu.php')
?>
<div class="col-md-12" style="width:100%;">
    <div class="text-bold" active="activeForm">
        <ul class="nav nav-tabs" ng-class="{'nav-stacked': vertical, 'nav-justified': justified}" ng-transclude="">
            <li ng-class="[{active: active, disabled: disabled}, classes]" class="uib-tab nav-item active" index="0" heading="Thông tin cá nhân">
                <a href="" ng-click="select($event)" class="nav-link" uib-tab-heading-transclude="">Thông tin cá nhân</a>
            </li>


        </ul>
        <div class="tab-content">
            <div class="tab-pane active" ng-repeat="tab in tabset.tabs" ng-class="{active: tabset.active === tab.index}" uib-tab-content-transclude="tab">
                <div class="panel panel-default" style="border: solid 1px #cddbd1;">
                    <div class="panel-heading text-center">Thông tin cá nhân</div>
                    <div class="panel-body">
                        <div class="row form-group">
                            <div class="col-xs-6 col-md-2">
                                <img height="160" width="130" alt="" src="">
                            </div>
                            <div class="col-md-10">
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label class="bold">Họ và tên</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="bold">Ngày sinh</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-touched ng-valid ng-not-empty">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label class="bold">Email</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="bold">Số điện thoại</label>
                                        <input readonly="" type="text" class="form-control ng-pristine ng-touched ng-valid ng-not-empty">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('./bridge/footer.php')
?>