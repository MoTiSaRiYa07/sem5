<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($_SESSION['system']['name']) ? $_SESSION['system']['name'] : '' ?></title>
    <?php
  //if(!isset($_SESSION['login_id']))
   // header('location:login.php');
 // include('./header.php'); 
 // include('./auth.php'); 
 //date_default_timezone_set('Asia/Manila');
 ?>

</head>
<body>
<?//php include 'topbar.php' ?>

    

</body>
</html>