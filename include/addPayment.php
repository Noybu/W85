<?php
    require_once 'DAL.php';
    require_once 'BLL.php';
    use PHPMailer\PHPMailer\PHPMailer;
    require "mailer/PHPMailer.php";
    require "mailer/Exception.php";


$postdata = '';
$post_json = [];
foreach($_POST as $key => $value) {
    $postdata .= $key . '=' . urlencode($value) . '&';
}

/* foreach($_POST as $keyPost => $valuePost)
{ 
    $postdata .=$keyPost." => ". urlencode($valuePost) . '&';
} */

$postdata .= 'cmd=_notify-validate';


//$ch = curl_init();

// $clientId = "AdFIOOghKH7yHwoLS6g6JeZAczNBeNkUbt_hyMcLL0g6w5dfIUscHFhv-0IhxE6Y6IYaFEOUDi9voT_C";
// $secret = "EHkHKQVIZtdF2B2KbjwInXFR67pdq5jlRNiRnQLUhrF1mLmorokJYQU4qdyfwLh7BwRh1Rq3iYfuiTfk";

$ch = curl_init('https://www.sandbox.paypal.com/cgi-bin/webscr');
//curl_setopt($ch, CURLOPT_URL,'https://api.sandbox.paypal.com/v1/oauth2/token');
curl_setopt ($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);
//curl_setopt($ch, CURLOPT_USERPWD, $clientId.":".$secret);
//curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
//curl_setopt($ch, CURLOPT_POSTFIELDS,"cmd=_notify-validate&".http_build_query($_POST));
$response = curl_exec($ch);

if($response == 'VERIFIED') {
    file_put_contents('log.txt', $response. "\n", FILE_APPEND);
}




curl_close($ch);

// if(empty($response))die("Error: No response.");
// else
// {
//     $json = json_decode($response);
   
//     file_put_contents("log.txt",$json->access_token);
// }




// if($response=="VERIFIED")
// {
// $handel = fopen("log.txt","w");

//     foreach($_POST as $key => $value)
//         fwrite($handel,"$key => $value \r\n");

//         fclose($handel);

//   $price = $_POST['mc_gross'];
//   $projectid =  $_POST['projectid'];
//   $userid =  $_POST['userid'];
//   $name =  $_POST['first_name'] . " " . $_POST['last_name'];
//   $email = get_user_email($userid);


//     file_put_contents("log.txt", "userid:" . $userid . " project:" . $projectid . " price:" . $price );

//     $mail = new PHPMailer();
//     $mail ->getFrom("urbanfund85@gmail.com","URBAN FUND");
//     $mail->addAddress($email, $name);
//     $mail->isHTML(true);
//     $mail->Subject = "תודה, תרומך לפרויקט התקבלה בהצלחה";
//     $mail->Body = "
//     <h1>תודה " . $name ."</h1>
//     <BR>
//     <p> תרומתך על סך: " . $price . " התקבלה בהצלחה
//     <BR>
//     תודה,
//     <BR>
//     URBAN FUND
//     ";
//     $mail->send();
    



    


//     updateCurrentPrice($projectid,$price);

// }







// //$price = $_POST['price'];
// $projectid =  $_POST['projectid'];


// updateCurrentPrice($projectid,$price);
// header("Location: ../projectFund.php?projectid=$projectid");
 ?>
