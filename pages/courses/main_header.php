<?php
   include_once "./cheader.php";
   $_SESSION["pselected"]=array();
   ?>
<!-- Content Header (Page header) -->
<section class="content-header">
   <h1>
      Partners
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
            <a href="/pages/partners/" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
            <div align="center"><a class="btn btn-app bg-olive" data-toggle="modal" data-target="#modal-create">
               <i class="fa fa-plus"></i> Add
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
   <div class="row" ng-app="myApp" data-ng-controller="partnerCtrl">
      <div class="col-md-3 col-sm-6 col-xs-12">
      
         <?php foreach($partners as $p) {?>
         
            <div ng-click="partnerSelect(<?php echo $p->partner_id; ?>)" class="info-box" id="<?php echo $p->partner_id; ?>" ng-init="class[<?php echo $p->partner_id; ?>]=''" ng-class="class[<?php echo $p->partner_id; ?>]">
                <span class="info-box-icon bg-aqua"><img class="img-circle" src="http://logo.clearbit.com/<?php echo $p->partner_website; ?>" width="64px" alt="Logo"></span>
               <div class="info-box-content">
                  <span class="badge bg-aqua pull-right"><?php echo $p->coursecount ?></span>
                  <span class="info-box-text"><?php echo $p->partner_name ?></span>
                  <span class="info-box-number"><a href="http://<?php echo $p->partner_website ?>"><?php echo $p->partner_website ?></a></span>
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
      <table id="course-table" class="table table-bordered table-striped dataTable" datatable="ng">
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
        <td><div class="btn-group-vertical"><button class="btn btn-default"><i class="fa fa-edit"></i></button><button class="btn btn-default"><i class="fa fa-trash"></i></button></div></td>
    </tr>
    </tbody>
    
</table>
</div>
</div>  
</div>
   </div>
</section>

<!-- script -->
<script>
    var app = angular.module('myApp', ['datatables']);
app.controller('partnerCtrl', function($scope, $http) {
    $scope.class = [];


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
    $scope.deleteConfirm = function(pid, pn, pp) {
        $scope.partner_id = pid;
        $scope.partner_name = pn;
        $scope.partner_programme = pp;
    };
    $scope.dataTableOpt = {
        //custom datatable options 
        // or load data through ajax call also
        "aLengthMenu": [
            [10, 50, 100, -1],
            [10, 50, 100, 'All']
        ],
    };
    $scope.initDataTable=function() {
       $('#course-table').dataTable();
    };
    
});
</script>