<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

if(isset($_POST['send'])){
print_r($_FILES);

$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
// $pyment = $_POST['pyment'];

    try {
       
        $mail->isSMTP();
    $mail->SMTPDebug = 0;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Port = 587;
    $mail->Host = 'smtp.gmail.com';
    $mail->Username = 'kingofembroidery@gmail.com'; // enter your mail address
    $mail->Password = 'nhucdvtnfsemscnv';   // enter your email password
     $mail->setFrom('kingofembroidery@gmail.com', 'KING OF EMBROIDERY'); // Set sender of the mail
    $mail->addAddress($email);               
        
    if($_FILES['attachment']['name']!=null){
            if(move_uploaded_file($_FILES['attachment']['tmp_name'],"uploads/{$_FILES['attachment']['name']}")){
        $mail->addAttachment("uploads/{$_FILES['attachment']['name']}");    

            }
    
        }
        $mail->isHTML(true);                                  
        $mail->Subject = $subject;
        $mail->Body  = $message;
        // $mail->Body  = $pyment;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();   
        echo '<script>window.location.href="index.php?message_sent";</script>';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
