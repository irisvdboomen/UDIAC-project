<?php
    if(isset($_POST['change-password'])){
      $_SESSION['info'] = "";
      $password = mysqli_real_escape_string($db_connection, $_POST['password']);
      $cpassword = mysqli_real_escape_string($db_connection, $_POST['cpassword']);
      if($password !== $cpassword){
          $errors['password'] = "Confirm password not matched!";
      }else{
          $code = 0;
          $email = $_SESSION['email']; //getting this email using session
          $encpass = password_hash($password, PASSWORD_BCRYPT);
          $update_pass = "UPDATE customer SET code = $code, password = '$encpass' WHERE email = '$email'";
          $run_query = mysqli_query($db_connection, $update_pass);
          if($run_query){
              $info = "Your password changed. Now you can login with your new password.";
              $_SESSION['info'] = $info;
              header('Location: new-password-succes.php');
          }else{
              $errors['db-error'] = "Failed to change your password!";
          }
      }
  }
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/form.css">

</head>

<body>
  <div class="contact-body">
    <div class="contact-info">
      <div class="box1">
        <div class="tim">
          <p class="text">Collect matches by NFC tag from the receipt</p>
          <img src="images/icon-bean.png" alt="">

        </div>

        <div class="tom">
          <img src="images/icon-scoop.png" alt=""><br>
          <p class="text">collect matches and spend them on rewards</p>
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
        <p class="reset-pass-int">please create a new password </p>
        <p class="reset-pass-int">that you don't use on any other site</p>
        <br>
        <form action="" method="post">
          <label class="label-form" for="lname">new password</label>
          <input required type="password" id="lname" placeholder="new password.." name="password">
          <label class="label-form" for="lname"> confirm password</label>
          <input required type="password" id="lname" placeholder=" write new password agian.." name="cpassword">
          <input class="button-change" type="submit" value="change" name="change-password" onclick="location.href='new-password-succes.php'">
        </form>
      </div>
    </div>
  </div>
</body>

</html>