
<?php
require_once("../be/controller/artistocialController.php");

session_start();

$eventlocation = [];
foreach($hotevents as $k=>$v){
    $location = $artistocial->getLocationFromEventId($v->id);
    if(!is_null($location)){
        array_push($eventlocation, $location);
    }
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
    <script type="text/javascript" src="js/selectTab.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn-3ZYPIeHEfnJfB9_soI5mArlM9oISag&callback=initMap"></script>
    <script type="text/javascript" src="js/selectTab.js"></script>
</head>

<body>
<div class="content-info">

    <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.php"></iframe>
    <div style="padding-left: 4em" class="library-title background-color-FF3131">ART EVENTS IN BRISBANE </div>
    <div class="events-content events-tab-info">
        <!-- <div class="sort-text">sort by popular</div> -->
       


    <div class="events-content-details events-tab-info background-color-f4Cf0a" >
        <div class="events-item-details w-1270 background-color-ffffff">
            <a href="#" onclick="window.close();"><div class="close-events-item-details"><img class="w-100" src="images/close.png"></div></a>

            <div class="events-item-details-top flex-space-between-center">
                <div class="events-item-sketch">
                    <div class="font-size-30" style="padding-bottom: 50px">Saturday Night Comedy</div>
                    <div class="font-size-20">MULTIPLE DATES<br>by Big Fork Theatre<br>Follow<br>196 followers</div>

                    <!-- <button id="btnnn">Like</button> -->
                    <input onclick="change()" type="button" value="Attend" id="myButton1" class="select-info"></input>
                    <!-- <select class="select-info">
                        <option>Like</option>
                        <option>Dislike</option>
                    </select> -->
                </div>
                <div style="width: 615px;height: 314px;"><img class="w-100 h-100" src="images/1664892662815.jpg"></div>
            </div>

            <div class="w-1156 font-size-30">
                <p>About this event</p>
                <p>
                    <span style="color: #FF3131">Saturday night comedy is back! Bigger and better than ever before at Big Fork Theatre.</span><br/>
                    Improv, sketch, stand up and more – every Saturday features a rotating tap of some of the best comedy shows on offer from Brisbane and beyond. Check our Instagram and Facebook page each week for line up announcements!
                </p>
                <p>
                    From fully improvised shows from the Brisbane Comedy Festival, the hottest sketch comedy written every month, to special guest stand-up comedians – it’s a smorgasbord of the hottest comedy shows going round.
                </p>
                <p>
                    This comedy TOUR DE FORCE is not to be missed and is a great night out in the heart of Brisbane, right around the corner from the best bars and restaurants in Fortitude Valley. Grab you friends, your family, your co-workers and yourself and head to Big Fork Theatre this Saturday!
                </p>
                <p>
                    COVID-19: Please read Big Fork Theatre’s COVID-19 policies here.<br/>
                    REFUND POLICY: Cancellations made 24 hours prior to the show start time will receive a full refund. Cancellations within 24 hours of the commencement time can transfer tickets to a future show. No shows will not receive a refund. Please contact us with any questions.
                </p>
                <p>Location</p>

                <div class="events-right-info">
                <div class="map-distribution">
                    <div id="map" style="width: 1160px;; height: 500px;"></div>
                </div>
            </div>
                <script type="text/javascript" src="js/carousel.js"></script>
                <script language="javascript">
                function initMap() {
                    const myLatLng = { lat: -27.54443, lng: 153.088797 };
                    const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 14,
                    center: myLatLng,
                });
                 var beachMarker = new google.maps.Marker({
                    position: myLatLng,
                    map,
                });
                const infoWindow = new google.maps.InfoWindow();

                // beachMarker.addListener("click", () => {
                //     infoWindow.close();
                //     infoWindow.setContent(beachMarker.getTitle());
                //     infoWindow.open(beachMarker.getMap(), beachMarker);
                // });
            }
            window.onload = initMap;
            </script>
            </div>
        </div>
    </div>


 
    <iframe frameborder="no" scrolling="no" class="w-100-iframe footer-iframe" src="layout/footer.php?color=FF3131"></iframe>
</div>

<script lang="javascript">


function change() 
{
    var elem = document.getElementById("myButton1");
    if (elem.value=="Attend") elem.value = "Attend Cancel";

}
</script>
</body>
<script type="text/javascript" src="js/selectTab.js"></script>
</html>

