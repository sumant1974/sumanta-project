<?php
include_once "../layout/functions.php";
include_once "../../lib/institute.php";
$inst=new Institute;
    
    $result=$inst->getaDashboard();
    print_r(json_encode($result->Institutes));
?>