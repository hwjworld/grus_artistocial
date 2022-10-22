<?php
require_once("../be/controller/artistocialController.php");

session_start();

$artistocial = new Artistocial();
$hotevents = $artistocial->getHotEvent();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DECO1800/7180 Artistocial SignIn</title>
    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/publicStyle.css">
    <link rel="stylesheet" href="css/signin.css">
</head>

<body>
    <div class="content-info">
        
        <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/signinTop.html"></iframe>
        <div class="logo-image">
            <img src="images/artistocial.png" width="230" height="100">
        </div>
        <div class="yellow-background"></div>
        <input class="blank-a" type="email" name="email" required=""/>
        <input class="blank-b" type="email" name="email" required=""/>
        <span class="top-signin">SIGN IN</span>
        
        <span class="email-style">Email Address:</span>
        <span class="password-style">Password:</span>
        <div class="button-style">
            <div class="continue-button"></div>
            <span class="continue-style">Continue</span>
        </div>
        <div class="google-button"></div>
        <span class="google-style">Continue with Google</span>
        <div class="Facebook-button"></div>
        <div class="new-button"></div>
        <span class="Facebook-style">Continue with Facebook</span>
        <span class="new-style">New User? Sign Up!</span>
        <span class="or-style">------------------Or------------------</span>
    </div>
</body>

</html>
</body>

</html>
