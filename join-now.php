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
    echo "the user already exixst";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Join now</title>
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
        
        <div class="contact-form">

          <img class="logo-lucifer" src="images/logo lucifer.png" alt="" onclick="location.href='login.php'">
        </div>
        <form action="" method="post">
          <label class="label-form" for="lastName">username</label>
          <input required type="text" id="lastName" placeholder="Your name.." name="lastName">
          <label class="label-form" for="email">email</label>
          <input required type="email" id="email" placeholder="Your email.." name="email">
          <label class="label-form" for="lname">password</label>
          <input required type="password" id="lname" placeholder="Your password" name="password">
          <p class="terms"><input type="checkbox" name="checkbox" id="">
            By checking this box, you are agreeing to our
            <br>
          <p class="center-text"><a href="https://www.lucifercoffeeroasters.com/algemene-voorwaarden/" target="_blank"
              class="police-link">terms of
              service</a>
            & <a href="https://www.lucifercoffeeroasters.com/privacyverklaring/" target="_blank"
              class="police-link">privacy
              policies</a></p>
          </p>
          <input class="button-join-2" type="submit" value="join now" name = "submit_customer" >
        </form>
        
      </div>
    </div>
  </div>







</body>

</html>