<?php
include_once "../layout/header.php";
include_once "../../lib/Institute.php";
$institute=new Institute;
$institute->inst_id=$_POST['inst_id'];
$result=$institute->delete();
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/institutes/');
?>