<?php

use App\Lib\PHPMailer\PHPMailer;



function send_mail($subject, $message, $to_user)
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->SMTPDebug = 0;
    $mail->Host = MAIL_HOST;
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = MAIL_USERNAME;
    $mail->Password = MAIL_PASSWORD;
    $mail->setFrom(MAIL_USERNAME, APP_NAME);
    $mail->addReplyTo(MAIL_USERNAME, APP_NAME);
    $mail->addAddress($to_user);
    $mail->IsHTML('true');
    $mail->Subject = $subject;
    $mail->Body = $message;

    if ($mail->send()) {
        return true;
    } else {
        return false;
    }
}




// function confirm_mail($email,$name, $message, $fileName)
// {
//     $mail = new PHPMailer\PHPMailer\PHPMailer();
//     $mail->isSMTP();
//     $mail->CharSet = "UTF-8";
//   //  $mail->SMTPDebug = 0;
//     $mail->Host = MAIL_HOST;
//     $mail->Port = 587;
//     $mail->SMTPAuth = true;
//     $mail->Username = 'sender@mejsp.com';
//     $mail->Password = '1tuNerLhln6T';
//     $mail->setFrom("sender@mejsp.com", "MEJSP Sender Mail");
//     $mail->addReplyTo($email, $name);
//     $mail->addAddress('info@mejsp.com', $name);
//     $mail->IsHTML('true');
//     $mail->Subject = 'Article publishing request';
//     $mail->Body = $message;
//     $mail->AddAttachment(RESEARCH_FILES.$fileName);

//     if ($mail->send()) {

//        return true;
       
//     } else {
        
//         return false;
//     }
// }