<?php  
session_start();
include("conection.php");
include("checkPoints.php");
?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$lastName = $_SESSION['lastName'];
if($email != false && $password != false){
    $sql = "SELECT * FROM customer WHERE email = '$email'";
    $run_Sql = mysqli_query($db_connection, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $code = $fetch_info['code'];
            if($code != 0){
                header('Location: code-verification.php');
            }
        //else{
         //   header('Location: user-otp.php');
       // }
    }
}else{
    header('Location: login.php');
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loyalties of Lucifer</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/profile-style.css">
    <link rel="stylesheet" href="css/rewards-style.css">
    <link rel="stylesheet" href="css/pop-up-style.css">
    <link rel="stylesheet" href="css/footer-style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Icons footer-->
</head>

<body>
    <header class="header">
        <div class="logo" id="location">
            <a href="locations.php">
                <img src="images/location.png" alt="">
            </a>
            <a href="locations.php" class="store_locator_text">Store locator</a>
        </div>
        <div class="logo" id="box">
            <a href="index.php"><img src="images/logo lucifer.png" alt="lucifer loyalty program logo"></a>
        </div>
        <div class="logo" id="box"></div>
    </header>
    <nav class="navbar">
        <ul>
            <input type="checkbox" id="checkbox_toggle" />
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
            <div class="menu" id="mobile">
                <div class="mobile">
                    <li class="left"><a href="index.php">Home</a></li>
                    <li class="left"><a href="rewards.php">Rewards</a></li>
                    <li class="left"><a href="challenge.php">Challenges</a></li>
                    <li class="left"><a href="sponsor.php">Sponsors</a></li>
                    <li class="left"><a href="contact.php">Contact us</a></li>
                    <li class="right"><a href="profile.php">Profile</a></li>
                    <li class="right-mobile">
                        <a href="profile.php"><img src="images/user.png" alt=""></a>
                    </li>
                    <li class="right-mobile" id="points"><a href="profile.php"><?php echo $row['loyalty_points'];?><img src="images/matchstick-lucifer.png" alt="" ></a></li>
                    <!-- <li class="right-mobile">13</li> -->
                </div>
            </div>
        </ul>
    </nav>
    <?php echo "<h1>".$row['loyalty_points']."</h1>"; ?>
    <div class="hero">
        <p class="hero-text">My profile</p>
        <img src="images/hero-profile.png" alt="coffee-beans">
    </div>
    <!-- End of header, menu, hero -->
    <div class="title-profile">Hello <?php echo "$lastName" ;?>, all of your claimed rewards are stored here.</div>
    <div class="green-box-content">
        <div class="first-content" id="profile-picture">
            <img src="https://picsum.photos/id/237/284/340" alt="">
        </div>
        <div class="first-content" id="info-user">
            <div class="text-first-content">
                <br><br><br>
                <?php if (isset($_SESSION['success'])){
                 echo $_SESSION['success'];

               
                echo '<h3> Email : '.$_SESSION['email']. '</h3>';
                }else{
                    header( "location : login.php");
                    
                }?> 
    
                <br>
                <p class="logout">
                    <a href="logout.php">Logout</a>
                </p>
            </div>
        </div>
        <div class="first-content" id="matchstick">
            <!-- <div class="points-first-content"> -->
            <img src="images/matchstick-lucifer.png" alt="">
            <p>
            
            Collected:  <?php echo $row['loyalty_points'];?></p>
            <!-- </div> -->
        </div>

    </div>

    <div class="steps-claim-reward">
        <div class="title-claim-reward">How do I activate my reward?</div>
        <div class="two-steps">
            <div class="steps" id="text">
                <p>You need to click on the reward and click 'use points' to start the timer.</p>
            </div>
            <div class="steps" id="image">
                <img src="images/image 55.png" alt="">
            </div>
        </div>
        <div class="two-steps">
            <div class="steps" id="image">
                <img src="images/image 30.png" alt="">
            </div>
            <div class="steps" id="text">
                <p>You will then have 15 seconds to show our barista that you activated your reward.</p>
            </div>
        </div>
        <div class="two-steps">
            <div class="steps" id="text">
                <p>After the timer has run out, the timer will be expired and can no longer be used.</p>
            </div>
            <div class="steps" id="image">
                <img src="images/image 31.png" alt="">
            </div>
        </div>
    </div>

    <div class="title-claim-reward">Claimed rewards:</div>
    <div class="claimed-rewards">
        <div class="rewards-1">
            <!-- 1 -->
            <div id="myDIV" class="mystyle">
                <div class="one-reward">
                    <div class="box">
                        <img src="images/sandwich.png" alt="random">
                    </div>
                    <div class="box-under-box">
                        <div class="box-text-left">
                            <div class="box-title">
                                <p>Free sandwich</p>
                            </div>
                        </div>
                        <div class="box-text-right">
                            <div id="popUpBox">
                                <div class="text-popUpBox">
                                    <p class="success"> You Successfully claimed the reward, show this to the barista to use it at Lucifer Coffee Roasters. Enjoy!</p>
                                    <!-- <img src="images/checkbox.png" alt=""> -->
                                    <div class="buttons-popup">
                                        <div id="closeModal-close">
                                            <button onclick="Alert.ok()">Close</button>
                                            <button class="confirm-1">Confirm</button>
                                        </div>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                            <button onclick="Alert.render()" class="btn">Use reward</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rewards-2">
            <!-- 1 -->
            <div id="myDIV" class="mystyle">
                <div class="one-reward">
                    <div class="box">
                        <img src="images/beer.png" alt="random">
                    </div>
                    <div class="box-under-box">
                        <div class="box-text-left">
                            <div class="box-title">
                                <p>Free beer</p>
                            </div>
                        </div>
                        <div class="box-text-right">
                            <div id="popUpBox">
                                <div class="text-popUpBox">
                                    <p class="success"> You Successfully claimed the reward, show this to the barista to use it at Lucifer Coffee Roasters. Enjoy!</p>
                                    <!-- <img src="images/checkbox.png" alt=""> -->
                                    <div class="buttons-popup">
                                        <div id="closeModal-close">
                                            <button onclick="Alert.ok()">Close</button>
                                            <button class="confirm-2">Confirm</button>
                                        </div>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                            <button onclick="Alert.render()" class="btn">Use reward</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rewards-3">
            <!-- 1 -->
            <div id="myDIV" class="mystyle">
                <div class="one-reward">
                    <div class="box">
                        <img src="images/coffee-cup.png" alt="random">
                    </div>
                    <div class="box-under-box">
                        <div class="box-text-left">
                            <div class="box-title">
                                <p>Free coffee</p>
                            </div>
                        </div>
                        <div class="box-text-right">
                            <div id="popUpBox">
                                <div class="text-popUpBox">
                                    <p class="success"> You Successfully claimed the reward, show this to the barista to use it at Lucifer Coffee Roasters. Enjoy!</p>
                                    <!-- <img src="images/checkbox.png" alt=""> -->
                                    <div class="buttons-popup">
                                        <div id="closeModal-close">
                                            <button onclick="Alert.ok()">Close</button>
                                            <button class="confirm-3">Confirm</button>
                                        </div>
                                    </div>
                                    <p></p>
                                </div>
                            </div>
                            <button onclick="Alert.render()" class="btn">Use reward</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- beginning of footer -->
    <footer>
        <div class="both">
            <div class="left-part-footer">
                <div class="logo-footer">
                    <img src="images/logo lucifer.png" alt="logo">
                </div>
                <div class="contact-info">
                    <div class="contact-phone">
                        <i class="material-icons">phone</i><a href="tel:+39 834 37849">+39 834 37849</a>
                    </div>
                    <div class="contact-email">
                        <i class="material-icons">email</i><a href="mailto:loyaltiesoflucifer@gmail.com">loyaltiesoflucifer@gmail.com</a>
                    </div>
                </div>

            </div>
            <div class="middle_part">
                <img class="footer_line" src="/images/line_17.png">
            </div>
            <div class="right-part-footer">
                <div class="page-links">
                    <div class="all-links">
                        <a href="index.php">Homepage
                            <span class="border border-top"></span>
      <span class="border border-right"></span>
      <span class="border border-bottom"></span>
      <span class="border border-left"></span>
                        </a>
                        <p><a href="contact.php">Contact us</a>
                            <a href="locations.php">Locations</a>
                            <a href="rewards.php">Rewards</a>
                            <a href="challenge.php">Challenges</a>
                            <a href="sponsor.php">Sponsor</a></p>
                    </div>
                    <!-- mobile version -->
                    <div class="three-links">
                        <p><a href="index.php">Homepage</a></p>
                        <p><a href="contact.php">Contact us</a></p>
                        <p><a href="locations.php">Locations</a></p>
                    </div>
                    <div class="three-links">
                        <p><a href="rewards.php">Rewards</a></p>
                        <p><a href="challenge.php">Challenges</a></p>
                        <p><a href="sponsor.php">Sponsor</a></p>
                    </div>
                    <div class="social-media">
                        <img class="facebook" src="images/facebook.png" alt="facebook">
                        <img class="instagram" src="images/instagram.png" alt="instagram">
                        <img class="in" src="images/in.png" alt="in">
                    </div>
                </div>
                <div class="copyright">
                    <p>©UDIAC 2021</p>
                </div>
            </div>
        </div>
    </footer>

</body>

<script src="/js/pop-up-reward.js"></script>

</html>