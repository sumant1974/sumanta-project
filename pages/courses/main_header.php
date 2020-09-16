<?php
   include_once "./cheader.php";
   $_SESSION["pselected"]=array();
   ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Courses
        <small>Manage</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/pages/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Courses</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box 
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>150</h3>
            
                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>-->
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php echo $dashboard->PartnersCount; ?></h3>
                    <p>Partners</p>
                </div>
                <div class="icon">
                    <i class="fa fa-handshake-o"></i>
                </div>
                <a href="/pages/partners/" class="small-box-footer">More info <i
                        class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo $dashboard->CoursesCount; ?></h3>
                    <p>Courses Offered</p>
                </div>
                <div class="icon">
                    <i class="fa fa-book"></i>
                </div>
                <div align="center">
                    <a class="btn btn-app bg-yellow" data-toggle="modal" data-target="#modal-create">
                        <i class="fa fa-plus"></i>Add
                    </a>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box 
            <div class="small-box bg-red">
              <div class="inner">
                <h3>65</h3>
            
                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>-->
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <div class="row" ng-app="myApp" data-ng-controller="partnerCtrl" id="partnerCtrl">
        <div class="col-md-3 col-sm-6 col-xs-12">

            <?php foreach($partners as $p) {?>

            <div ng-click="partnerSelect(<?php echo $p->partner_id; ?>)" class="info-box"
                id="<?php echo $p->partner_id; ?>" ng-init="class[<?php echo $p->partner_id; ?>]=''"
                ng-class="class[<?php echo $p->partner_id; ?>]">
                <span class="info-box-icon bg-aqua"><img class="img-circle"
                        src="http://logo.clearbit.com/<?php echo $p->partner_website; ?>" width="64px"
                        alt="Logo"></span>
                <div class="info-box-content">
                    <span class="badge bg-aqua pull-right"><?php echo $p->coursecount ?></span>
                    <span class="info-box-text"><?php echo $p->partner_name ?></span>
                    <span class="info-box-number"><a
                            href="http://<?php echo $p->partner_website ?>"><?php echo $p->partner_website ?></a></span>
                    <span><?php echo $p->partner_programme ?></span>
                </div>
                <!-- /.info-box-content -->
            </div>

            <!-- /.info-box -->
            <?php } ?>
        </div>
        <div class="col-md-9 col-sm-6 col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Courses</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="course-table" class="table table-bordered table-striped dataTable" datatable="ng" dt-options="dtOptions">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Course Name</th>
                                <th>Course Outline</th>
                                <th>Partner Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="course in courses" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{course.course_name}}</td>
                                <td>{{course.course_outline}}</td>
                                <td>{{course.partner_name}}</td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-default" ng-click="course_edit($index)"
                                            data-toggle="modal" data-target="#modal-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-default" ng-click="course_delete($index)"
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
        </div>
        <div class="modal fade" id="modal-edit" style="display: none;" class="box box-primary">
            <div class="modal-dialog">
                <form id="form_edit" name="form_edit" class="appnitro" role="form" method="post"
                    action="/pages/courses/update.php" ng-app="create-course">
                    <input type="hidden" ng-value="course_id" name="course_id" id="course_id">
                    <div class="modal-content">
                        <div class="modal-header box-header with-border">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Edit Course</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Partner Name">Partner Name</label>
                                <Select class="form-control" id="partner_id" placeholder="Select Partner Name"
                                    name="partner_id" ng-model="partner_id" required>
                                    <option value="">==Select Partner==</option>
                                    <?php foreach($partners as $p) {?>
                                    <option value="<?php echo $p->partner_id; ?>">
                                        <?php echo $p->partner_name."(".$p->partner_programme.")"; ?></option>
                                    <?php } ?>
                                </select>
                                <span style="color:red"
                                    ng-show="form_edit.partner_id.$dirty && form_edit.partner_id.$invalid">
                                    <span ng-show="form_edit.partner_id.$error.required">Select Partner Name to
                                        Continue.</span>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Course Name">Course Name</label>
                                <input type="text" class="form-control" id="course_name" placeholder="Enter Course Name"
                                    name="course_name" ng-model="course_name" required>
                                <span style="color:red"
                                    ng-show="form_edit.course_name.$dirty && form_edit.course_name.$invalid">
                                    <span ng-show="form_edit.course_name.$error.required">Course Name is
                                        required.</span>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="Course Outline">Course Outline</label>
                                <textarea ckeditor="outlineeditor" ng-model="course_outline" rows="5" cols="30"
                                    name="course_outline">

                    </textarea>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                            <input type="submit" ng-disabled="form_edit.partner_id.$dirty && form_edit.partner_id.$invalid ||  
                  form_edit.course_name.$dirty && form_edit.course_name.$invalid" class="btn btn-primary"
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
                    action="/pages/courses/delete.php">
                    <input type="hidden" name="course_id" id="course_id" ng-value="course_id">
                    <div class="modal-content">
                        <div class="modal-header box-header with-border">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Delete Course Details</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Partner Name">Please Confirm Deletion of Course<br /><span
                                        class="box-warning">Course Name: {{course_name}}</span></label>
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
    </div>
