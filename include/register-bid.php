<?php
//require_once 'DAL.php';
require_once 'BLL.php';


$offerprice = $_POST['offerprice'];
$offerdate = $_POST['offerdate'];
$projectid =  $_POST['projectid'];
$servicemanid = $_POST['service'];

addNewBidOffer($offerprice,$offerdate,$projectid,$servicemanid);
header("Location: ../projectFund?projectid=$projectid");
 ?>
