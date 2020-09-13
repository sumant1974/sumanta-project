<?php
include_once "../layout/functions.php";
include_once "../../lib/course.php";
$course=new Course;
    if(isset($_GET['partner_id']))
{
    if(isset($_GET['action']) && $_GET['action']==='add')
    {
        array_push($_SESSION["pselected"],$_GET['partner_id']);
    }
    if(isset($_GET['action']) && $_GET['action']==='remove')
    {
        $_SESSION["pselected"]=array_diff($_SESSION["pselected"],array($_GET['partner_id']));
    }
}
$length=count($_SESSION["pselected"]);
//echo $length;
//print_r($_SESSION["pselected"]);
if($length==0)
{
    $result=$course->getAllCourses();
    print_r(json_encode($result->PartnerCourses));
}
else
{
    $allpcourses=array();
    foreach($_SESSION["pselected"] as $p)
    {
        $course->partner_id=$p;
        $result=$course->getPCourses();
        if($result->PartnerCourses!=null)
            $allpcourses=array_merge($allpcourses,$result->PartnerCourses);
    }
    $allpcoursesjson=json_encode($allpcourses);
    print_r($allpcoursesjson);
   // str_replace(array('[', ']'), '', htmlspecialchars(json_encode($allpcoursesjson), ENT_NOQUOTES));
}
?>