<?php
//require_once 'DAL.php';
require_once 'BLL.php';


//$price = $_POST['price'];
$projectid =  $_POST['projectid'];


updateCurrentPrice($projectid,$price);
header("Location: ../projectFund.php?projectid=$projectid");
 ?>
