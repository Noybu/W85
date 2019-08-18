<?php

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
curl_setopt($ch, CURLOPT_POSTFIELDS,"cmd=_notify-validate&".http_build_query($_POST));
$response = curl_exec($ch);
curl_close($ch);

//file_put_contents("log.txt",$_SERVER['REQUEST_METHOD']);

if($response=="VERIFIED")
{
// $handel = fopen("log.txt","w");

//     foreach($_POST as $key => $value)
//         fwrite($handel,"$key => $value \r\n");

//         fclose($handel);

  $price = $_POST['mc_gross'];
  $projectid =  $_POST['projectid'];
  $userid =  $_POST['userid'];


    file_put_contents("log.txt", "userid:" . $userid . " project:" . $projectid . " price:" . $price );

    updateCurrentPrice($projectid,$price);

}




// //require_once 'DAL.php';
// require_once 'BLL.php';


// //$price = $_POST['price'];
// $projectid =  $_POST['projectid'];


// updateCurrentPrice($projectid,$price);
// header("Location: ../projectFund.php?projectid=$projectid");
 ?>
