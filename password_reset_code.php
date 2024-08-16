<?php
include "show.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php'; // Adjust based on your installation method
//require 'phpmailer/src/Exception.php';
//require 'phpmailer/src/PHPMailer.php';
//require 'phpmailer/src/SMTP.php';

function send_otp($to,$subject,$content){
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
$mail->addAddress($to, 'Verify Email');
$mail->addReplyTo('brandy.singh0001@gmail.com','CIDEVELOPER');

// Sending plain text email
$mail->isHTML(true); // Set email format to plain text
$mail->Subject = $subject;
$mail->Body    = 'Your OTP for Login is:'.$content;
$mail->send();
echo 'Message has been sent';
}catch(Exception $e){
    echo "Message could not be sent.Mailer Error:{$mail->ErrorInfo}";
}
// Send the email
}

?>