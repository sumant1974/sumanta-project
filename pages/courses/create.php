<?php
include_once "../layout/header.php";
include_once "../../lib/course.php";
$course=new Course;
$course->course_name=$_POST['course_name'];
$course->course_outline=$_POST['course_outline'];
$course->partner_id=$_POST['partner_id'];
$result=$course->create();
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
print_r($result);
echo $_SESSION['status'];
echo $_SESSION['msg'];
header('Location: /pages/courses/index.php');
?>