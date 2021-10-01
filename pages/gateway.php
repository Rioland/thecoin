<?php
$amt=$_GET['amt'];
require "../app/Database.php";
$address=Database::generateAddress();
echo $inBtc=Database::USDtoBTC($amt);


?>