<?php
require_once("../be/controller/artistocialController.php");
// require_once(__DIR__ . "/../tools/curl.php");
// require_once(__DIR__ . "/../tools/constants.php");
// require_once(__DIR__ . "/../controller/artistocialController.php");
// require_once(__DIR__ . "/../model/artistocialLibrary.php");

session_start();

$artistocial = new Artistocial();   
$hotevents = $artistocial->getHotEvent();
// $library = $artistocial->getLibrary($model->resourceId);
// $evetlocations = $artistocial->getEventLocation();
$eventlocation = [$artistocial->getEventLocation(1),
    $artistocial->getEventLocation(2),
    $artistocial->getEventLocation(3),
    $artistocial->getEventLocation(4),
    $artistocial->getEventLocation(5)];






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DECO1800/7180 Artistocial Home</title>
    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/publicStyle.css?v=1">
</head>

<body>
<div class="content-info">

    <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.php"></iframe>

    <div style="padding-left: 4em" class="library-title background-color-139E06">LIBRARIES IN BRISBANE</div>

    <div class="library-info">
        <!-- <div>THE LIBRARY MAP</div> -->
        <!-- <div class="map-info">
            <p class="map">
                <iframe src="https://www.google.com/maps/d/embed?mid=1NwF1n58Vpfmy0JpAR0JvgQGV8zFjMPU&ehbc=2E312F" width="1000" height="480"></iframe>
            </p>
        </div> -->
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script>
        var myMap;
        var myLatlng = new google.maps.LatLng(52.518903284520796,-1.450427753967233);
        function initialize() {
        var mapOptions = {
            zoom: 13,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP  ,
            scrollwheel: false
        }
        myMap = new google.maps.Map(document.getElementById('map'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: myMap,
            title: 'Name Of Business',
            icon: 'http://www.google.com/intl/en_us/mapfiles/ms/micons/red-dot.png'
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <div id="map" style="width:500px; height: 500px;">

</div>
        <div class="search-map-d">
            <input placeholder="search on map"/>
            <div class="search-icon"><svg t="1664933889901" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2543" width="40" height="40"><path d="M966.4 924.8l-230.4-227.2c60.8-67.2 96-156.8 96-256 0-217.6-176-390.4-390.4-390.4-217.6 0-390.4 176-390.4 390.4 0 217.6 176 390.4 390.4 390.4 99.2 0 188.8-35.2 256-96l230.4 227.2c9.6 9.6 28.8 9.6 38.4 0C979.2 950.4 979.2 934.4 966.4 924.8zM102.4 441.6c0-185.6 150.4-339.2 339.2-339.2s339.2 150.4 339.2 339.2c0 89.6-35.2 172.8-92.8 233.6-3.2 0-3.2 3.2-6.4 3.2-3.2 3.2-3.2 3.2-3.2 6.4-60.8 57.6-144 92.8-233.6 92.8C256 780.8 102.4 627.2 102.4 441.6z" p-id="2544" fill="#6C6C6C"></path></svg></div>
        </div>
        <div class="library-last-d flex-space-between-center">
            <div class="library-last-left-info background-color-000000">
                <div class="library-last-left-item background-color-ffffff" onclick="selectTab(0, 'library-last-right-item')">
                    <img src="images/note.jpg">
                    State Library of Queensland
                </div>
                <div class="library-last-left-item background-color-ffffff" onclick="selectTab(1, 'library-last-right-item')">
                    <img src="images/note.jpg">
                    State Library of Queensland
                </div>
                <div class="library-last-left-item background-color-ffffff" onclick="selectTab(2, 'library-last-right-item')">
                    <img src="images/note.jpg">
                    State Library of Queensland
                </div>
            </div>
            <div class="library-last-right-info background-color-f4Cf0a">
                <div class="library-last-right-item">
                    <div class="library-last-right-title">Annerley Library 1</div>
                    <div class="flex-space-between">
                        <div class="w-50">
                            <p>
                                Library address:<br/>
                                450 Ipswich Road 4103 QLD
                            </p>
                            <p>
                                Contack:<br/>
                                Email:<br/>
                                ann@Brisbane.qld.gov.au<br/>
                                Phone:<br/>
                                +31-733403-1735<br/>
                            </p>
                            <p>
                                Council:<br/>
                                Brisbane City Council Wi-Fi available
                            </p>
                        </div>
                        <div class="w-50">
                            <p>
                                Opening Houres:
                            </p>
                            <p>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="library-last-right-item" style="display: none">
                    <div class="library-last-right-title">Annerley Library 2</div>
                    <div class="flex-space-between">
                        <div class="w-50">
                            <p>
                                Library address:<br/>
                                450 Ipswich Road 4103 QLD
                            </p>
                            <p>
                                Contack:<br/>
                                Email:<br/>
                                ann@Brisbane.qld.gov.au<br/>
                                Phone:<br/>
                                +31-733403-1735<br/>
                            </p>
                            <p>
                                Council:<br/>
                                Brisbane City Council Wi-Fi available
                            </p>
                        </div>
                        <div class="w-50">
                            <p>
                                Opening Houres:
                            </p>
                            <p>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="library-last-right-item" style="display: none">
                    <div class="library-last-right-title">Annerley Library 3</div>
                    <div class="flex-space-between">
                        <div class="w-50">
                            <p>
                                Library address:<br/>
                                450 Ipswich Road 4103 QLD
                            </p>
                            <p>
                                Contack:<br/>
                                Email:<br/>
                                ann@Brisbane.qld.gov.au<br/>
                                Phone:<br/>
                                +31-733403-1735<br/>
                            </p>
                            <p>
                                Council:<br/>
                                Brisbane City Council Wi-Fi available
                            </p>
                        </div>
                        <div class="w-50">
                            <p>
                                Opening Houres:
                            </p>
                            <p>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                                Monday 10am-5pm<br/>
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

  
    <iframe frameborder="no" scrolling="no" class="w-100-iframe footer-iframe" src="layout/footer.php?color=139E06"></iframe>
</div>
</body>
<script type="text/javascript" src="js/selectTab.js"></script>
</html>

