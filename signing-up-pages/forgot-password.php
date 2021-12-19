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
  <link rel="stylesheet" href="../css/form.css">


</head>

<body>
  <div class="contact-body">
    <div class="contact-info">
      <div class="box1">
        <div class="tim">
          <p class="text">Collect matchsticks by<br>
            putting in the code from
            the receipt</p>
          <img class ="icons-step"src="../images/icon-bean.png" alt="">

        </div>

        <div class="tom">
          <img class ="icons-step" src="../images/icon-scoop.png" alt=""><br>
          <p class="text">collect matches and sprend <br> them on rewards</p>
        </div>

        <div class="ali">
          <p class="text">Go to your profile page and <br>show the
            claimed rewards <br>to our barista</p><img class ="icons-step" src="../images/icon-cup.png" alt="">
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
        
        <!--logo-->
      
      <img class="logo-lucifer" src="../images/logo lucifer.png" alt="" onclick="location.href='index.php'">
      
      
      <!--reset password instructions-->
        <p class="instr">enter your email to receive link for<br> resetting password:</p>
        
        

        <form  class="form-inputs" action="" method="post">
          <!--email-->
          <label class="label-email-3" for="email">email</label>
          <input class="input-email-3"  required type="email" id="email" name="email" placeholder="Your email..">


          <div class="forgotpass-btn-box">
          <!--btn cancel-->
          <input class="button-cancel" type="submit" value="cancel" onclick="location.href='login.php'">
          <!--btn cancel-->
          <input class="button-send" type="submit" value="send" onclick="location.href='link-sent-succ.php'">
        </div>

        </form>
      </div>
    </div>
  </div>
</body>

</html>