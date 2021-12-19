<?php
session_start();
include("conection.php");

if(isset($_POST['but_submit'])){
  $email = mysqli_real_escape_string($db_connection, $_POST['email']);
  $password = mysqli_real_escape_string($db_connection, $_POST['password']);
  $check_email = "SELECT * FROM customer WHERE email = '$email'";
  $res = mysqli_query($db_connection, $check_email);
  if(mysqli_num_rows($res) > 0){
      $fetch = mysqli_fetch_assoc($res);
      $fetch_pass = $fetch['password'];
      if(password_verify($password, $fetch_pass)){
            $_SESSION['email'] = $email;
            $_SESSION['customerID'] = $fetch['customerID'];
           $_SESSION['password'] = $password;
           $_SESSION['lastName'] = $fetch['lastName'];
            $_SESSION['success'] = "You have logged in!";
              header('location: index.php');
         // }else{
           //   $info = "It's look like you haven't still verify your email - $email";
             // $_SESSION['info'] = $info;
              //header('location: user-otp.php');
          }
      else{
          $massage_failed= "Incorrect email or password!";
      }
  }else{
      $massage_notmember =  "It's look like you're not yet a member! Click on the bottom link to signup.";
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/form.css">

</head>

<body>
  <div class="contact-body">
    <div class="contact-info">
      <div class="box1">
        <div class="tim">
          <p class="text">Collect matches by scanning QR code from the receipt</p>
          <img src="images/icon-bean.png" alt="">

        </div>

        <div class="tom">
          <img src="images/icon-scoop.png" alt=""><br>
          <p class="text">collect matches and sprend them on rewards</p>
        </div>

        <div class="ali">
          <p class="text">Go to your profile page and show the
            claimed rewards to our barista</p><img src="images/icon-cup.png" alt="">
        </div>

      </div>

      <div class="box2">
        
      <div class="logo-lucifer-box">
      <img class="logo-lucifer" src="images/logo lucifer.png" alt="" onclick="location.href='index.php'">
      </div>
        
      <?php echo "<p style= 'color:red'  >$massage_failed</p>" ;?><br>
      <?php echo "<p style= 'color:red'  >$massage_notmember</p>" ;?><br>
        <form class="form-inputs"  action="" method="post" id>
        <!--email-->
        <label class="label-email-1" for="email">email</label>

        <input class="input-email-1" required type="email" id="email" placeholder="your email.." name="email">

        <!--password-->
        <label class="label-password-1" for="lname">password</label>
        <input class="input-password-1" required type="password" id="password" placeholder="Your password.." name="password">
        
        <div class="login-btn-box">

        <!--login btn-->
        <input class="button-login" type="submit" value="login" name="but_submit">
        <!--join now btn-->
        <input class="button-join-1" type="submit" value="join now" onclick="location.href='join-now.php'">

        </div>
         
        <!--forgot password link-->
          <a class="forgot-password-link" href="forgot-password.php" >forgot password</a>

      </div>


      </form>
    </div>
  </div>
  </div>
</body>

</html>