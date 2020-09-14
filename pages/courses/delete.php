<?php
include_once "../layout/header.php";
include_once "../../lib/course.php";
$course=new Course;
$course->course_id=$_POST['course_id'];
$result=$course->delete();
$_SESSION['status']=$result->status;
$_SESSION['msg']=$result->message;
//print_r($result);
//echo $_SESSION['status'];
//echo $_SESSION['msg'];
header('Location: /pages/courses/index.php');
?>