<?php  
session_start();
include("conection.php");
include("checkPoints.php");
?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['password'];
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
    <title>10% discount on coffee beans</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/header-style.css">
    <link rel="stylesheet" href="../css/pop-up-style.css">
    <link rel="stylesheet" href="../css/one-reward-style.css">
    <link rel="stylesheet" href="../css/footer-style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Icons footer-->
</head>

<body>
    <header class="header">
        <div class="logo" id="location">
            <a href="locations.php">
<<<<<<<< HEAD:reward2.php
                <img src="images/location.png" alt="">
========
                <img src="../images/location.png" alt="">
>>>>>>>> 456d00b247a7c64786a110be817241dfa9503378:rewards-description-pages/reward2.php
            </a>
            <a href="locations.php" class="store_locator_text">Store locator</a>
        </div>
        <div class="logo" id="box">
<<<<<<<< HEAD:reward2.php
            <a href="index.php"><img src="images/logo lucifer.png" alt="lucifer loyalty program logo"></a>
========
            <a href="index.php"><img src="../images/logo lucifer.png" alt="lucifer loyalty program logo"></a>
>>>>>>>> 456d00b247a7c64786a110be817241dfa9503378:rewards-description-pages/reward2.php
        </div>
        <div class="logo" id="box"></div>
    </header>
    </header>
    <nav class="navbar">
    <ul class="navbar-mobile">
        <input type="checkbox" id="checkbox_toggle"/>
            <label for="checkbox_toggle" class="hamburger">&#9776;</label>
                <div class="points-mobile">
                    <p>12</p>
                    <img src="../images/matchstick-lucifer.png" alt="points">
                </div>            
            <div class="menu" id="mobile">
                <div class="mobile">
                    <li class="left" id="selected"><a href="index.php">Home</a></li>
                    <li class="left"><a href="rewards.php">Rewards</a></li>
                    <li class="left"><a href="challenge.php">Challenges</a></li>
                    <li class="left"><a href="sponsor.php">Sponsors</a></li>
                    <li class="left"><a href="contact.php">Contact us</a></li>
                    <li class="right"><a href="profile.php">Profile</a></li>
                    <!-- desktop version -->
                    <li class="right-mobile">
<<<<<<<< HEAD:reward2.php
                        <a href="profile.php"><img src="images/user.png" alt=""></a>
                    </li>
                    <li class="right-mobile" id="points"><a href="profile.php">12<img src="images/matchstick-lucifer.png" alt="" ></a></li>
========
                        <a href="profile.php"><img src="../images/user.png" alt=""></a>
                    </li>
                    <li class="right-mobile" id="points"><a href="profile.php">12<img src="../images/matchstick-lucifer.png" alt="" ></a></li>
>>>>>>>> 456d00b247a7c64786a110be817241dfa9503378:rewards-description-pages/reward2.php
                </div>
            </div>
        </ul>
    </nav>
    <div class="hero">
        <p class="hero-text">Rewards</p>
        <img src="../images/rewards-hero.png" alt="hero-image">
    </div>
    <div class="reward-box">
        <div class="image-reward-box">
            <img src="../images/coffee-beans-bag.png" alt="discount-coffee-beans">
        </div>
        <div class="text-reward-box">
            <div class="title-reward">10% discount on coffee beans</div>
            <div class="other-text-reward-box">Spend 20 match sticks to use this reward anytime you want. When using this reward you can get a 10% discount on coffee beans. <br>Click the button below to confirm that you want to spend your points on this.</div>
            <div id="popUpOverlay"></div>
            <div id="popUpBox">
                <div class="text-popUpBox">
                    <p class="success">Successfully claimed!</p>
                    <img src="../images/checkbox.png" alt="">
                    <div class="buttons-popup">
                        <div id="closeModal-close">
                            <button onclick="Alert.ok(this)">Close</button>
                        </div>
                    </div>
                    <p>Visit profile page to use reward</p>
                </div>
            </div>
            <button onclick="Alert.render(this)" class="btn">Use points</button>
            <br>
            <br>
<<<<<<<< HEAD:reward2.php
            <a href="rewards.php">Go back to rewards</a>
========
            <a href="../rewards.php">Go back to rewards</a>
>>>>>>>> 456d00b247a7c64786a110be817241dfa9503378:rewards-description-pages/reward2.php
        </div>
    </div>
    <footer>
        <div class="both">
            <div class="left-part-footer">
                <div class="logo-footer">
                    <img src="../images/logo lucifer.png" alt="logo">
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
                <img class="footer_line" src="../../images/line_17.png">
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
                        <p><a href="sponsor.<i class="fas fa-pencil-paintbrush    "></i>">Sponsor</a></p>
                    </div>
                    <div class="social-media">
                        <a href="https://www.facebook.com/lucifercoffeeroasters" target="_blank"><img class="facebook" src="../images/facebook.png" alt="facebook"></a>
                        <a href="https://www.instagram.com/lucifer.coffee.roasters/" target="_blank"><img class="instagram" src="../images/instagram.png" alt="instagram"></a>
                        <a href="https://nl.linkedin.com/company/lucifer-coffee-roasters" target="_blank"><img class="linkedin" src="../images/in.png" alt="linkedin"></a>
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