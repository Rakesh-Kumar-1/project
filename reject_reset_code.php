<?php
include "show.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Adjust based on your installation method
//require 'phpmailer/src/Exception.php';
//require 'phpmailer/src/PHPMailer.php';
//require 'phpmailer/src/SMTP.php';

//function send_message($to,$subject)
function send_message($email,$organization_name,$job_post){
$mail = new PHPMailer(true); // Enable exceptions

try{
// SMTP Configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Your SMTP server
$mail->SMTPAuth = true;
$mail->Username = 'brandy.singh0001@gmail.com'; // Your Mailtrap username
$mail->Password = 'hdexxdlqmitvhwlt'; // Your Mailtrap password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;  //PHPMailer::ENCRYPTION_SMTPS;
$mail->Port = 465;

// Sender and recipient settings
$mail->setFrom('brandy.singh0001@gmail.com',"Local app founder");
$mail->addAddress($email, 'Verify Email');
$mail->addReplyTo('brandy.singh0001@gmail.com','CIDEVELOPER');

// Sending plain text email
$mail->isHTML(true); // Set email format to plain text
$mail->Subject = "SORRY YOUR ARE NOT SELECTED";
$mail->Body = 'Your resume has rejected by '.$organization_name.' for post '.$job_post.' Do not loose hope keep searching and apply to different company.You will find a great and confortable job soon.';
$mail->send();
// echo 'Message has been sent';
header("location:account_job_post_applied_list.php");

}catch(Exception $e){
    echo "Message could not be sent.Mailer Error:{$mail->ErrorInfo}";
}
// Send the email
}

?>