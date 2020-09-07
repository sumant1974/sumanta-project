<?php
include_once "./pheader.php";
?>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Partners
        <small>Manage</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/pages/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Partners</li>
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
            <div align="center"><a class="btn btn-app bg-olive" data-toggle="modal" data-target="#modal-create">
                <i class="fa fa-plus"></i> Add
              </a></div>
            
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
            <a href="/pages/partners/courses.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
      <div class="row">
        <?php foreach($partners as $p) {?>

        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box widget-user-2 box-warning">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-white with-border">
              <div class="widget-user-image">
                <img class="img-circle" src="http://logo.clearbit.com/<?php echo $p->partner_website; ?>" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username"><?php echo $p->partner_name; ?></h3>
              <h5 class="widget-user-desc"><a href="http://<?php echo $p->partner_website; ?>" target="_blank"><?php echo $p->partner_website; ?></a></h5>
            </div>
            <div class="box-footer">
              <ul class="nav nav-stacked">
                <li style="padding:5px">Programme: <span class="pull-right"><?php echo $p->partner_programme; ?></span></li>
                <li style="padding:5px">Programme Website: <span class="pull-right"><a href="http://<?php echo $p->partner_programme_website; ?>"><?php echo $p->partner_programme_website; ?></a></span></li>
                <li style="padding:5px"><div class="user-footer">
                  <div class="pull-left">
                    <a class="btn btn-app">
                     <i class="fa fa-edit"></i>
                     Edit
                    </a>
                    <a class="btn btn-app">
                     <i class="glyphicon glyphicon-remove-circle"></i>
                     Delete
                    </a>
                  </div>
                  <div class="pull-right">
                      <a class="btn btn-app">
                        <i class="fa fa-book"></i>
                        Courses
                      </a>
                    </div>
                </div></li>
              </ul>
              
            </div>
            
          </div>
          <!-- /.widget-user -->
        </div>
        <?php } ?>
      </div>

    </section>


<!-- Modal Create/Edit Dialog box -->

<div class="modal fade" id="modal-create" style="display: none;" class="box box-primary">
          <div class="modal-dialog">
          <form id="form_add" name="form_add" class="appnitro" role="form" method="post" action="/pages/partners/create.php" ng-app="">
            <div class="modal-content">
              <div class="modal-header box-header with-border">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Add New Partner</h4>
              </div>
              <div class="modal-body">
              <div class="form-group">
                  <label for="Partner Name">Partner Name</label>
                  <input type="text" class="form-control" id="partner_name" placeholder="Enter Partner Name" name="partner_name" ng-model="partner_name" required>
                  <span style="color:red" ng-show="form_add.partner_name.$dirty && form_add.partner_name.$invalid">
                    <span ng-show="form_add.partner_name.$error.required">Partner Name is required.</span>
                  </span>
                </div>  
                <div class="form-group">
                  <label for="Partner Website">Partner Website</label>
                  <input type="text" class="form-control" id="partner_website" placeholder="Enter Partner Website" name="partner_website" ng-pattern="/^(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/" ng-model="partner_website" required>
                  <span style="color:red" ng-show="form_add.partner_website.$dirty && form_add.partner_website.$invalid">
                      <span ng-show="form_add.partner_website.$error.required">Partner Website is required.</span>
                      <span ng-show="form_add.partner_website.$error.pattern">Invalid website address. (Do not use http[s]://), Just specify domain name</span></span>
                </div>
                <div class="form-group">
                  <label for="Partner Programme">Partner Programme</label>
                  <input type="text" class="form-control" id="partner_programme" placeholder="Enter Partner Programme" name="partner_programme" ng-model="partner_programme" required>
                  <span style="color:red" ng-show="form_add.partner_programme.$dirty && form_add.partner_programme.$invalid">
                    <span ng-show="form_add.partner_programme.$error.required">Partner Programme is Required</span>
                  </span>
                </div>  
                <div class="form-group">
                  <label for="Partner Website">Partner Programme Website</label>
                  <input type="text" class="form-control" id="programme_website" name="programme_website" placeholder="Enter Partner Programme Website">
                </div>                  
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <input type="submit" ng-disabled="form_add.partner_name.$dirty && form_add.partner_name.$invalid ||  
form_add.partner_website.$dirty && form_add.partner_website.$invalid || form_add.partner_programme.$dirty && form_add.partner_programme.$invalid" class="btn btn-primary" value="Save Changes"></input>
              </div>
            </div>
            <!-- /.modal-content -->
        </form>
          </div>
          <!-- /.modal-dialog -->
        </div>



    <!-- /.content -->