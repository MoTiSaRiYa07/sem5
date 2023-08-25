<?php 
	include("connection.php");
	session_start();
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	if(isset($_REQUEST['btn_submit']))
	{
		$cust_name = $_REQUEST['txt_cname'];
		$cust_address = $_REQUEST['txt_caddress'];	
		$cust_dist = $_REQUEST['txt_cdist'];
		$shop_name = $_REQUEST['txt_sname'];
		$cust_contact = $_REQUEST['txt_ccontact'];
		$cust_email = $_REQUEST['txt_Email'];
		$cust_gst_no = $_REQUEST['txt_cgstno'];
		$cust_gst_password = md5( $_REQUEST['txt_Password']);
		
				
			$i = 0;
			$code = 0;
			$ss = "select * from cust_registration ";
			$rr = mysqli_query($conn,$ss);
			while($ww = mysqli_fetch_array($rr))
			{
				$i = $ww['cust_id'];
			}
			$code = "C01".$i;
			
			
						
			$insert="insert into cust_registration values('','$code','$cust_name','$cust_address','$cust_dist','$shop_name','$cust_email')";
			$em=  mysqli_query($conn,$insert);
			$insert1="insert into cust_gst values('','$code','$cust_gst_no','$cust_contact','$cust_gst_password','','')";
			$emp=mysqli_query($conn,$insert1);
			header('location:login.php');
		
		if($insert)
				{
					// Import PHPMailer classes into the global namespace
					// These must be at the top of your script, not inside a function
					
					
					//Load composer's autoloader
					require 'vendor/autoload.php';
					
					$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
					try 
					{
							//Server settings
							$mail->SMTPDebug = 0;                                 // Enable verbose debug output
							$mail->isSMTP();                                      // Set mailer to use SMTP
							$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
							$mail->SMTPAuth = true;                               // Enable SMTP authentication
							$mail->Username = 'anerishah1898@gmail.com';                 // SMTP username
							$mail->Password = '@9408516865';                           // SMTP password
							$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
							$mail->Port = 465;                                    // TCP port to connect to
							$mail->SMTPOptions = array(
							'ssl' => array(
							'verify_peer' => false,
							'verify_peer_name' => false,
							'allow_self_signed' => true
							)
							);
						
							//Recipients
							$mail->setFrom('anerishah1898@gmail.com', 'Aneri Shah');
							$mail->addAddress($cust_email,'');     // Add a recipient
						   // $mail->addAddress('ellen@example.com');               // Name is optional
							$mail->addReplyTo('anerishah1898@gmail.com', 'Aneri Shah');
							//$mail->addCC('cc@example.com');
							//$mail->addBCC('bcc@example.com');
						
							//Attachments
							//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
							//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
						
							//Content
							$mail->isHTML(true);                                  // Set email format to HTML
							$mail->Subject = 'Hello  Welcome To VimalNath Agency..!';
							
							
							$mail->Body    = '
											<p>Welcome to VimalNath Agenncy Please Click On Below Link To Activate Your Account </p>'
								;
							$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
						
							$mail->send();
							echo "mail sent";
						
					} 
					catch (Exception $e) 
					{
						 echo "email could not be sent", $mail->ErrorInfo;
					}
			}
							
	
		
	}
?>
<!DOCTYPE html>
<html>
<head>
<?php include('link.php') ?>

<!---start ---->

<!---end---->
</head>
<body>
<?php include('header.php') ?>
  <!---->
 <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Online Shopping</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->
<div class="clearfix"></div>
	<div class="Register">
	
		<div class="main-agileits">
				<div class="form-w3agile">
				
					<h3>Registration</h3>
					<form action="#" method="post">
						<div>
						<label class="control-label">Customer Name</label>
						<div class="key">
							
							<input  type="text" name="txt_cname" required="" pattern="[a-zA-Z ]{1,}" title="Only Alphabets">
							<div class="clearfix"></div>
						</div>
						</div>
						
						<div>
						<label class="control-label">Address</label>
						<div class="key">
							
							<input  type="text" name="txt_caddress" required="" pattern="[a-zA-Z0-9 ]{7,}" title="Only AlphaNumeric">
							<div class="clearfix"></div>
						</div>
						</div>
						
						<div>
						<label class="control-label">Dist</label>
						<div class="key">
							
							<input  type="text" name="txt_cdist" required="" pattern="[a-zA-Z ]{1,}" title="Only Alphabets">
							<div class="clearfix"></div>
						</div>
						</div>
						
						<div>
						<label class="control-label">Shop Name</label>
						<div class="key">
							
							<input  type="text" name="txt_sname" required="" pattern="[a-zA-Z ]{1,}" title="Only Alphabets">
							<div class="clearfix"></div>
						</div>
						</div>
						
						<div>
						<label class="control-label">Contact No.</label>
						<div class="key">
							
						
							<input  type="text" name="txt_ccontact" required="" pattern="[0-9]{10,10}" title="Only Numeric">
							<div class="clearfix"></div>
						</div>
						</div>
						
						<div>
						<label class="control-label">Email Id</label>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" name="txt_Email" required="" pattern="[_a-z0-9-+]+(\.[_a-z0-9-+]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})" title="Enter Email Id">
							<div class="clearfix"></div>
						</div>
						</div>
						
						
						<div>
						<label class="control-label">GST No.</label>
						<div class="key">
							<input  type="text" name="txt_cgstno" required="" pattern="[a-zA-Z0-9]{15,20}" title="Only AlphaNumeric">
							<div class="clearfix"></div>
						</div>
						</div>
						
						<div>
						<label class="control-label">Password</label>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" name="txt_Password" required="" pattern="[a-zA-Z0-9]{8,12}" title="Enter Password">
							<div class="clearfix"></div>
						</div>
						</div>
						<center>
						<input type="submit" name="btn_submit" value="register">
						</center>
					</form>
				</div>
				<div class="forg">
					
					<a href="login.php" class="forg-right">Login</a>
				<div class="clearfix"></div>	<div class="clearfix"></div>
				</div>				
			</div>			
		</div>	
<!--footer-->
<?php include('footer.php') ?>

</body>
</html>