<?php
   include_once "./iheader.php";
   ?>
<div ng-app="myApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Institutes
            <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/pages/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Institutes</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!--<div class="col-lg-2 col-xs-6">
             small box 
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>
            
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>-->
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?php echo $dashboard->InstitutesCount; ?></h3>
                        <p>Institutes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university"></i>
                    </div>
                    <div align="center">
                        <a class="btn btn-app bg-green" data-toggle="modal" data-target="#modal-create">
                            <i class="fa fa-plus"></i>Add
                        </a>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?php echo $dashboard->EducatorsCount; ?></h3>
                        <p>Educators</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </div>
                    <a href="/pages/educators" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-xs-6">
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?php echo $dashboard->StudentsCount; ?></h3>
                        <p>Students</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <a href="/pages/students" class="small-box-footer">More info <i
                            class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row" ng-controller="instCtrl" id="instCtrl">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Institutes</h3>
                    <div cg-busy="myPromise"></div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="inst-table" class="table table-bordered table-striped dataTable" datatable="ng"
                        dt-options="dtOptions">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Institute Name</th>
                                <th>Institute ShortName</th>
                                <th>Institute Address</th>
                                <th>Institute State</th>
                                <th>Principal Name</th>
                                <th>Institute Phone</th>
                                <th>Institute Email</th>
                                <th>Institute Website</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="inst in insts" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{inst.inst_name}}</td>
                                <td>{{inst.inst_shortname}}</td>
                                <td>{{inst.inst_address}}</td>
                                <td>{{inst.inst_state}}</td>
                                <td>{{inst.principal_name}}</td>
                                <td>{{inst.inst_phone}}</td>
                                <td>{{inst.inst_email}}</td>
                                <td>{{inst.inst_website}}</td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-default" ng-click="inst_edit($index)" data-toggle="modal"
                                            data-target="#modal-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-default" ng-click="inst_delete($index)"
                                            data-toggle="modal" data-target="#modal-delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>

            <div class="modal fade" id="modal-edit" style="display: none;" class="box box-primary">
                <div class="modal-dialog">
                    <form id="form_edit" name="form_edit" class="appnitro" role="form" method="post"
                        action="/pages/institutes/update.php">
                        <input type="hidden" ng-value="inst_id" name="inst_id" id="inst_id">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Edit Institute Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Institute Name">Institute Name</label>
                                    <input type="text" class="form-control" id="inst_name"
                                        placeholder="Enter name of the Institute" name="inst_name" ng-model="inst_name"
                                        required>

                                    <span style="color:red"
                                        ng-show="form_edit.inst_name.$dirty && form_edit.inst_name.$invalid">
                                        <span ng-show="form_edit.inst_name.$error.required">Enter Institute Name to
                                            Continue</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Institute Shortname">Institute Shortname</label>
                                    <input type="text" class="form-control" id="inst_shortname"
                                        placeholder="Enter a shortname of the Institute" name="inst_shortname"
                                        ng-model="inst_shortname" required>
                                    <span style="color:red"
                                        ng-show="form_edit.inst_shortname.$dirty && form_edit.inst_shortname.$invalid">
                                        <span ng-show="form_edit.inst_shortname.$error.required">Institute Shortname is
                                            required.</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Institute Address">Institute Address</label>
                                    <textarea ckeditor="instaddressadd" name="inst_address" ng-model="inst_address"
                                        rows="3" cols="30" required>
                  Provide Institute Address.
                    </textarea>
                                    <span style="color:red"
                                        ng-show="form_edit.inst_address.$dirty && form_edit.inst_address.$invalid">
                                        <span ng-show="form_edit.inst_address.$error.required">Institute Address is
                                            required.</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Institute State">Institute State</label>
                                    <Select type="text" class="form-control" id="inst_state"
                                        placeholder="Select State of Institute" name="inst_state" ng-model="inst_state"
                                        required>
                                        <option value="">==Select a State==</option>
                                        <option ng-repeat="state in states" value="{{state.name}}">{{state.name}}
                                        </option>
                                    </Select>
                                    <span style="color:red"
                                        ng-show="form_edit.inst_state.$dirty && form_edit.inst_state.$invalid">
                                        <span ng-show="form_edit.inst_state.$error.required">Institute State is
                                            required.</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Principal Name">Principal's Name</label>
                                    <input type="text" class="form-control" id="pri_name"
                                        placeholder="Enter Principal's Name" name="pri_name" ng-model="pri_name"
                                        required>
                                    <span style="color:red"
                                        ng-show="form_edit.pri_name.$dirty && form_edit.pri_name.$invalid">
                                        <span ng-show="form_edit.pri_name.$error.required">Principa'l Name is
                                            required.</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Institute Phone">Institute Phone</label>
                                    <input type="text" class="form-control" id="inst_phone"
                                        placeholder="Enter Institute's Phone Number" name="inst_phone"
                                        ng-model="inst_phone" required>
                                    <span style="color:red"
                                        ng-show="form_edit.inst_phone.$dirty && form_edit.inst_phone.$invalid">
                                        <span ng-show="form_edit.inst_phone.$error.required">Institute Phone Number is
                                            Required</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Institute Email">Institute Email</label>
                                    <input type="text" class="form-control" id="inst_email"
                                        placeholder="Enter Institute's Email ID" name="inst_email" ng-model="inst_email"
                                        required>
                                    <span style="color:red"
                                        ng-show="form_edit.inst_email.$dirty && form_edit.inst_email.$invalid">
                                        <span ng-show="form_edit.inst_email.$error.required">Institute Email ID is
                                            Required</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Institute website">Institute Website</label>
                                    <input type="text" class="form-control" id="inst_website"
                                        placeholder="Enter Institute's website" name="inst_website"
                                        ng-model="inst_website" required>
                                    <span style="color:red"
                                        ng-show="form_edit.inst_website.$dirty && form_edit.inst_website.$invalid">
                                        <span ng-show="form_edit.inst_website.$error.required">Institute Website is
                                            Required</span>
                                    </span>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <input type="submit" ng-disabled="form_edit.inst_name.$dirty && form_edit.inst_name.$invalid ||  
                  form_edit.inst_shortname.$dirty && form_edit.inst_shortname.$invalid || 
                  form_edit.inst_address.$dirty && form_edit.inst_address.$invalid ||
                  form_edit.inst_state.$dirty && form_edit.inst_state.$invalid ||
                  form_edit.pri_name.$dirty && form_edit.pri_name.$invalid ||
                  form_edit.inst_phone.$dirty && form_edit.inst_phone.$invalid ||
                  form_edit.inst_email.$dirty && form_edit.inst_email.$invalid ||
                  form_edit.inst_website.$dirty && form_edit.inst_website.$invalid" class="btn btn-primary"
                                    value="Save Changes"></input>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
            <div class="modal modal-danger fade" id="modal-delete" style="display: none;" class="box box-primary">
                <div class="modal-dialog">
                    <form id="form_delete" name="form_delete" class="appnitro" role="form" method="post"
                        action="/pages/institutes/delete.php">
                        <input type="hidden" name="inst_id" id="inst_id" ng-value="inst_id">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Delete Institute Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Partner Name">Please Confirm Deletion of Institute<br /><span
                                            class="box-warning">Institute Name: {{inst_name}}</span></label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left"
                                        data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-primary" value="Confirm Delete"></input>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                    </form>
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
    </section>

    <!-- Modal Create Dialog box -->
    <div class="modal fade" id="modal-create" style="display: none;" class="box box-primary">
        <div class="modal-dialog">
            <form id="form_add" name="form_add" class="appnitro" role="form" method="post"
                action="/pages/institutes/create.php" ng-controller="createCtrl">
                <div class="modal-content">
                    <div class="modal-header box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add New Institute</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Institute Name">Institute Name</label>
                            <input type="text" class="form-control" id="inst_name"
                                placeholder="Enter name of the Institute" name="inst_name" ng-model="inst_name"
                                required>

                            <span style="color:red" ng-show="form_add.inst_name.$dirty && form_add.inst_name.$invalid">
                                <span ng-show="form_add.inst_name.$error.required">Enter Institute Name to
                                    Continue</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Institute Shortname">Institute Shortname</label>
                            <input type="text" class="form-control" id="inst_shortname"
                                placeholder="Enter a shortname of the Institute" name="inst_shortname"
                                ng-model="inst_shortname" required>
                            <span style="color:red"
                                ng-show="form_add.inst_shortname.$dirty && form_add.inst_shortname.$invalid">
                                <span ng-show="form_add.inst_shortname.$error.required">Institute Shortname is
                                    required.</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Institute Address">Institute Address</label>
                            <textarea ckeditor="instaddressadd" name="inst_address" ng-model="inst_address" rows="3"
                                cols="30" required>
                  Provide Institute Address.
                    </textarea>
                            <span style="color:red"
                                ng-show="form_add.inst_address.$dirty && form_add.inst_address.$invalid">
                                <span ng-show="form_add.inst_address.$error.required">Institute Address is
                                    required.</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Institute State">Institute State</label>
                            <Select type="text" class="form-control" id="inst_state"
                                placeholder="Select State of Institute" name="inst_state" ng-model="inst_state"
                                required>
                                <option value="">==Select a State==</option>
                                <option ng-repeat="state in states" value="{{state.name}}">{{state.name}}</option>
                            </Select>
                            <span style="color:red"
                                ng-show="form_add.inst_state.$dirty && form_add.inst_state.$invalid">
                                <span ng-show="form_add.inst_state.$error.required">Institute State is
                                    required.</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Principal Name">Principal's Name</label>
                            <input type="text" class="form-control" id="pri_name" placeholder="Enter Principal's Name"
                                name="pri_name" ng-model="pri_name" required>
                            <span style="color:red" ng-show="form_add.pri_name.$dirty && form_add.pri_name.$invalid">
                                <span ng-show="form_add.pri_name.$error.required">Principa'l Name is
                                    required.</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Institute Phone">Institute Phone</label>
                            <input type="text" class="form-control" id="inst_phone"
                                placeholder="Enter Institute's Phone Number" name="inst_phone" ng-model="inst_phone"
                                required>
                            <span style="color:red"
                                ng-show="form_add.inst_phone.$dirty && form_add.inst_phone.$invalid">
                                <span ng-show="form_add.inst_phone.$error.required">Institute Phone Number is
                                    Required</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Institute Email">Institute Email</label>
                            <input type="text" class="form-control" id="inst_email"
                                placeholder="Enter Institute's Email ID" name="inst_email" ng-model="inst_email"
                                required>
                            <span style="color:red"
                                ng-show="form_add.inst_email.$dirty && form_add.inst_email.$invalid">
                                <span ng-show="form_add.inst_email.$error.required">Institute Email ID is
                                    Required</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Institute website">Institute Website</label>
                            <input type="text" class="form-control" id="inst_website"
                                placeholder="Enter Institute's website" name="inst_website" ng-model="inst_website"
                                required>
                            <span style="color:red"
                                ng-show="form_add.inst_website.$dirty && form_add.inst_website.$invalid">
                                <span ng-show="form_add.inst_website.$error.required">Institute Website is
                                    Required</span>
                            </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" ng-disabled="form_add.inst_name.$dirty && form_add.inst_name.$invalid ||  
                  form_add.inst_shortname.$dirty && form_add.inst_shortname.$invalid || 
                  form_add.inst_address.$dirty && form_add.inst_address.$invalid ||
                  form_add.inst_state.$dirty && form_add.inst_state.$invalid ||
                  form_add.pri_name.$dirty && form_add.pri_name.$invalid ||
                  form_add.inst_phone.$dirty && form_add.inst_phone.$invalid ||
                  form_add.inst_email.$dirty && form_add.inst_email.$invalid ||
                  form_add.inst_website.$dirty && form_add.inst_website.$invalid" class="btn btn-primary"
                            value="Save Changes"></input>
                    </div>
                </div>
                <!-- /.modal-content -->
            </form>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
