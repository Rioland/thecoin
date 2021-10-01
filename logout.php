<?php
session_start();
$sestion_state=session_destroy();
if($sestion_state){
// echo $sestion_state."true";
header("location:signin");

}else{
// echo $sestion_state."false";
header("location:dashboard");

}



?>