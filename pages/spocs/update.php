<?php
include_once "../layout/header.php";
include_once "../../lib/Institute.php";
$institute=new Institute;
$institute->inst_id=$_POST['inst_id'];
$institute->inst_name=$_POST['inst_name'];
$institute->inst_shortname=$_POST['inst_shortname'];
$institute->inst_state=$_POST['inst_state'];
$institute->inst_address=$_POST['inst_address'];
$institute->inst_phone=$_POST['inst_phone'];
$institute->inst_email=$_POST['inst_email'];
$institute->principal_name=$_POST['pri_name'];
$institute->inst_website=$_POST['inst_website'];
$result=$institute->update();
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/institutes/');
?>