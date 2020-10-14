<?php
include_once "../layout/header.php";
include_once "../../lib/spoc.php";
include_once "../../lib/user.php";
//Add Spoc
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
//Add Spoc User
$user=new User;
$user->user_id=$_POST['spoc_email'];
$user->firstname=$_POST['spoc_firstname'];
$user->lastname=$_POST['spoc_lastname'];
$user->user_recovery_mobile=$_POST['spoc_mobile'];
$user->alternate_email=$_POST['spoc_alternate_email'];
$user->inst_id=$_POST['inst_id'];
$user->user_pass=$_POST['spoc_password'];
$user->role_id=2; //spoc role
$result=$user->create();
$_SESSION['msg']=$_SESSION['msg'] . " and " . $result->message;
header('Location: /pages/spocs/');
?>