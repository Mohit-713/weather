<?php
require 'PHPMailer/PHPMailerAutoload.php';
require 'credentials.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 2525;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Weatherforecast');





$mail->addAddress('m.kachhwaha713@gmail.com', 'mohit713');     // Add a recipient

// $mail->addReplyTo('info@example.com', 'Information');

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Weather-Alert';
$mail->Body    = include('');
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}