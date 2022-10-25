<?php
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>DECO1800/7180 Artistocial SignIn</title>
    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/publicStyle.css">
    <link rel="stylesheet" href="css/signin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>
    <div class="content-info">
        
        <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/signinTop.php"></iframe>
        <div class="logo-image">
            <img src="images/artistocial.png" width="230" height="100">
        </div>
        <div class="yellow-background"></div>
        <input class="blank-a" type="email" name="email" id="f_name" required=""/>
        <input class="blank-b" type="password" name="password" id="f_password" required=""/>
        <span class="top-signin">SIGN IN</span>
        <form action="../be/pgreq/signin.php" method="POST" id="login-form">
        <span class="email-style">Email Address:</span>
        <span class="password-style">Password:</span>
        <div class="button-style">
            <div class="continue-button"></div>
            <span class="continue-style" id="submit_button">Sign in</span>
        </div>
        <div class="google-button"></div>
        <span class="google-style">Continue with Google</span>
        <div class="Facebook-button"></div>
        <div class="new-button"></div>
        <span class="Facebook-style">Continue with Facebook</span>
        <span class="new-style"><a href="signup.php">New User? Sign Up!</a></span>
        <span class="or-style">------------------Or------------------</span>
    </div>
   
    <script language="javascript">
        $("#submit_button").click(function(){$("#login-form").submit();});
        $("#login-form").submit(function(e) {
            e.preventDefault(); // avoid to execute the actual submit of the form.
            var form = $(this);
            var actionUrl = form.attr('action');
            $.ajax({
                type: "POST",
                url: actionUrl,
                // dataType: "text",
                data: {email:$("#f_name").val(),password:$("#f_password").val()}, // serializes the form's elements.
                success: function(data)
                {
                    if(data.indexOf("login successful")>=0){
                        alert("login successful");
                        top.location.href="../websrc/";
                    }else{
                        alert(data); // show response from the php script. 
                    }
                }
            });

            });

    </script>
</body>



</html>

