<?php
session_start();
$isLogin = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)?true:false;

?>
<link rel="stylesheet" href="../css/initialize.css">
<link rel="stylesheet" href="../css/publicStyle.css">
<link rel="preconnect" href="https://fonts.googleapis.com"> 
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

<div class="top-tab menu background-color-f4Cf0a">
    <div class="top-left-info">
        <a class="home top-tab-item display-flex-center" onclick="top.location.href='../index.php'">HOME</a>
        <a class="profile top-tab-item display-flex-center" onclick="top.location.href='../profile.php'">PROFILE</a>
        <a class="library top-tab-item display-flex-center" onclick="top.location.href='../library.php'">LIBRARY</a>
        <a class="events top-tab-item display-flex-center" onclick="top.location.href='../events.php'">EVENTS</a>
        <a class="about top-tab-item display-flex-center" onclick="top.location.href='../about.php'">ABOUT</a>
    </div>
    <div class="top-right-info display-flex-center">
        <?php if ($isLogin){?>
            <a onclick="top.location.href='../../be/pgreq/logout.php'" class="loginBut">Sign out</a>
        <?php } else {?>
            <a onclick="top.location.href='../signin.php'" class="loginBut">SIGN IN/UP</a>
        <?php }?>
    </div>
</div>

<script>

</script>
