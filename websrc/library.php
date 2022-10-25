<?php
require_once("../be/controller/artistocialController.php");
session_start();

$artistocial = new Artistocial();   
$hotlibrary = $artistocial->getAllLibrarys();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DECO1800/7180 Artistocial Home</title>
    <link rel="stylesheet" href="css/initialize.css">
    <link rel="stylesheet" href="css/publicStyle.css?v=1">
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn-3ZYPIeHEfnJfB9_soI5mArlM9oISag&callback=initMap"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>

<body>
<div class="content-info">

    <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.php"></iframe>

    <div style="padding-left: 4em" class="library-title background-color-139E06">LIBRARIES IN BRISBANE</div>

    <div class="library-info">
        <!-- <div>THE LIBRARY MAP</div> -->
        <div class="map-info">
            <!-- <p class="map">
                <iframe src="https://www.google.com/maps/d/embed?mid=1NwF1n58Vpfmy0JpAR0JvgQGV8zFjMPU&ehbc=2E312F" width="1000" height="480"></iframe>
            </p> -->
            <div class="index-last-d">
            <!-- <button class="art-collection font-size-24 background-color-f4Cf0a">Art Collection</button> -->
            <div class="index-last-map background-color-f4Cf0a">
            <div class="map-distribution">
                    <div id="map" style="width:1440px; height: 500px;"></div>
            </div>
                <!-- <div id="map" style="width:1330px; height: 500px;"></div> -->

            </div>
        </div>

        <script type="text/javascript" src="js/carousel.js"></script>
        <script language="javascript">
        function initMap() {
            const myLatLng = { lat: <?php echo $hotlibrary[0]->latitude; ?>, lng: <?php echo $hotlibrary[0]->longitude; ?> };
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 14,
                center: myLatLng,
            });

            const tourStops = [
                <?php foreach($hotlibrary as $k=>$v){
                    echo '[{ lat: '.$v->latitude.', lng: '.$v->longitude.' }, "'.$v->title.'"],';
            }?>
            ];
            const infoWindow = new google.maps.InfoWindow();

            tourStops.forEach(([position, title], i) => {
                const marker = new google.maps.Marker({
                    position,
                    map,
                    title: `${i + 1}. ${title}`,
                    label: `${i + 1}`,
                    optimized: false,
                });

                // Add a click listener for each marker, and set up the info window.
                marker.addListener("click", () => {
                    infoWindow.close();
                    infoWindow.setContent(marker.getTitle());
                    infoWindow.open(marker.getMap(), marker);
                });
            });
        }
        window.onload = initMap;
            // google.maps.event.addDomListener(window, 'load', initMap);
    </script>
        </div>
    
        <div class="search-map-d">
            <input placeholder="search on map" id="library_search_bar"/>
            <div class="search-icon"><svg t="1664933889901" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2543" width="40" height="40"><path d="M966.4 924.8l-230.4-227.2c60.8-67.2 96-156.8 96-256 0-217.6-176-390.4-390.4-390.4-217.6 0-390.4 176-390.4 390.4 0 217.6 176 390.4 390.4 390.4 99.2 0 188.8-35.2 256-96l230.4 227.2c9.6 9.6 28.8 9.6 38.4 0C979.2 950.4 979.2 934.4 966.4 924.8zM102.4 441.6c0-185.6 150.4-339.2 339.2-339.2s339.2 150.4 339.2 339.2c0 89.6-35.2 172.8-92.8 233.6-3.2 0-3.2 3.2-6.4 3.2-3.2 3.2-3.2 3.2-3.2 6.4-60.8 57.6-144 92.8-233.6 92.8C256 780.8 102.4 627.2 102.4 441.6z" p-id="2544" fill="#6C6C6C"></path></svg></div>
        </div>
        <div class="library-last-d flex-space-between-center">
            <div class="library-last-left-info background-color-000000">
                <?php foreach($hotlibrary as $k=>$v){ ?>
                <div class="library-last-left-item background-color-ffffff" onclick="selectTab(<?php echo $k;?>, 'library-last-right-item')">
                    <img src="images/note.jpg">
                    <?php echo $v->name; ?>
                </div>
                <?php }?>
            </div>
            <div class="library-last-right-info background-color-f4Cf0a">

                <?php foreach($hotlibrary as $k=>$v){ ?>
                <div class="library-last-right-item" <?php if($k!=0){ ?>style="display: none"<?php } ?>>
                    <div class="library-last-right-title"><?php echo $v->name;?></div>
                    <div class="flex-space-between">
                        <div class="w-50">
                            <p>
                                Library address:<br/>
                                <?php echo $v->postcode. " ".$v->address1." ".$v->locality ;?>
                            </p>
                            <p>
                                Contact:<br/>
                                Email:<br/>
                                <?php echo $v->email;?><br/>
                                Phone:<br/>
                                <?php echo $v->phone;?><br/>
                            </p>
                            <p>
                                Council:<br/>
                                <?php echo $v->serviceName;?>
                            </p>
                        </div>
                        <div class="w-50">
                            <p>
                                Opening Houres:
                            </p>
                            <p>
                                Monday: <?php echo $v->monday;?><br/>
                                Tuesday: <?php echo $v->tuesday;?><br/>
                                Wednesday: <?php echo $v->wednesday;?><br/>
                                Thursday: <?php echo $v->thursday;?><br/>
                                Friday: <?php echo $v->friday;?><br/>
                                Saturday: <?php echo $v->saturday;?><br/>
                                Sunday: <?php echo $v->sunday;?><br/>
                            </p>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
  
    <iframe frameborder="no" scrolling="no" class="w-100-iframe footer-iframe" src="layout/footer.php?color=139E06"></iframe>
</div>
<script lang="javascript">
$( document ).ready(function() {

    $("#library_search_bar").change(function(){
        $( ".library-last-left-item" ).each(function( index ) {
            new_val = $("#library_search_bar").val().toLowerCase();
            $( this ).css('display', 'block');
            if($( this ).text().toLowerCase().indexOf(new_val)<0){
                $( this ).css('display', 'none');
            }
        });
    });
});
</script>

</body>
<script type="text/javascript" src="js/selectTab.js"></script>
</html>

