<?php
include_once "../layout/header.php";
include_once "../../lib/partner.php";
$partner=new Partner;
$partner->partner_id=$_POST['partner_id'];
$partner->partner_name=$_POST['partner_name'];
$partner->partner_programme=$_POST['partner_programme'];
$partner->partner_website=$_POST['partner_website'];
$partner->partner_programme_website=$_POST['programme_website'];
$result=$partner->update();
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/partners/index.php');
?>