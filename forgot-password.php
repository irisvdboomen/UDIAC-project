<?php
include("conection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require "phpmailer/Exception.php";
require "phpmailer/PHPMailer.php";
require "phpmailer/SMTP.php";
    if(isset($_POST['but_forget'])){
      $email = mysqli_real_escape_string($db_connection, $_POST['email']);
      $check_email = "SELECT * FROM customer WHERE email='$email'";
      $run_sql = mysqli_query($db_connection, $check_email);
      if(mysqli_num_rows($run_sql) > 0){
          $code = rand(999999, 111111);
          $insert_code = "UPDATE customer SET code = $code WHERE email = '$email'";
          $run_query =  mysqli_query($db_connection, $insert_code);
          if($run_query){
            $your_pcn="450256"; //Fill in your PCN number (6 numbers)
            $your_name="Loyalties of Lucifer"; //Fill in your name
            $recipient_emailaddress="$email"; //Fill in the emailaddress of the recipient
            $recipient_name="Dear Customer"; //Fill in the name of the recipient
            $subject="Password Reset Code"; //Fill in the subject
            $html_body="Your password reset code is $code"; //Fill in the HTML content
            $text_body="Your password reset code is $code"; //Fill in the textual content
            
            //Actual sending of the mail
            $mail=new PHPMailer();
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->isSMTP();
            $mail->Host="mailrelay.fhict.local";
            $mail->Port=25;    
            $mail->SMTPAuth=false;
            $mail->setFrom("i".$your_pcn."@hera.fhict.nl",$your_name); //PUT YOUR I-account number here
            $mail->addReplyTo("i".$your_pcn."@hera.fhict.nl",$your_name);
            $mail->addAddress($recipient_emailaddress,$recipient_name);
            $mail->Subject=$subject;
            $mail->isHTML(true);                                  
            $mail->Body=$html_body;
            $mail->AltBody=$text_body;
            if(!$mail->send()){
                //Do something when the message is not send
                echo 'Mailer Error: ' . $mail->ErrorInfo; //UNCOMMENT FOR DEBUG
            } else {
              header('location:link-sent-succ.php');
                //Do something when the message is send!
                echo 'Message sent!'; //UNCOMMENT FOR DEBUG
                exit();
            }
          }
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
      <div class="logo-lucifer-box">
      <img class="logo-lucifer" src="images/logo lucifer.png" alt="" onclick="location.href='index.php'">
      </div>
      
      <!--reset password instructions-->
        <br><br><p class="">Enter your registered email</p><br>
        <p class="">We will send you a code to reset your password.</p>
        

        <form  class="form-inputs" action="" method="post">
          <!--email-->
          <br><br>
          <label class="label-email-3" for="email">email</label>
          <input class="input-email-3"  required type="email" id="email" name="email" placeholder="Your email..">


          <div class="forgotpass-btn-box">
          <!--btn cancel-->
          <input class="button-cancel" type="submit" value="cancel" onclick="location.href='login.php'">
          <!--btn send-->
          <input class="button-send" type="submit" value="send" onclick="location.href='link-sent-succ.php'" name = "but_forget">
        </div>

        </form>
      </div>
    </div>
  </div>
</body>

</html>