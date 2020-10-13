<?php
include_once "../layout/functions.php";
include_once "../../lib/spoc.php";
$spoc=new Spoc;
    
    $result=$spoc->getSpocs();
    print_r(json_encode($result->spocs));
?>