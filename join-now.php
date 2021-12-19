<?php
// Report simple running errors
include("conection.php");

// Check connection
//if ($db_conection->connect_error) {
 // die("Connection failed: " . $db_conection->connect_error);
//}
//echo "Connected successfully";
//password_hash($_POST["password"],PASSWORD_BCRYPT))
if($_POST["submit_customer"]!= ""){ 
  $code=0; 
 $password = mysqli_real_escape_string($db_connection, $_POST['password']);
 $cpassword = mysqli_real_escape_string($db_connection, $_POST['cpassword']);
 if($password !== $cpassword){
  $massage= "Password not matched!";
}else {
  $sql="select customerID from customer where email= '".mysqli_real_escape_string($db_connection,$_POST["email"])."'";
  if(mysqli_num_rows( mysqli_query($db_connection,$sql))==0){
    $encpass = password_hash($password, PASSWORD_BCRYPT);
    $sql="insert into customer set lastName = '".mysqli_real_escape_string($db_connection,$_POST["lastName"])."',email= '".mysqli_real_escape_string($db_connection,$_POST["email"])."',
     password = '$encpass',code='$code ' ";
     
    mysqli_query($db_connection,$sql);
    $_SESSION['email'] = $email;
    header("Location: login.php");
    die();
  } else{
    header("Location: login.php");
    die();
    $userexist=  "the user already exixst";
  }
}
}

?>
<!!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>join now</title>
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
      <!--logo-->
      <div class="logo-lucifer-box">
      <img  class="logo-lucifer" src="images/logo lucifer.png" alt="" onclick="location.href='login.php'">
      </div>

      <?php echo "<p style= 'color:red'  >$massage</p>" ;?><br>
      <?php echo "<p style= 'color:red'  >$$userexist</p>" ;?><br>
        
      <form class="form-inputs" action="" method="post">

          <!--username-->
          <label class="label-username" for="lastName">username</label> <!-- check last name with ali-->
          <input class="input-username" required type="text" id="lastName" placeholder="Your name.." name="lastName">

          <!--email-->
          <label class="label-email-2" for="email">email</label>
          <input class="input-email-2" required type="email" id="email" placeholder="Your email.." name="email">

          <!--password-->
          <label class="label-password-2" for="lname">password</label>
          <input class="input-password-2" required type="password" id="lname" placeholder="Your password" name="password">
          
          <label class="label-password-2" for="lname">password</label>
          <input class="input-password-2" required type="password" id="lname" placeholder="Your password" name="cpassword">

          <!--check box-->
          
          
          
          <p class="agreement-phrase"><input type="checkbox" name="checkbox" id="" required>
            By checking this box, you are agreeing to our
          <p class=""><a href="https://www.lucifercoffeeroasters.com/algemene-voorwaarden/" target="_blank"
              class="termofservice-link">terms of
              service</a>
            & <a href="https://www.lucifercoffeeroasters.com/privacyverklaring/" target="_blank"
              class="privacy-link">privacy
              policies</a></p>
          </p>
          <!--btn join now-->
          <input class="button-join-2" type="submit" value="join now" name = "submit_customer" >
        </form>
        
      </div>
    </div>
  </div>







</body>

</html>