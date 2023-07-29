<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/55.css">
  <link rel="stylesheet" type="text/css" href="css/res.css">
  <title></title>
  <link rel="stylesheet" href="css/fo.css">

</head>

<body>
  <?php  include_once('menu/navbar.php') ?>

  <?php
  require('dbcon.php');
  // When form submitted, insert values into the database.
  if (isset($_REQUEST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);

    $lastname = stripslashes($_REQUEST['lastname']);
    //escapes special characters in a string
    $lastname = mysqli_real_escape_string($con, $lastname);

    $email    = ($_REQUEST['email']);
    $email    = mysqli_real_escape_string($con, $email);

    $phone = stripslashes($_REQUEST['phone']);
    $phone = mysqli_real_escape_string($con, $phone);

    $add1 = stripslashes($_REQUEST['add1']);
    $add1 = mysqli_real_escape_string($con, $add1);

    try {
      $query    = "INSERT into `usersconus` (username, lastname, email, phone, add1)
                     VALUES ('$username', '$lastname', '$email',  ' $phone',  '$add1')";

      $result   = mysqli_query($con, $query);
    } catch (Exception $e) {
      print_r($e->getMessage());
    }
    if ($result) {
      echo "<div class='form' style='margin-top:70px; margin-bottom:20%'>
                  <h3>You are successfully add data.</h3><br/>
                <p class='link'>Click here to <a href='conts.php'>contact us</a></p>
                  </div>";
    }
  } else {
  ?>
    <section>
      <div class="contact_us_2">
        <div class="responsive-container-block big-container">
          <div class="blueBG">
          </div>
          <div class="responsive-container-block container">
            <form class="form-box" method="post">
              <div class="container-block form-wrapper">
                <p class="text-blk contactus-head">
                  Get in Touch
                </p>
                <p class="text-blk contactus-subhead">
                  PAINTING AUCTION MANGMENT SYSTEAM
                </p>
                <div class="responsive-container-block">
                  <div class="responsive-cell-block wk-ipadp-6 wk-tab-12 wk-mobile-12 wk-desk-6">
                    <p class="text-blk input-title">
                      FIRST NAME
                    </p>
                    <input class="input" name="username" placeholder="Please enter first name...">
                  </div>
                  <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <p class="text-blk input-title">
                      LAST NAME
                    </p>
                    <input class="input" name="lastname" placeholder="Please enter last name...">
                  </div>
                  <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <p class="text-blk input-title">
                      EMAIL
                    </p>
                    <input class="input" name="email" placeholder="Please enter email...">
                  </div>
                  <div class="responsive-cell-block wk-desk-6 wk-ipadp-6 wk-tab-12 wk-mobile-12">
                    <p class="text-blk input-title">
                      PHONE NUMBER
                    </p>
                    <input class="input" name="phone" placeholder="Please enter phone number...">
                  </div>
                  <div class="responsive-cell-block wk-tab-12 wk-mobile-12 wk-desk-12 wk-ipadp-12">
                    <p class="text-blk input-title">
                      WHAT DO YOU HAVE IN MIND
                    </p>
                    <textarea class="add1" name="add1" placeholder="Please enter query..."></textarea>
                  </div>
                </div>
                <button class="submit-btn">
                  Submit
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  <?php
  }
  ?>

  <?php include_once('menu/footer.php') ?>

</body>

</html>