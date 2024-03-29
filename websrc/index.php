<?php
require_once("../be/controller/artistocialController.php");
require_once("../be/controller/userController.php");

session_start();
$isLogin = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)?true:false;

$artistocial = new Artistocial();
if($isLogin){
    $uid = $_SESSION['id'];
    $user = new User();
    $u = $user->getUserById($uid);
    
    $hotevents = $artistocial->getRecommendEvent($uid);
    $artcollections = $artistocial->getRecommendArtCollection($uid);
}else{
    $hotevents = $artistocial->getHotEvent();
    $artcollections = $artistocial->getAllArtcollection();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>DECO1800/7180 Artistocial Home</title>
    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/publicStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn-3ZYPIeHEfnJfB9_soI5mArlM9oISag&callback=initMap"></script>



</head>

<body>
    <div class="content-info">

        <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.php"></iframe>

        <div class="index-top-d display-flex-center">
            <div class="index-top-info">
                <img class="main-logo" src="images/artistocial.png">
                <div style="font-size: 20px;font-weight: 600;">Play, Explore, and Make Friends</div>
                <div class="circle-button-d">
                    <a class="circle-button " href="../websrc/artgallery/fronpage.html">GAME ENTRANCE</a>
                    <div class="cartoon-body"><img class="w-100" src="images/index-img1.png"></div>
                </div>
                <div id="cartoon-right" class="cartoon">
                <img class="w-100" src="images/cartoonleft.png">
            </div>
            <div id="cartoon-left" class="cartoon">
                <img class="w-100" src="images/cartoonright.png">
            </div>
            </div>
        </div>

        <div class="carousel">
            <div class="color-000000 display-flex-center font-weight-600 library-title background-color-f4Cf0a">HOT EVENTS</div>
            <div class="carousel-info">
                <div class="spacer-bar background-color-000000"></div>
                <div class="wrapper">
                    <div class="contain">
                        <?php foreach ($hotevents as $k => $v) { ?>
                            <img onclick="location.href='eventInfo.php?eid=<?php echo $v->id; ?>'" src="<?php echo $v->eventImage; ?>" />
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
                <div class="spacer-bar background-color-000000"></div>
            </div>
        </div>

        <div class="index-last-d">

            <!-- <button class="art-collection font-size-24 background-color-f4Cf0a">Art Collection</button> -->


        </div>


        <div class="color-000000 display-flex-center font-weight-600 library-title background-color-f4Cf0a">ART COLLECTIONS</div>
        <div class="library-last-d flex-space-between-center">
            <div class="library-last-left-info background-color-000000">
                <?php foreach($artcollections as $k=>$v){ ?>
                <div class="library-last-left-item background-color-ffffff" onclick="setNewMapPoint(<?php echo '\''.$v->latitude.'\',\''.$v->longitude.'\',\''.str_replace('\'','', htmlspecialchars($v->description)).'\'';?>);">
                    <img src="images/note.jpg">
                    <?php echo $v->title; ?>
                </div>
                <?php }?>
            </div>
            <div class="library-last-right-info background-color-f4Cf0a">

            <div class="index-last-map background-color-f4Cf0a">
                <p class="map">
                <div id="map" style="width:900px; height: 600px; display:flex; fl"></div>
                </p>
                
            </div>

            </div>
        </div>


        <script type="text/javascript" src="js/carousel.js"></script>
    <script language="javascript">
        function initMap() {
            const myLatLng = { lat: <?php echo $artcollections[0]->latitude; ?>, lng: <?php echo $artcollections[0]->longitude; ?> };

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: myLatLng,
            });
            var beachMarker = new google.maps.Marker({
                position: myLatLng,
                map,
                title: `<?php echo $artcollections[0]->description; ?>`,
            });
            const infoWindow = new google.maps.InfoWindow();

            // marker.setMap(map);
            beachMarker.addListener("click", () => {
                infoWindow.close();
                infoWindow.setContent(beachMarker.getTitle());
                infoWindow.open(beachMarker.getMap(), beachMarker);
            });
            

        }

        function setNewMapPoint(lat_v, lng_v, description_v){
            var infoWindow = new google.maps.InfoWindow();
            var myLatlng = new google.maps.LatLng(lat_v,lng_v);
            var mapOptions = {
                zoom: 15,
                center: myLatlng
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var marker = new google.maps.Marker({
                position: myLatlng,
                title:description_v
            });
            marker.setMap(map);
            marker.addListener("click", () => {
                infoWindow.close();
                infoWindow.setContent(marker.getTitle());
                infoWindow.open(marker.getMap(), marker);
            });

            // To add the marker to the map, call setMap();
        }
        window.onload = initMap;
            // google.maps.event.addDomListener(window, 'load', initMap);
    </script>

        <iframe frameborder="no" scrolling="no" class="w-100-iframe footer-iframe" src="layout/footer.php?color=F4CF0A"></iframe>
    </div>
</body>
<script type="text/javascript" src="js/carousel.js"></script>

</html>