<?php

    require_once 'DAL.php';
    require_once 'BLL.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require "mailer/PHPMailer.php";
    require "mailer/Exception.php";


    //יצירת מערך עם כל המשתנים שהתקבלו דרך כתובת ה URL 
{
    $postdata = '';
    $post_json = [];
    foreach($_POST as $key => $value) {
        $postdata .= $key . '=' . urlencode($value) . '&';
    }


$postdata .= 'cmd=_notify-validate';
}

// שליחת התשלום ל API של פייפאל
{
    $ch = curl_init('https://www.paypal.com/cgi-bin/webscr');
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_setopt ($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt ($ch, CURLOPT_POSTFIELDS, $postdata);

    // הפעלה וקבלת תשובה בחזרה 
    $response = curl_exec($ch);
}
// מוודאים שקיבלנו שהתשלום מאומת 
if($response == 'VERIFIED') {
    file_put_contents("log.txt", "\r\n" . "----------------NEW PAYMENT----------------"  ."\r\n\r\n", FILE_APPEND); // הוספת לוג תשלומים בקובץ בשרת
    file_put_contents('log.txt', $response. "\n", FILE_APPEND);

    foreach($_POST as $key => $value)
         file_put_contents('log.txt', "$key => $value \r\n", FILE_APPEND);
}


curl_close($ch);

// קבלת התשובה ונתוני התשלום ועדכון המסד נתונים
if($response == 'VERIFIED' && $_POST['payment_status'] == 'Completed')
{
    //הכנת משתנים לשימוש
{
    $price = $_POST['mc_gross'];
    $projectid =  $_POST['option_selection1'];
    $userid =  $_POST['option_selection2'];
    $name = get_user_name($userid);
    $email = get_user_email($userid);
    $currency= $_POST['mc_currency'];
}
    // כתיבה ללוג בשרת
    file_put_contents("log.txt", "userid:" . $userid . " project:" . $projectid . " price:" . $price  ."\r\n\r\n", FILE_APPEND);

    updateCurrentPrice($projectid,$price); // עדכון ההפרויקט התשלום החדש
    updateNumOfFundPeople($projectid); // עדכון מספר האנשים שתרמו לפרויקט
    $ifProjectFundDone=checkIfFundDone($projectid); // בדיקה האם התשלום הסתיים עבור הפרויקט

    
    //אם מימון הפרויקט הסתיים
    if ($ifProjectFundDone == '1')
    {
        
        //עדכון סטטוס הפרויקט ל"בביצוע" ושליחת מייל לנותן השירות שמבצע
        updateProjectStatus($projectid, 3);
        // המייל לנותן השירות
        {
            $winner=getWinnerOfProject($projectid); // מקבל את פרטי נותן השירות של הפרויקט
            $email1=get_user_email($winner[0]->serviceid);
            $name1=get_user_name($winner[0]->serviceid);
            file_put_contents("log.txt", "\r\n"."service id:" . $winner[0]->serviceid ."email1" . $email1 ."name" .$name1 , FILE_APPEND);
            $mail1 = new PHPMailer();
            $mail1->setFrom("urbanfund85@gmail.com","URBAN FUND");
            $mail1->addAddress($email1, $name1);
            $mail1->isHTML(true);
            
            $mail1->Subject = "מימון הפרויקט הסתיים בהצלחה";
            $mail1->Body = "
            <div style='display: flex;justify-content: center;text-align: right;'>
                <div style='direction:rtl;'>
                    <h2>שלום " . $name1 ."</h2>
                    <p> הפרויקט שלך יוצא לדרך! </p>
                    <p style='font-weight:bold;'> פרטי הפרויקט :  </p>
                    <p> תאור: " . $winner[0]->description . " </p>
                    <p> מיקום: " . $winner[0]->loccity . "," . $winner[0]->locstreet . "," . $winner[0]->locnum . " </p>
                    <p> תאריך לביצוע: " . $winner[0]->offerdate  . " </p>
                    <p> כסף שנאסף: " . $winner[0]->projectcurrentprice  . " ₪ </p>
                    <p> קישור לפרויקטים שמחכים לביצוע: <a href='http://noybu.mtacloud.co.il/W85/myBids.php'>מעבר לעמוד</a></p>
                    <BR>
                
                צא לדרך!! בהצלחה! 
                    <BR>
                    <b>URBAN FUND
                </div>
            </div>";
            $mail1->send();
        }
    }
    
    //בכל מצב, שליחת מייל תודה לתורם
    {
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
    }

    // עדכון לוג על שליחת מייל לתורם
    file_put_contents('log.txt', '*****Message has been sent*****' . "\r\n", FILE_APPEND);

}

 ?>
