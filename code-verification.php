<?php 
include("connection.php");
//$email = $_SESSION['email'];
//if($email == false){
//  header('Location: login.php');
//}
if(isset($_POST['check-reset-otp'])){
  $_SESSION['info'] = "";
  $otp_code = mysqli_real_escape_string($db_connection, $_POST['otp']);
  $check_code = "SELECT * FROM customer WHERE code = $otp_code";
  $code_res = mysqli_query($db_connection, $check_code);
  if(mysqli_num_rows($code_res) > 0){
      $fetch_data = mysqli_fetch_assoc($code_res);
      $email = $fetch_data['email'];
      $_SESSION['email'] = $email;
      $info = "Please create a new password that you don't use on any other site.";
      $_SESSION['info'] = $info;
      header('location: make-new-password.php');
      exit();
  }else{
      $errors['otp-error'] = "You've entered incorrect code!";
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
        <br>
        <br>
        <div class="contact-form">
          <br>
          <br>
          <img class="logo-lucifer" src="images/logo lucifer.png" alt="" onclick="location.href='index.php'">
        </div>
        <?php 
        if(isset($_SESSION['info'])){
            ?>
            <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                <?php echo $_SESSION['info']; ?>
            </div>
            <?php
        }
        ?>
        <?php
        if(count($errors) > 0){
            ?>
            <div class="alert alert-danger text-center">
                <?php
                foreach($errors as $showerror){
                    echo $showerror;
                }
                ?>
            </div>
            <?php
        }
        ?>
        <form  class="form-inputs" action="" method="post">
          
          <input class="input-verification" required type="number" id="lname" placeholder="enter verification code" name="password">
          <input class="button-submit" type="submit" value="submit" onclick="location.href='make-new-password.php'">
        </form>
      </div>
    </div>
  </div>
</body>

</html>