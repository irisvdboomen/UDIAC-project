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
            $_SESSION['password'] = $password;

            $_SESSION['success'] = "You have logged in!";
              header('location: index.php');
         // }else{
           //   $info = "It's look like you haven't still verify your email - $email";
             // $_SESSION['info'] = $info;
              //header('location: user-otp.php');
          }
      else{
          echo "Incorrect email or password!";
      }
  }else{
      echo "It looks like you're not a member yet! Click on the link to sign up.";
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
          <p class="text">Collect matches by scanning NFC tag from the receipt</p>
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
        <br>
        <br>

        <div class="contact-form">

          <img class="logo-lucifer" src="images/logo lucifer.png" alt="" onclick="location.href='index.php'">

        </div>

        <form action="" method="post">

          <label class="label-form" for="email">email</label>
          <input required type="email" id="email" placeholder="your email.." name="email">

          <label class="label-form" for="lname">password</label>
          <input required type="password" id="lname" placeholder="Your password.." name="password">

         
         
          <input class="button-login" type="submit" value="login" name="but_submit">

          <input class="button-join-1" type="submit" value="join now" onclick="location.href='join-now.php'"
            name="join-now-btn">

          <br>
          <br>
          <a href="forgot-password.php" class="text_link">forgot password</a>
      </div>

      </form>
    </div>
  </div>
  </div>
</body>

</html>