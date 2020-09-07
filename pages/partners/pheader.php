<?php
  if(isset($_SESSION['status']))
  {
    if($_SESSION['status']=="1")
    {
        echo "<div class='alert alert-success alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
        <h4><i class='icon fa fa-check'></i> " . $_SESSION['msg'] . "</h4>
      </div>";
    }
    else
    {
      echo "<div class='alert alert-danger alert-dismissible'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
      <h4><i class='icon fa fa-check'></i> " . $_SESSION['msg'] . "</h4>
    </div>";
    }
  }
  include_once "../../lib/partner.php";
  $partner=new Partner();
  $dashboard=$partner->getDashboard();
  $partners=$dashboard->Partners;
  //print_r($dashboard);
  
?>