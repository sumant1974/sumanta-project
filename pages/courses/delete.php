<?php
include_once "../layout/header.php";
include_once "../../lib/partner.php";
$partner=new Partner;
$partner->partner_id=$_POST['partner_id'];
$result=$partner->delete();
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/partners/index.php');
?>