</div>
<!-- script -->
<script>
var app = angular.module('myApp', ['datatables', 'ngResource', 'ckeditor', 'datatables.buttons', 'cgBusy']);
app.controller('instCtrl', function($scope, $http, $resource, DTOptionsBuilder) {
    $scope.class = [];
    $scope.outlineeditor = {
        language: 'en',
        allowedContent: true,
        entities: false
    };
    //$scope.loading='<b>Loading Data.. Please wait..</b><i class="fas fa-sync fa-spin"></i>';
    $scope.myPromise = $resource('getinsts.php').query().$promise
        .then(function(response) {
            $scope.insts = response;
        });
        //$scope.loading='';
    $http.get("/lib/states.json")
        .then(function(response) {
            $scope.states = response.data;
        });

    $scope.inst_edit = function(index) {
        $scope.inst_id = $scope.insts[index].inst_id;
        $scope.inst_name = $scope.insts[index].inst_name;
        $scope.inst_shortname = $scope.insts[index].inst_shortname;
        $scope.inst_address = $scope.insts[index].inst_address;
        $scope.inst_email = $scope.insts[index].inst_email;
        $scope.inst_phone = $scope.insts[index].inst_phone;
        $scope.inst_website = $scope.insts[index].inst_website;
        $scope.pri_name = $scope.insts[index].principal_name;
        $scope.inst_address = $scope.insts[index].inst_address;
        $scope.inst_state = $scope.insts[index].inst_state;
        //outlineeditor.insertHtml($scope.course_outline);
    }
    $scope.inst_delete = function(index) {
        $scope.inst_id = $scope.insts[index].inst_id;
        $scope.inst_name = $scope.insts[index].inst_name;
    };

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withButtons([{
                extend: 'copy',
                text: '<i class="fa fa-files-o"></i> Copy',
                titleAttr: 'Copy'
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-file-text-o"></i> Excel',
                titleAttr: 'Excel'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print" aria-hidden="true"></i> Print',
                titleAttr: 'Print'
            }
        ]);



});
app.controller('createCtrl', function($scope, $http) {

    $http.get("/lib/states.json")
        .then(function(response) {
            $scope.states = response.data;
        });

    $scope.instaddressadd = {
        language: 'en',
        allowedContent: true,
        entities: false
    };
});
</script>