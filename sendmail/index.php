<?php
//include required phpmailer files

require('includes/PHPMailer.php');
require('includes/SMTP.php');
require('includes/Exception.php');
//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// send_mail('bharathamirani1234@gmail.com',"test");
function send_mail($email,$msg){
  //create a instance phpmailer
$mail = new PHPMailer(true);
//set mailer to use smtp
$mail->isSMTP();
//define smtp host
$mail->Host = "smtp.gmail.com";
//enable smtp authentication
$mail->SMTPAuth = "true";
//set type of encryption (ssl/tls)
$mail->SMTPSecure = "tls";
//set port to connect smtp
$mail->Port = "587";
//set gmail user
$mail->Username = "csravi816@gmail.com";
//set gmail password
$mail->Password = "Ravi1234";
//set gmail subject
$mail->Subject = "For The test purpose";
//set sender email
$mail->setFrom("csravi816@gmail.com");
//email body
$mail->Body = $msg;
//add recipient
$mail->addAddress($email);
//finaly send email
$mail->send();
//closing smtp connection
if($mail->Send())
{
  echo "Email Sent";
}
else
{
    echo "Error";
}
$mail->smtpClose();
}
?>