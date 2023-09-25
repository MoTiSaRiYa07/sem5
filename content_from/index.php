<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $name = htmlentities($_POST['name']);
    $email = htmlentities($_POST['email']);
    $phone = htmlentities($_POST['phone']);
    $subject = htmlentities($_POST['subject']);
    $message = htmlentities($_POST['message']);

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'kingofembroidery@gmail.com';
    $mail->Password = 'nhucdvtnfsemscnv';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress('kingofembroidery@gmail.com');
     $mail->Subject = (" [$email] === ($subject)");
       $mail->Body = $message;
    $mail->send();

    header("Location: ./index.php?=email_sent!");
}
?>

<?php include('../menu/navbar.php'); ?>

<html>
<head>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/allencasul/lonica@d9dbccfa5b0a4666760e4f72b28effa775c56857/css/cdn/lonica.css" integrity="sha256-E1S8yAbnRZ6uM4sA6NMSgTyoDsdK1ZCjBYF3lqXqv6Q=" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/1e8d61f212.js"></script>-->
  <link rel="stylesheet" type="text/css" href="fo.css"> 

    </head>
<body class="center-absolute">
  <!-- <form class="display-grid row-gap-1-rem" method="post">
    <input class="box-shadow-primary" name="name" type="text" placeholder="Name" autocomplete="off" required />
    <input class="box-shadow-primary" name="email" type="email" placeholder="Email" autocomplete="off" required />
    <input class="box-shadow-primary" name="subject" type="text" placeholder="Subject" autocomplete="off" required />
    <textarea class="box-shadow-primary" name="message" placeholder="Message..." required></textarea>
    <button type="submit" name="send">
      Send <i class="fa-solid fa-paper-plane color-white margin-left-1-rem"></i>
    </button>
  </form> -->

  <div class="container">

	<h1 class="brand"><span>CONTAT sdnfmb ME AND MY PROJECT MEMBER </span></h1>

	<div class="wrapper">

		<!-- COMPANY INFORMATION -->
		<div class="company-info">
			<h3>PAINTING AUCTION SYSTEM</h3>

			<ul>
				<li><i class="fa fa-road"></i>created by ankushmotisariya & my project member</li>
				<li><i class="fa fa-phone"></i>8849048885</li>
				<li><i class="fa fa-envelope"></i>kingofembroidery@gmail.com</li>
			</ul>
		</div>
		<!-- End .company-info -->

		<!-- CONTACT FORM -->
		<div class="contact">
			<h3>E-mail Us</h3>

			<form id="contact-form"  method="post">

				<p>
					<label>Name</label>
					<input type="text" name="name" id="name"   placeholder="ENTER YOUR NAME" autocomplete="off" required>
				</p>
            <p>
					<label>E-mail Address</label>
					<input type="email" name="email" id="email"   placeholder=" ENTER YOUR GMAIL"  autocomplete="off" required>
				</p>

				<p>
					<label>Phone Number</label>
					<input type="text" name="phone" id="phone"  placeholder="ENTER YOUR PHONE NUMBER" autocomplete="off" required>
				</p>

        <p>
					<label>subject</label>
					<input type="text" name="subject" id="subject"  placeholder="ENTER YOUR SUBJECT" autocomplete="off" required>
				</p>


				<p class="full">
					<label>Message</label>
					<textarea name="message" rows="5" id="message"  placeholder="ENTER YOUR MESSAGE" autocomplete="off" require></textarea>
				</p>

      <p class="full">
        <button type="submit" name="send">
      Send <i class="fa-solid fa-paper-plane color-white margin-left-1-rem"></i>
    </button>
  				</p>

			</form>
			<!-- End #contact-form -->
		</div>
		<!-- End .contact -->

	</div>
	<!-- End .wrapper -->
</div>
<!-- End .container -->
</body>
</html>
<?php include('menu/footer.php'); ?>


