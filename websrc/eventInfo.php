
<?php
require_once("../be/controller/artistocialController.php");
require_once("../be/controller/userController.php");

session_start();
$isLogin = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)?true:false;
$eventid = isset($_GET['eid'])?$_GET['eid']:0;
if($eventid == 0){
    echo "<script>alert('Please enter from events list page :)');window.close();</script>";
    die;
}
$artistocial = new Artistocial();
$user = new User();
$event = $artistocial->getEventById($eventid);
if(is_null($event)){
    echo "<script>alert('Event doesnt exist, Please enter from events list page');window.close();</script>";
    die;
}

if($isLogin){
    $uid = $_SESSION['id'];
    $u = $user->getUserById($uid);
    $isAttended = $user->checkUserEventAttend($uid,$event->id);
}
$location = $artistocial->getLocationFromEventId($event->id);
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
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
                    <div class="font-size-30" style="padding-bottom: 50px"><?php echo $event->title;?></div>
                    <div class="font-size-20"><?php echo $event->locationType;?><br><?php echo $event->location;?><br>
                    <?php echo $event->dateTimeFormatted;?><br>
                    Age: <?php echo $event->age;?></div>
                    <?php if($isLogin){ if($isAttended){?>
                    <input onclick="cancelattend('<?php echo $event->id;?>')" type="button" value="Cancel Attend" id="myButton1" class="select-info"></input>
                    <?php }else{ ?>
                    <input onclick="attend('<?php echo $event->id;?>')" type="button" value="Attend" id="myButton1" class="select-info"></input>
                    <?php }}else{ ?>
                    <input onclick="top.location.href='signin.php'" type="button" value="Login to attend" id="myButton1" class="select-info"></input>
                    <?php }?>
                    <!-- <select class="select-info">
                        <option>Like</option>
                        <option>Dislike</option>
                    </select> -->
                </div>
                <div style="width: 615px;height: 314px;"><img class="w-100 h-100" src="<?php echo $event->eventImage;?>"></div>
            </div>

            <div class="w-1156 font-size-30">
                <p>About this event</p>
                <p>
                    <?php echo $event->description;?>
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
                    const myLatLng = { lat: <?php echo $location->latitude; ?>, lng: <?php echo $location->longitude;?> };
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


function attend(id) 
{
    $.ajax({
        type: "GET",
        url: '../be/pgreq/user_event_action.php?attendEvent=true&eventId='+id,
        success: function(data)
        {
            if(data.indexOf("successful")>=0){
                alert("Enjoy the event ^_^");
                location.reload();
            }else{
                alert(data); // show response from the php script. 
            }
        }
    });
}
function cancelattend(id){
    $.ajax({
        type: "GET",
        url: '../be/pgreq/user_event_action.php?cancelEvent=true&eventId='+id,
        success: function(data)
        {
            if(data.indexOf("successful")>=0){
                alert("Hope you find your interested event ^_^");
                location.reload();
            }else{
                alert(data); // show response from the php script. 
            }
        }
    });
}
</script>
</body>
<script type="text/javascript" src="js/selectTab.js"></script>
</html>

