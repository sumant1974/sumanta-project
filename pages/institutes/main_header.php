<?php
   include_once "./iheader.php";
   ?>
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
    <div class="row" ng-app="myApp" data-ng-controller="instCtrl" id="instCtrl">

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Institutes</h3>
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
                                    <button class="btn btn-default" ng-click="inst_delete($index)" data-toggle="modal"
                                        data-target="#modal-delete">
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
                            <h4 class="modal-title">Edit Institute</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Institute Name">Institute Name</label>
                                <input type="text" class="form-control" id="inst_name"
                                    placeholder="Enter Institute Name" name="inst_name" ng-model="inst_name" required>
                                <span style="color:red"
                                    ng-show="form_edit.inst_name.$dirty && form_edit.inst_name.$invalid">
                                    <span ng-show="form_edit.inst_name.$error.required">Institute Name is
                                        required.</span>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Course Name">Institute Shortname</label>
                                <input type="text" class="form-control" id="inst_shortname"
                                    placeholder="Enter Course Name" name="inst_shortname" ng-model="inst_shortname"
                                    required>
                                <span style="color:red"
                                    ng-show="form_edit.inst_shortname.$dirty && form_edit.inst_shortname.$invalid">
                                    <span ng-show="form_edit.inst_shortname.$error.required">Institute Shortname is
                                        required.</span>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Course Outline">Institute Address</label>
                                <textarea ckeditor="outlineeditor" ng-model="inst_address" rows="3" cols="30"
                                    name="inst_address">       </textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <input type="submit" ng-disabled="form_edit.partner_id.$dirty && form_edit.partner_id.$invalid ||  
                  form_edit.inst_shortname.$dirty && form_edit.inst_shortname.$invalid" class="btn btn-primary"
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
            action="/pages/courses/create.php" ng-app="instcreate" ng-controller="createCtrl">
            <div class="modal-content">
                <div class="modal-header box-header with-border">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add New Institute</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="Partner Name">Partner Name</label>
                        <Select class="form-control" id="partner_id" placeholder="Select Partner Name" name="partner_id"
                            ng-model="partner_id" required>
                            <option value="">==Select Partner==</option>
                            <?php foreach($partners as $p) {?>
                            <option value="<?php echo $p->partner_id; ?>">
                                <?php echo $p->partner_name."(".$p->partner_programme.")"; ?></option>
                            <?php } ?>
                        </select>
                        <span style="color:red" ng-show="form_add.partner_id.$dirty && form_add.partner_id.$invalid">
                            <span ng-show="form_add.partner_id.$error.required">Select Partner Name to Continue.</span>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="Course Name">Course Name</label>
                        <input type="text" class="form-control" id="inst_shortname" placeholder="Enter Course Name"
                            name="inst_shortname" ng-model="inst_shortname" ng-disabled="!partner_id" required>
                        <span style="color:red"
                            ng-show="form_add.inst_shortname.$dirty && form_add.inst_shortname.$invalid">
                            <span ng-show="form_add.inst_shortname.$error.required">Course Name is required.</span>
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="Course Outline">Course Outline</label>
                        <textarea id="course_outline_add" name="course_outline" ng-model="course_outline" rows="5"
                            cols="30" ng-disabled="!partner_id">
                  Provide a brief outline for the course.
                    </textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <input type="submit" ng-disabled="form_add.partner_id.$dirty && form_add.partner_id.$invalid ||  
                  form_add.inst_shortname.$dirty && form_add.inst_shortname.$invalid" class="btn btn-primary"
                        value="Save Changes"></input>
                </div>
            </div>
            <!-- /.modal-content -->
        </form>
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.content -->

<!-- script -->
<script>
$(function() {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('course_outline_add');

    //bootstrap WYSIHTML5 - text editor
    //$('.textarea').wysihtml5()
})
var app = angular.module('myApp', ['datatables', 'ckeditor', 'datatables.buttons']);
app.controller('instCtrl', function($scope, $http, DTOptionsBuilder) {
    $scope.class = [];
    $scope.outlineeditor = {
        language: 'en',
        allowedContent: true,
        entities: false
    };

    $http.get("getinsts.php")
        .then(function(response) {
            $scope.insts = response.data;
        });

    $scope.inst_edit = function(index) {
        $scope.inst_id = $scope.insts[index].inst_id;
        $scope.course_id = $scope.insts[index].inst_name;
        $scope.inst_shortname = $scope.insts[index].inst_shortname;
        $scope.course_outline = $scope.insts[index].inst_address;
        //outlineeditor.insertHtml($scope.course_outline);
    }
    $scope.inst_delete = function(index) {
        $scope.inst_id = $scope.courses[index].inst_id;
        $scope.inst_name = $scope.courses[index].inst_name;
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
var create = angular.module("instcreate", []);
create.controller('createCtrl', function($scope) {});
</script>