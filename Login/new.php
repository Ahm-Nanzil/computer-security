
<?php

include "mail_function.php";
date_default_timezone_set("Asia/Kolkata");
$success ="";
$error_msg="";
$conn=
// if(!empty($_POST["submit_mail"]))
// {
    // $result=mysqli_query($conn, "SELECT * FROM WHERE ='".$_POST["email"]."'");
    // $count = mysqli_num_rows($result);
    $count=1;
    if($count>0){
        //genarate otp
        $otp=rand(100000,999999);

        echo $otp;

        //send otp
        // $reciverEmail=$_POST["email"];
        $reciverEmail="ahmnanzil33@gmail.com";
        $mail_status=sendOTP($reciverEmail,$otp);
        if ($mail_status == 1){
            echo "Success";

        }
        else{
            echo "Error";

        }
    }
// }

?>
