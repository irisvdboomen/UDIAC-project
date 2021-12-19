<?php
include("conection.php");
    if(isset($_POST['but_forget'])){
      $email = mysqli_real_escape_string($db_connection, $_POST['email']);
      $check_email = "SELECT * FROM customer WHERE email='$email'";
      $run_sql = mysqli_query($db_connection, $check_email);
      if(mysqli_num_rows($run_sql) > 0){
          $code = rand(999999, 111111);
          $insert_code = "UPDATE customer SET code = $code WHERE email = '$email'";
          $run_query =  mysqli_query($db_connection, $insert_code);
          if($run_query){
              $subject = "Password Reset Code";
              $message = "Your password reset code is $code";
              $sender = "From: udiac2021@gmail.com";
              if(mail($email, $subject, $message,$sender)){
                  $info = "We've sent a passwrod reset otp to your email - $email";
                  $_SESSION['info'] = $info;
                  $_SESSION['email'] = $email;
                  header('location: code-verification.php');
                  exit();
              }else{
                $errors['otp-error'] = "Failed while sending code!";
              }
          }else{
            $errors['db-error'] = "Something went wrong!";
          }
      }else{
        $errors['email'] = "This email address does not exist!";
      }
  }

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>reset password</title>
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
          <p class="text">collect matches and sp  end them on rewards</p>
        </div>

        <div class="ali">
          <p class="text">Go to your profile page and show the
            claimed rewards to our barista</p><img src="images/icon-cup.png" alt="">
        </div>
        <?php
        if(count($errors) > 0){
            ?>
            <div class="alert alert-danger text-center">
                <?php 
                    foreach($errors as $error){
                        echo $error;
                    }
                ?>
            </div>
            <?php
        }
    ?>
      </div>
      <div class="box2">
        <br>
        <br>
        <div class="contact-form">
          
          <img class="logo-lucifer" src="images/logo lucifer.png" alt="" onclick="location.href='index.php'">
        </div>
        <br>
        <br>
        <p class="reset-pass-int">enter your email</p>
        <p class="reset-pass-int">to receive link for resetting password:</p>
        <br>
        <form action="" method="post">
          <label class="label-form" for="email">email</label>
          <input required type="email" id="email" name="email" placeholder="Your email..">
          
          <input class="button-cancel" type="submit" value="cancel" onclick="location.href='login.php'">
          <input class="button-send" type="submit" value="send" onclick="location.href='link-sent-succ.php'"><br>
        </form>
      </div>
    </div>
  </div>
</body>

</html>