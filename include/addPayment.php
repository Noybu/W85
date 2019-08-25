<?php

    require_once 'DAL.php';
    require_once 'BLL.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "mailer/PHPMailer.php";
    require "mailer/Exception.php";


$postdata = '';
$post_json = [];
foreach($_POST as $key => $value) {
    $postdata .= $key . '=' . urlencode($value) . '&';
}



$postdata .= 'cmd=_notify-validate';

$ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
curl_setopt ($ch, CURLOPT_HEADER, 0);
curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);

$response = curl_exec($ch);

if($response == 'VERIFIED') {
    file_put_contents("log.txt", "----------------NEW PAYMENT----------------"  ."\r\n\r\n", FILE_APPEND);
    file_put_contents('log.txt', $response. "\n", FILE_APPEND);

    foreach($_POST as $key => $value)
         file_put_contents('log.txt', "$key => $value \r\n", FILE_APPEND);
}




curl_close($ch);


if($response == 'VERIFIED' && $_POST['payment_status'] == 'Completed')
{

    $price = $_POST['mc_gross'];
    $projectid =  $_POST['option_selection1'];
    $userid =  $_POST['option_selection2'];
    $name = get_user_name($userid);
    $email = get_user_email($userid);
    $currency= $_POST['mc_currency'];

    file_put_contents("log.txt", "userid:" . $userid . " project:" . $projectid . " price:" . $price  ."\r\n\r\n", FILE_APPEND);
    updateCurrentPrice($projectid,$price);
    checkIfFundDone($projectid);
    updateNumOfFundPeople($projectid);

    $mail = new PHPMailer();
    $mail->setFrom("urbanfund85@gmail.com","URBAN FUND");
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    
    $mail->Subject = "תרומך לפרויקט התקבלה בהצלחה";
    $mail->Body = "
    <div style='direction:rtl;'><h2>תודה " . $name ."</h2>
    <p> תרומתך על סך: " . $price . "  ₪ התקבלה בהצלחה!
    <BR>
    <BR>
    <img src='https://media.giphy.com/media/xTiTnqUxyWbsAXq7Ju/giphy.gif'>
    <BR>
    תודה,
    <BR>
    URBAN FUND
    </div>";
    $mail->send();
   
    file_put_contents('log.txt', '*****Message has been sent*****' . '\r\n', FILE_APPEND);

 

}

 ?>
