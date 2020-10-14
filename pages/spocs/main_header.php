<?php
   include_once "./sheader.php";
   ?>
<div ng-app="myApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Spocs
            <small>Manage</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/pages/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Spocs</li>
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
                        <p>Spocs</p>
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
        <div class="row" ng-controller="spocCtrl" id="spocCtrl">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Spocs</h3>
                    <div cg-busy="myPromise"></div>
                </div>

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="spoc-table" class="table table-bordered table-striped dataTable" datatable="ng"
                        dt-options="dtOptions">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Spoc Firstname</th>
                                <th>Spoc Lastname</th>
                                <th>Spoc Mobile</th>
                                <th>Spoc Email</th>
                                <th>Spoc Alternate Mobile</th>
                                <th>Spoc Alternate Email</th>
                                <th>Institute Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr ng-repeat="spoc in spocs" repeat-done="initDataTable">
                                <td>{{$index+1}}</td>
                                <td>{{spoc.spoc_firstname}}</td>
                                <td>{{spoc.spoc_lastname}}</td>
                                <td>{{spoc.spoc_mobile}}</td>
                                <td>{{spoc.spoc_email}}</td>
                                <td>{{spoc.spoc_alternate_mobile}}</td>
                                <td>{{spoc.spoc_alternate_email}}</td>
                                <td>{{spoc.inst_name}}</td>
                                <td>
                                    <div class="btn-group-vertical">
                                        <button class="btn btn-default" ng-click="spoc_edit($index)" data-toggle="modal"
                                            data-target="#modal-edit">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button class="btn btn-default" ng-click="spoc_delete($index)"
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
                        action="/pages/Spocs/update.php">
                        <input type="hidden" ng-value="spoc_id" name="spoc_id" id="spoc_id">
                        <input type="hidden" ng-value="inst_id" name="inst_id" id="inst_id">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Edit Spoc Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Spoc Firstname">Spoc Firstname</label>
                                    <input type="text" class="form-control" id="spoc_firstname"
                                        placeholder="Enter Spoc Firstname" name="spoc_firstname"
                                        ng-model="spoc_firstname" required>

                                    <span style="color:red"
                                        ng-show="form_edit.spoc_firstname.$dirty && form_edit.spoc_firstname.$invalid">
                                        <span ng-show="form_edit.spoc_firstname.$error.required">Enter Spoc Name to
                                            Continue</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Spoc Lastname">Spoc Lastname</label>
                                    <input type="text" class="form-control" id="spoc_lastname"
                                        placeholder="Enter Spoc Lastname" name="spoc_lastname" ng-model="spoc_lastname"
                                        required>
                                    <span style="color:red"
                                        ng-show="form_edit.spoc_lastname.$dirty && form_edit.spoc_lastname.$invalid">
                                        <span ng-show="form_edit.spoc_lastname.$error.required">Spoc Lastname is
                                            required.</span>
                                    </span>
                                </div>

                                <div class="form-group">
                                    <label for="Spoc Email">Spoc Email</label>
                                    <input type="text" class="form-control" id="spoc_email"
                                        placeholder="Enter Spoc Email" name="spoc_email" ng-model="spoc_email" required>
                                    <span style="color:red"
                                        ng-show="form_edit.spoc_email.$dirty && form_edit.spoc_email.$invalid">
                                        <span ng-show="form_edit.spoc_email.$error.required">Spoc Email is
                                            required.</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Spoc Phone">Spoc Mobile</label>
                                    <input type="text" class="form-control" id="spoc_mobile"
                                        placeholder="Enter Spoc's Mobile Number" name="spoc_mobile"
                                        ng-model="spoc_mobile" required>
                                    <span style="color:red"
                                        ng-show="form_edit.spoc_mobile.$dirty && form_edit.spoc_mobile.$invalid">
                                        <span ng-show="form_edit.spoc_mobile.$error.required">Spoc Mobile is
                                            Required</span>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="Spoc Alternate Email">Spoc Alternate Email</label>
                                    <input type="text" class="form-control" id="spoc_alternate_email"
                                        placeholder="Enter Spoc's Alternate Email ID" name="spoc_alternate_email"
                                        ng-model="spoc_alternate_email">

                                </div>
                                <div class="form-group">
                                    <label for="Spoc Alternate Mobile">Spoc Alternate Mobile</label>
                                    <input type="text" class="form-control" id="spoc_alternate_mobile"
                                        placeholder="Enter Spoc's website" name="spoc_alternate_mobile"
                                        ng-model="spoc_alternate_mobile">

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal">Close</button>
                                <input type="submit" ng-disabled="form_edit.spoc_firstname.$dirty && form_edit.spoc_firstname.$invalid ||  
                  form_edit.spoc_lastname.$dirty && form_edit.spoc_lastname.$invalid || 
                  form_edit.spoc_email.$dirty && form_edit.spoc_email.$invalid ||
                  form_edit.spoc_mobile.$dirty && form_edit.spoc_mobile.$invalid" class="btn btn-primary"
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
                        action="/pages/Spocs/delete.php">
                        <input type="hidden" name="inst_id" id="inst_id" ng-value="inst_id">
                        <div class="modal-content">
                            <div class="modal-header box-header with-border">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Delete Spoc Details</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Partner Name">Please Confirm Deletion of Spoc<br /><span
                                            class="box-warning">Spoc Name: {{spoc_firstname}}
                                            {{spoc_lastname}}</span></label>
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
                action="/pages/Spocs/create.php" ng-controller="createCtrl">
                <div class="modal-content">
                    <div class="modal-header box-header with-border">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Add New Spoc</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="Spoc Firstname">Select Institute</label>
                            <select type="text" class="form-control" id="inst_id" placeholder="Select Institute"
                                name="inst_id" ng-model="inst_id" required>
                                <options value="">==Select Institute==</options>
                                <option ng-repeat="inst in insts" value="{{inst.inst_id}}">{{inst.inst_name}}</option>
                            </select>

                            <span style="color:red"
                                ng-show="form_edit.spoc_firstname.$dirty && form_edit.spoc_firstname.$invalid">
                                <span ng-show="form_edit.spoc_firstname.$error.required">Select Institute to
                                    Continue</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Spoc Firstname">Spoc Firstname</label>
                            <input type="text" class="form-control" id="spoc_firstname"
                                placeholder="Enter Spoc Firstname" name="spoc_firstname" ng-model="spoc_firstname"
                                required>

                            <span style="color:red"
                                ng-show="form_edit.spoc_firstname.$dirty && form_edit.spoc_firstname.$invalid">
                                <span ng-show="form_edit.spoc_firstname.$error.required">Enter Spoc Name to
                                    Continue</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Spoc Lastname">Spoc Lastname</label>
                            <input type="text" class="form-control" id="spoc_lastname" placeholder="Enter Spoc Lastname"
                                name="spoc_lastname" ng-model="spoc_lastname" required>
                            <span style="color:red"
                                ng-show="form_edit.spoc_lastname.$dirty && form_edit.spoc_lastname.$invalid">
                                <span ng-show="form_edit.spoc_lastname.$error.required">Spoc Lastname is
                                    required.</span>
                            </span>
                        </div>

                        <div class="form-group">
                            <label for="Spoc Email">Spoc Email</label>
                            <input type="text" class="form-control" id="spoc_email" placeholder="Enter Spoc Email"
                                name="spoc_email" ng-model="spoc_email" required>
                            <span style="color:red"
                                ng-show="form_edit.spoc_email.$dirty && form_edit.spoc_email.$invalid">
                                <span ng-show="form_edit.spoc_email.$error.required">Spoc Email is
                                    required.</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Spoc Email">Spoc User Password</label>
                            <input type="password" class="form-control" id="spoc_password" placeholder="Enter Spoc Password"
                                name="spoc_password" ng-model="spoc_password" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" ng-model="autopass" ng-change="autogenpass()">Auto Generate Password</input>
                                </label>
                            </div>
                            <span style="color:red"
                                ng-show="form_edit.spoc_email.$dirty && form_edit.spoc_email.$invalid">
                                <span ng-show="form_edit.spoc_email.$error.required">Spoc Password is
                                    required.</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Spoc Phone">Spoc Mobile</label>
                            <input type="text" class="form-control" id="spoc_mobile"
                                placeholder="Enter Spoc's Mobile Number" name="spoc_mobile" ng-model="spoc_mobile"
                                required>
                            <span style="color:red"
                                ng-show="form_edit.spoc_mobile.$dirty && form_edit.spoc_mobile.$invalid">
                                <span ng-show="form_edit.spoc_mobile.$error.required">Spoc Mobile is
                                    Required</span>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="Spoc Alternate Email">Spoc Alternate Email</label>
                            <input type="text" class="form-control" id="spoc_alternate_email"
                                placeholder="Enter Spoc's Alternate Email ID" name="spoc_alternate_email"
                                ng-model="spoc_alternate_email">

                        </div>
                        <div class="form-group">
                            <label for="Spoc Alternate Mobile">Spoc Alternate Mobile</label>
                            <input type="text" class="form-control" id="spoc_alternate_mobile"
                                placeholder="Enter Spoc's website" name="spoc_alternate_mobile"
                                ng-model="spoc_alternate_mobile">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input type="submit" ng-disabled="form_add.spoc_firstname.$dirty && form_add.spoc_firstname.$invalid ||  
                  form_add.spoc_lastname.$dirty && form_add.spoc_lastname.$invalid || 
                  form_add.spoc_email.$dirty && form_add.spoc_email.$invalid ||
                  form_add.spoc_mobile.$dirty && form_add.spoc_mobile.$invalid" class="btn btn-primary"
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
app.controller('spocCtrl', function($scope, $http, $resource, DTOptionsBuilder) {
    //$scope.spocs = [];
    $http.get("/pages/institutes/getinsts.php")
        .then(function(response) {
            $scope.insts = response.data;
        });

    $scope.myPromise = $resource('getspocs.php').query().$promise
        .then(function(response) {
            $scope.spocs = response;
        });
    $scope.spoc_edit = function(index) {
        $scope.inst_id = $scope.spocs[index].inst_id;
        $scope.spoc_firstname = $scope.spocs[index].spoc_firstname;
        $scope.spoc_lastname = $scope.spocs[index].spoc_lastname;
        $scope.spoc_alternate_email = $scope.spocs[index].spoc_alternate_email;
        $scope.spoc_mobile = $scope.spocs[index].spoc_mobile;
        $scope.spoc_alternate_mobile = $scope.spocs[index].spoc_alternate_mobile;
        $scope.spoc_id = $scope.spocs[index].spoc_id;
        //outlineeditor.insertHtml($scope.course_outline);
    }
    $scope.spoc_delete = function(index) {
        $scope.spoc_id = $scope.spocs[index].spoc_id;
        $scope.spoc_firstname = $scope.spocs[index].spoc_firstname;
        $scope.spoc_lastname = $scope.spocs[index].spoc_lastname;
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
    $http.get("/pages/institutes/getinsts.php")
        .then(function(response) {
            $scope.insts = response.data;
        });
$scope.autogenpass = function(){
    if($scope.autopass)
    {
        $scope.spoc_password = "";
        $scope.upperCaseArray = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
      $scope.lowerCaseArray = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
      $scope.numbersArray = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
      for (var i=0; i<12; i++)
      {
        $scope.upperLowerArray = $scope.upperCaseArray.concat($scope.lowerCaseArray); 
          $scope.upperLowerNumbersArray = $scope.upperLowerArray.concat($scope.numbersArray); 
          $scope.temp = Math.floor(Math.random()*$scope.upperLowerNumbersArray.length);
          $scope.spoc_password += $scope.upperLowerNumbersArray[$scope.temp]; 
      }
    }
    else
    {
        $scope.spoc_password = "";
    }
}


});
</script>