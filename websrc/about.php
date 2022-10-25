<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DECO1800/7180 Artistocial Home</title>
    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/publicStyle.css?v=1">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <script type="text/javascript" src="js/selectTab.js"></script>
</head>
<body>
    <div class="content-info">
        <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.php"></iframe>
        <div style="padding-left: 4em" class="library-title background-color-000000 ">SOMETHING ABOUT ARTISTOCIAL...</div>
            <div class="index-top-info">
                <!-- <div id="cartoon-right" class="cartoon">
                <img class="w-100" src="images/cartoonleft.png">
            </div>
            <div id="cartoon-left" class="cartoon">
                <img class="w-100" src="images/cartoonright.png">
            </div> -->
            </div>
        <!-- <div class="carousel">
            <div class="carousel-info">
                <div class="wrapper">
                    <div class="contain">
                    <img src="images/about1.PNG">
                    </div>
                </div>
            </div>
        </div> -->
        <div class="index-last-d">
            <!-- <button class="art-collection font-size-24 background-color-f4Cf0a">Art Collection</button> -->
            <div class="index-last-map">
            <img src="images/about1.PNG">
            </div>
        </div>
        <div class="index-last-d">
            <!-- <button class="art-collection font-size-24 background-color-f4Cf0a">Art Collection</button> -->
            <div class="index-last-map">
            <img src="images/about2.PNG">
            </div>
        </div>
        <div class="index-last-d">
            <!-- <button class="art-collection font-size-24 background-color-f4Cf0a">Art Collection</button> -->
            <div class="index-map">
            <img src="images/about3.PNG">
            </div>
        </div>
    </div>
    </div>
</body>
<div id="about-content" class="about-content">
    <div class="footer-left-info-about">
        Contact us:<br/>
        Email: Artistocial@uqconnect.edu.au<br/>
        Address: Artanywhere, St. Lucia QLD 4072
    </div>
    <div class="footer-right-info-about">
        <div class="footer-face-about">
            <div class="left-eye-footer-about"></div>
            <div class="right-eye-footer-about"></div>
            <div class="footer-noth-about">
                <div id="footer-botface-about" class="footer-botface-about"></div>
            </div>
            <div class="footer-mouse-about"></div>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        let parameters = getRequest()
        let footerDom = document.getElementById("about-content");
        let botfaceDom = document.getElementById("footer-botface-about");
        if (parameters.hasOwnProperty("color")) {
            footerDom.style.background = "#" + parameters["color"];
            botfaceDom.style.background = "#" + parameters["color"];
        } else {
            footerDom.style.background = "#000000";
            botfaceDom.style.background = "#000000";
        }
    }
</script>
</html>