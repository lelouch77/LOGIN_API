<?php
include ('emailConfig.php');
require 'PHPMailerAutoload.php';
$toEmail = $_GET["email"];
$toName  = $_GET["name"];
$subject = $_GET["subject"];
$body    = $_GET["body"];
$mail = new PHPMailer;
$mail->isSMTP();
$mail->Debugoutput = 'html';
$mail->Host = $hostName;
$mail->Port = $portNumber;
$mail->SMTPAuth = true;
$mail->Username = $formEmail;
$mail->Password = $passWord;
$mail->setFrom( $formEmail, $userName);
$mail->addReplyTo( $formEmail, $userName);
$mail->addAddress($toEmail, $toName);
$mail->Subject = $subject;
$mail->msgHTML($body);
$mail->AltBody = 'Please enable HTML to view this email';
if (!$mail->send()) {
echo "fail";
} else {
echo "success";
}
  
?>