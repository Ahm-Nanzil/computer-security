<?php

function sendOTP($email,$otp){
    require('phpmailer/class.phpmailer.php');
    require('phpmailer/class.smtp.php');
    $msg_body="One time".$otp;
    $mail=new PHPMailer();
    $mail->AddReplyTo('aljf@gmail.com','ahmnanzil');
    $mail->SetFrom('Tutalfjlfaj@gmail.com','Tgkashgkjdjshgk',0);
    $mail->AddAddress($email);
    $mail->Subject="otp to login";
    $mail->MsgHTML($msg_body);
    $result=$mail->Send();
    if(!$result){
        echo "Error Sending mail hasib" . $mail->ErrorInfo;
    }
    else{
        return $result;
    }

}

?>