</section>

<!-- Modal Create Dialog box -->
<div class="modal fade" id="modal-create" style="display: none;" class="box box-primary">
    <div class="modal-dialog">
        <form id="form_add" name="form_add" class="appnitro" role="form" method="post"
            action="/pages/courses/create.php" ng-app="coursecreate" ng-controller="createCtrl">
            <div class="modal-content">
                <div class="modal-header box-header with-border">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Add New Course</h4>
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
                        <input type="text" class="form-control" id="course_name" placeholder="Enter Course Name"
                            name="course_name" ng-model="course_name" ng-disabled="!partner_id" required>
                        <span style="color:red" ng-show="form_add.course_name.$dirty && form_add.course_name.$invalid">
                            <span ng-show="form_add.course_name.$error.required">Course Name is required.</span>
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
                  form_add.course_name.$dirty && form_add.course_name.$invalid" class="btn btn-primary"
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
var app = angular.module('myApp', ['datatables', 'ckeditor','datatables.buttons']);
app.controller('partnerCtrl', function($scope, $http, DTOptionsBuilder) {
    $scope.class = [];
    $scope.outlineeditor = {
        language: 'en',
        allowedContent: true,
        entities: false
    };

    $http.get("getcourses.php")
        .then(function(response) {
            $scope.courses = response.data;
        });
        $scope.partnerSelect = function(pid) {
            var url = "getcourses.php";
            if ($scope.class[pid] === "") {
                $scope.class[pid] = "bg-aqua";
                url = url.concat("?partner_id=", pid, "&action=add");
                $http.get(url)
                    .then(function(response) {
                        $scope.courses = response.data;
                    });
            } else {
                $scope.class[pid] = "";
                url = url.concat("?partner_id=", pid, "&action=remove");
                $http.get(url)
                    .then(function(response) {
                        $scope.courses = response.data;
                    });
            }

        };
    $scope.course_edit = function(index) {
        $scope.partner_id = $scope.courses[index].partner_id;
        $scope.course_id = $scope.courses[index].course_id;
        $scope.course_name = $scope.courses[index].course_name;
        $scope.course_outline = $scope.courses[index].course_outline;
        //outlineeditor.insertHtml($scope.course_outline);
    }
    $scope.course_delete = function(index) {
        $scope.course_id = $scope.courses[index].course_id;
        $scope.course_name = $scope.courses[index].course_name;
    };
    
    $scope.dtOptions = DTOptionsBuilder.newOptions()
                        .withButtons([
                                          {
                                              extend:    'copy',
                                              text:      '<i class="fa fa-files-o"></i> Copy',
                                              titleAttr: 'Copy'
                                          },
										  {
                                              extend:    'excel',
                                              text:      '<i class="fa fa-file-text-o"></i> Excel',
                                             titleAttr: 'Excel'
                                          },
                                          {
                                              extend:    'print',
                                              text:      '<i class="fa fa-print" aria-hidden="true"></i> Print',
                                              titleAttr: 'Print'
                                          }
                                      ]
                                    ) ;
       
   

});
var create=angular.module("coursecreate",[]);
create.controller('createCtrl',function($scope) {});
</script>