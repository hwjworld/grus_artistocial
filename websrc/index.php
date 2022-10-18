
<?php
require_once("../be/controller/artistocialController.php");

session_start();

$artistocial = new Artistocial();
$hotevents = $artistocial->getHotEvent();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DECO1800/7180 Artistocial Home</title>
    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/publicStyle.css">

</head>

<body>
<div class="content-info">

    <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.html"></iframe>

    <div class="index-top-d display-flex-center">
        <div class="index-top-info">
            <img class="main-logo" src="images/artistocial.png">
            <div style="font-size: 20px;font-weight: 600;">Play, Explore, and Make Friends</div>
            <div class="circle-button-d">
                <a class="circle-button " href="../websrc/artgallery/fronpage.html">GAME ENTRANCE</a>
                <div class="cartoon-body"><img class="w-100" src="images/index-img1.png"></div>
            </div>
            <!-- <div id="cartoon-right" class="cartoon">
                <img class="w-100" src="images/cartoonleft.png">
            </div>
            <div id="cartoon-left" class="cartoon">
                <img class="w-100" src="images/cartoonright.png">
            </div> -->
        </div>
    </div>

    <div class="carousel">
        <div class="color-000000 display-flex-center font-weight-600 library-title background-color-f4Cf0a">HOT EVENTS</div>
        <div class="carousel-info">
            <div class="spacer-bar background-color-000000"></div>
            <div class="wrapper">
                <div class="contain">
                    <?php foreach($hotevents as $k=>$v){ ?>
                    <img onclick="location.href='events.html'" src="<?php echo $v->eventImage;?>"/>
                    <?php } ?>
                    <!--last one-->


                    <!-- <img onclick="location.href='events.html'" src="images/hot_event_3.PNG"/>
                    <img onclick="location.href='events.html'" src="images/hot_event_2.PNG"/>
                    <img onclick="location.href='events.html'" src="images/hot_event_4.PNG"/>
                    <img onclick="location.href='events.html'" src="images/hot_event_5.PNG"/>
                    <img onclick="location.href='events.html'" src="images/hot_event_3.PNG"/> -->

                    <!--first two-->
                    <!-- <img onclick="location.href='events.html'" src="images/hot_event_1.PNG"/>
                    <img onclick="location.href='events.html'" src="images/hot_event_4.PNG"/> -->
                </div>
                <a href="javascript:void(0);">❮</a>
                <a href="javascript:void(0);">❯</a>
            </div>
            
            <!-- <div style="margin-bottom: 100px" class="display-flex-center font-weight-600 library-title background-color-000000">Name</div>
            <div class="btn">
                <span class="active"><img class="w-100 h-100" src="images/library-img1.png"/></span>
                <span><img class="w-100 h-100" src="images/library-img2.png"/></span>
                <span><img class="w-100 h-100" src="images/index-img1.png"/></span>
                <span><img class="w-100 h-100" src="images/events-img1.png"/></span>
                <span><img class="w-100 h-100" src="images/events-img2.png"/></span>
            </div> -->
            <!-- <div class="spacer-bar background-color-000000"></div> -->
        </div>
    </div>

    <div class="index-last-d">
        <!-- <button class="art-collection font-size-24 background-color-f4Cf0a">Art Collection</button> -->
        <div class="index-last-map background-color-f4Cf0a">
            <p class="map">
                <iframe src="https://www.google.com/maps/d/embed?mid=150bsImcNATOVASRK9Iwf9V0FiNMXgio&ehbc=2E312F" width="1000" height="600" ></iframe>
            </p>
        </div>
    </div>


    <iframe frameborder="no" scrolling="no" class="w-100-iframe footer-iframe" src="layout/footer.html?color=F4CF0A"></iframe>
</div>
</body>
<script type="text/javascript" src="js/carousel.js"></script>
</html>
