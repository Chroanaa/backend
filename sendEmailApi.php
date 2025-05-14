<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'vendor/autoload.php';

$type = $_POST['type'];
if($type == "cadets"){
    $message = "Hello Cadet, <br> You have been selected for the next round of the selection process. Please find the attached file for more details.";
    $subject = "Cadet Selection Process";
    sendEmail($message,$subject);
}
else if($type == "atr"){
    $message = "Good Day this is the ATR for the day. <br> Please find the attached file for more details.";
    $subject = "ATR for the day";
    sendEmail($message,$subject);
}else if($type == "cdc"){
    $message = "Good Day this is the CDC for the day. <br> Please find the attached file for more details.";
    $subject = "CDC for the day";
    sendEmail($message,$subject);
}
function sendEmail($message,$subject){
    $mail = new PHPMailer(true);
    try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'perez.menard.nomiddlename@gmail.com';                     //SMTP username
    $mail->Password   = 'gkrr mnsf qhcg cgmv';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $file = $_FILES['file'];
    $tmp_name = $_FILES['file']["tmp_name"];
    $file_name = $_FILES['file']["name"];
    $mail->setFrom('perez.menard.nomiddlename@gmail.com', 'Mailer');
    $mail->addAddress('gpgod24@gmail.com');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->addAttachment($tmp_name, $file_name); //Add attachments
    $mail->send();
    echo json_encode(['status' => 'success', 'message' => 'Message has been sent']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
}
}
?>