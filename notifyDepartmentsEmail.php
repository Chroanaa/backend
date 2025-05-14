<?php
header('Content-Type: application/json; charset=utf-8');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/autoload.php';
$attendance = $_POST['attendance'] ?? "false";
$inventory = $_POST['inventory'] ?? "false";
$grades = $_POST['grades'] ?? "false";

if($attendance == "true"){
    $message = "Good day this is from the CDC department requesting the attendance report please reply to this message and attach the report";
    $subject = "Request for attendance report";
    sendEmail($message,$subject, "gpgod24@gmail.com");
}
if($inventory == "true"){
    $message = "Good day this is from the CDC department requesting the inventory report please reply to this message and attach the report";
    $subject = "Request for inventory report";
    sendEmail($message,$subject, "perez.menard.nomiddlename@gmail.com");
}
if($grades == "true"){
    $message = "Good day this is from the CDC department requesting the grades report please reply to this message and attach the report";
    $subject = "Request for grades report";
    sendEmail($message,$subject, "manulazy4@gmail.com");
}
function sendEmail($message,$subject,$email){
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
    
    $mail->setFrom('perez.menard.nomiddlename@gmail.com', 'CDC');
    $mail->addAddress($email);

    $mail->isHTML(true);                                  
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->send();
    echo json_encode(['status' => 'success', 'message' => 'Message has been sent']);
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'message' => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
}
}
?>