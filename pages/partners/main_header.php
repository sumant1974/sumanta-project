<?php
  include_once "../../lib/partner.php";
  $partner=new Partner();
  $dashboard=$partner->getDashboard();
  $partners=$dashboard->Partners;
  //print_r($dashboard);
  
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
            <a href="/pages/partners" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
    <!-- /.content -->