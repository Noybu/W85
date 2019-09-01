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
    file_put_contents("log.txt", "\r\n" . "----------------NEW PAYMENT----------------"  ."\r\n\r\n", FILE_APPEND);
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
    updateNumOfFundPeople($projectid);
    $ifProjectFundDone=checkIfFundDone($projectid);

    
    //אם מימון הפרויקט הסתיים
    if ($ifProjectFundDone == '1')
    {
        
        //עדכון סטטוס הפרויקט ל"בביצוע" ושליחת מייל לנותן השירות שמבצע
        updateProjectStatus($projectId, '3');

        $winner=getWinnerOfProject($projectId);
        $email1=get_user_email($winner[0]->serviceid);
        $name1=get_user_name($winner[0]->serviceid);
        file_put_contents("log.txt", "\r\n"."service id:" . $winner[0]->serviceid ."email1" . $email1 ."name" .$name1 , FILE_APPEND);
        $mail1 = new PHPMailer();
        $mail1->setFrom("urbanfund85@gmail.com","URBAN FUND");
        $mail1->addAddress($email1, $name1);
        $mail1->isHTML(true);
        
        $mail1->Subject = "מימון הפרויקט הסתיים בהצלחה";
        $mail1->Body = "
        <div style='display: flex;justify-content: center;text-align: center;'>
            <div style='direction:rtl;'>
                <h2>שלום " . $name1 ."</h2>
                <p> הפרויקט שלך יוצא לדרך! </p>
                <p> פרטי הפרויקט :  </p>
                <p> תאור" . $winner[0]->description . " </p>
                <p> מיקום" . $winner[0]->loccity . $winner[0]->locstreet . $winner[0]->locnum . " </p>
                <p> תאריך לביצוע" . $winner[0]->offerdate  . " </p>
                <p> כסף שנאסף" . $winner[0]->projectcurrentprice  . " </p>
                <BR>
            
            צא לדרך!! בהצלחה! 
                <BR>
                URBAN FUND
            </div>
        </div>";
        $mail1->send();
    }
    
    //בכל מצב, שליחת מייל תודה לתורם
    $mail = new PHPMailer();
    $mail->setFrom("urbanfund85@gmail.com","URBAN FUND");
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    
    $mail->Subject = "תרומך לפרויקט התקבלה בהצלחה";
    $mail->Body = "
    <div style='display: flex;justify-content: center;text-align: center;'>
        <div style='direction:rtl;'>
            <h2>תודה " . $name ."</h2>
            <p> תרומתך על סך: " . $price . "  ₪ התקבלה בהצלחה! </p>
            <BR>
            <BR>
            <img style='width:50%;' src='https://media.giphy.com/media/xTiTnqUxyWbsAXq7Ju/giphy.gif'>
            <BR>
            תודה,
            <BR>
            URBAN FUND
        </div>
    </div>";
    $mail->send();
   
    file_put_contents('log.txt', '*****Message has been sent*****' . "\r\n", FILE_APPEND);

}

 ?>
