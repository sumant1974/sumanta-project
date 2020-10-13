<?php
include_once "../layout/header.php";
include_once "../../lib/spoc.php";
$spoc=new Spoc;
$spoc->spoc_firstname=$_POST['spoc_firstname'];
$spoc->spoc_lastname=$_POST['spoc_lastname'];
$spoc->spoc_mobile=$_POST['spoc_mobile'];
$spoc->spoc_email=$_POST['spoc_email'];
$spoc->spoc_alternate_mobile=$_POST['spoc_alternate_mobile'];
$spoc->spoc_alternate_email=$_POST['spoc_alternate_email'];
$spoc->inst_id=$_POST['inst_id'];
$result=$spoc->create();
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
print_r($result);
echo $_SESSION['status'];
echo $_SESSION['msg'];
header('Location: /pages/spocs/');
?>