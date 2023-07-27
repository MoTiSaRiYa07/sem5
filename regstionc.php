<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="css/regstionc.css">
</head>
<body>
<?php
    require('db1.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) 
    {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);

        $email    = ($_REQUEST['email']);
        // $email    = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $password = md5($password);

        $phonenumber = stripslashes($_REQUEST['phonenumber']);
        $phonenumber = mysqli_real_escape_string($con, $phonenumber);

        $birth = stripslashes($_REQUEST['birth']);
        $birth = mysqli_real_escape_string($con, $birth);

        $gender1 = stripslashes($_REQUEST['gender']);
        $gender1 = mysqli_real_escape_string($con, $gender1);

        $add1 = stripslashes($_REQUEST['add1']);
        $add1 = mysqli_real_escape_string($con, $add1);

        $add2 = stripslashes($_REQUEST['add2']);
        $add2 = mysqli_real_escape_string($con, $add2);

        $coun1 = stripslashes($_REQUEST['coun1']);
        $coun1 = mysqli_real_escape_string($con, $coun1);

        $city = stripslashes($_REQUEST['city']);
        $city = mysqli_real_escape_string($con, $city);

        $region = stripslashes($_REQUEST['region']);
        $region = mysqli_real_escape_string($con, $region);

        $postal = stripslashes($_REQUEST['postal']);
        $postal = mysqli_real_escape_string($con, $postal);
         
         $aname = stripslashes($_REQUEST['aname']);
        $aname = mysqli_real_escape_string($con, $aname);
 
        $anumber = stripslashes($_REQUEST['anumber']);
        $anumber = mysqli_real_escape_string($con, $anumber);

        $acard = stripslashes($_REQUEST['acard']);
        $acard = mysqli_real_escape_string($con, $acard);

        $acvv = stripslashes($_REQUEST['acvv']);
        $acvv = mysqli_real_escape_string($con, $acvv);
       
        $expiredate = stripslashes($_REQUEST['expiredate']);
        $expiredate = mysqli_real_escape_string($con, $expiredate);

        // $create_datetime = date("Y-m- dH:i:s");
        
        // $gender1 = mysqli_real_escape_string($con, $gender1);
        try{
        $query    = "INSERT into `users12` (username, password, email, phonenumber, birth, gender1, add1, add2, coun1, city, region, postal, aname , anumber , acard , acvv , expiredate)
                     VALUES ('$username', '$password', '$email',  ' $phonenumber', '$birth' , ' $gender1', '$add1' ,'$add2' ,'$coun1' ,'$city', '$region', '$postal' ,'$aname' ,'$anumber' ,'$acard', '$acvv' ,'$expiredate')";

          $result   = mysqli_query($con, $query);
        }   
        catch(Exception $e){
          print_r($e->getMessage());
        }                  
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='loginc.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='regstionc.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <section class="container">
      <header> Customer Registration Form</header>
      <form action="" class="form" method="post">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" name="username" placeholder="Enter full name" required />
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter email address" required />
        </div>

        <div class="input-box">
          <label>password</label>
          <input type="password" name="password" placeholder="Enter password" required />
        </div>
    
             <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" name="phonenumber" placeholder="Enter phone number" required />
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date"  name= "birth"  Enter birth date required />
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender1">
              <input type="radio" id="check-male" name="gender" value="male" />
              <label for="check-male">male</label>
            </div>
            <div class="gender1">
              <input type="radio"  id="check-female" name="gender" value="female" />
              <label for="check-female">Female</label>
            </div>
            <div class="gender1">
              <input type="radio" id="check-other" name="gender" value="other"/>
              <label for="check-other">prefer not to say</label>
            </div>
          </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input type="text"  name="add1" placeholder="Enter street address" required />
          <input type="text"  name="add2" placeholder="Enter street address line 2" required />
          <div class="column">
            <div class="select-box">
              <select name="coun1">
                <option hidden>Country</option>
                <option>America</option>
                <option>Japan</option>
                <option>India</option>
                <option>Nepal</option>
              </select>
            </div>
            <input type="text" name="city"  placeholder="Enter your city" required />
          </div>
          <div class="column">
            <input type="text"  name="region" placeholder="Enter your region" required />
            <input type="number"   name="postal" placeholder="Enter postal code" required />
          </div>
        </div>
                     <!--bank detil-->
        <div class="input-box bank">
          <label> ATM Bank detil</label>
          <input type="text"  name="aname" placeholder="Enter ATM name" required />
          <input type="number" name="anumber"  placeholder="Enter Atm Number" required />
          <input type="text" name="acard" placeholder="Enter bank type"require />
            <input type="number" name="acvv" placeholder="Atm cvv number" required />
          </div>
          <!--<div class="column">
            <input type="text" class="atype" placeholder="Atm type " required />
          </div>
    -->
          <div class="input-box">
            <label> Atm Expire Date</label>
            <input type="date"  name="expiredate" Enter Expire date required />
          </div>
       
        </div>
       
        <button>Submit</button>
                <p class="link">Already have an account? <a href="loginc.php">Login here</a></p>

      </form>
    </section>

<?php
    }
?>
</body>
</html>
