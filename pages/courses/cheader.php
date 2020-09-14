<?php
  if(isset($_SESSION['status']))
  {
    if($_SESSION['status']=="1")
    {
        echo "<div class='alert alert-success alert-dismissible' id='msgalert'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
        <h4><i class='icon fa fa-check'></i> " . $_SESSION['msg'] . "</h4>
      </div>";
    }
    else
    {
      echo "<div class='alert alert-danger alert-dismissible' id='msgalert'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
      <h4><i class='icon fa fa-check'></i> " . $_SESSION['msg'] . "</h4>
    </div>";
    }
    echo "<script>$('#msgalert').slideUp(10000);</script>";
    unset($_SESSION['status']);
    unset($_SESSION['msg']);
  }
  include_once "../../lib/course.php";
  $pcourse=new Course();
  $dashboard=$pcourse->getDashboard();
  $partners=$dashboard->Partners;
  //print_r($dashboard);
  
?>