<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($ch, CURLOPT_POSTFIELDS,"cmd=_notify-validate&".http_build_query($_POST));
$response = curl_exec($ch);
curl_close($ch);

file_put_contents("log.txt",$_SERVER['REQUEST_METHOD']);

if($response=="VERIFIED")
{
    $price = $_POST['mc_gross'];

    $user_id =  $GET['userid'];
    $projectid =  $GET['projectid'];
    updateCurrentPrice($projectid,$price);

}




// //require_once 'DAL.php';
// require_once 'BLL.php';


// //$price = $_POST['price'];
// $projectid =  $_POST['projectid'];


// updateCurrentPrice($projectid,$price);
// header("Location: ../projectFund.php?projectid=$projectid");
 ?>
