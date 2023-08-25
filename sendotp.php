
<?php

session_start();

include('admin/db_connect.php');

include 'mail_config.php';

$email = $_POST["email"];

  // Generate a random 6-digit OTP
  $otp = rand(100000, 999999);

  // Send the OTP to the user's email
  $to = $_POST["email"];
  $subject = "Your Registration Code";
  $message = "<b>Your OTP <u>code</u> is: $otp</b>";
  // mail("", $subject, $message);




  $mail->addAddress($to);           // Add a recipient
  // $mail->addAddress('receiver2@gfg.com', 'Name');   // Name is optional
  $mail->isHTML(true);
  $mail->Subject = "$subject";
  $mail->Body    = "$message"; 
  $mail->AltBody = 'Body in plain text for non-HTML mail clients';

  $mail->send();

  $user_mail = $to ;
try {
    // save OTP in session
    $_SESSION['otp']=$otp;
    $qry = "DELETE FROM otps WHERE email = '$user_mail'";
    mysqli_query($conn, $qry);

    $qry = "insert into otps (email, otp) values('$user_mail' , $otp )";
    mysqli_query($conn, $qry);
}
catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}
  // echo "<h1>OTP Sent</h1>";

$_SESSION['temp_mail'] = $to;

?>