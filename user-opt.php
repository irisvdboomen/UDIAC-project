<?php
include("conection.php");
if(isset($_POST['confirm_code'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($db_connection, $_POST['code']);
    $check_code = "SELECT * FROM customer WHERE code = '$otp_code'";
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
        echo  "You've entered incorrect code!";
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

            <div class="alert alert-danger text-center">

            </div>

      </div>
      <div class="box2">
        
      <img class="logo-lucifer" src="images/logo lucifer.png" alt="" onclick="location.href='index.php'">
      
        
        
        <p class="text-secretcode">enter your code we sent it to your email address.</p>
      
        <form class="form-inputs" action="" method="post">
          <label class="label-secretcode" for="email">Code</label>
          <input class="input-secretcode" required type="number" id="email" name="code" placeholder="Your code....">
          
          <input class="button-send" type="submit" value="send"  name ="confirm_code"><br>
        </form>
      </div>
    </div>
  </div>
</body>

</html>