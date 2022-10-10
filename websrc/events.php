
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
    <script type="text/javascript" src="js/selectTab.js"></script>
</head>

<body>
<div class="content-info">

    <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.html"></iframe>

    <div style="padding-left: 4em" class="library-title background-color-FF3131">ART EVENTS IN BRISBANE </div>
    <div class="events-content events-tab-info">
        <div class="sort-text">sort by popular</div>
        <div class="w-1380 events-info flex-space-between">
            <div class="events-left-info">
                <?php foreach($hotevents as $k=>$v){ ?>
                <div onclick="selectTab(1, 'events-tab-info')" class="events-item background-color-f4Cf0a flex-space-between-center">
                    <div class="events-item-text-description">
                        <div class="events-attended-item-title"><?php echo $v->title;?></div>
                        <div class="time-info"><?php echo $v->startDateTime;?></div>
                        <div class="events-attended-item-details">
                        <?php echo $v->location;?><br/>
                            Cost $<?php echo $v->cost;?><br/>
                            <!-- Big Fork Theatre<br/> -->
                            <!-- 195 Followers -->
                        </div>
                    </div>
                    <div class="events-map">
                        <img class="w-100 h-100" src="<?php echo $v->eventImage;?>">
                    </div>
                </div>
                <?php } ?>

                <!--
                <div onclick="selectTab(1, 'events-tab-info')" class="events-item background-color-f4Cf0a flex-space-between-center">
                    <div class="events-item-text-description">
                        <div class="events-attended-item-title">Saturday Night Comedy</div>
                        <div class="time-info">Sat, Sep 24, 7:00 PM + more events</div>
                        <div class="events-attended-item-details">
                            Big Fork Theatre Fortitude Valley, QLD<br/>
                            Starts at A$20.00<br/>
                            Big Fork Theatre<br/>
                            195 Followers
                        </div>
                    </div>
                    <div class="events-map">
                        <img class="w-100 h-100" src="images/1664892662815.jpg">
                    </div>
                </div>
                <div onclick="selectTab(1, 'events-tab-info')" class="events-item background-color-f4Cf0a flex-space-between-center">
                    <div class="events-item-text-description">
                        <div class="events-attended-item-title">Saturday Night Comedy</div>
                        <div class="time-info">Sat, Sep 24, 7:00 PM + more events</div>
                        <div class="events-attended-item-details">
                            Big Fork Theatre Fortitude Valley, QLD<br/>
                            Starts at A$20.00<br/>
                            Big Fork Theatre<br/>
                            195 Followers
                        </div>
                    </div>
                    <div class="events-map">
                        <img class="w-100 h-100" src="images/1664892662815.jpg">
                    </div>
                </div>
                <div onclick="selectTab(1, 'events-tab-info')" class="events-item background-color-f4Cf0a flex-space-between-center">
                    <div class="events-item-text-description">
                        <div class="events-attended-item-title">Saturday Night Comedy</div>
                        <div class="time-info">Sat, Sep 24, 7:00 PM + more events</div>
                        <div class="events-attended-item-details">
                            Big Fork Theatre Fortitude Valley, QLD<br/>
                            Starts at A$20.00<br/>
                            Big Fork Theatre<br/>
                            195 Followers
                        </div>
                    </div>
                    <div class="events-map">
                        <img class="w-100 h-100" src="images/1664892662815.jpg">
                    </div>
                </div>
                <div onclick="selectTab(1, 'events-tab-info')" class="events-item background-color-f4Cf0a flex-space-between-center">
                    <div class="events-item-text-description">
                        <div class="events-attended-item-title">Saturday Night Comedy</div>
                        <div class="time-info">Sat, Sep 24, 7:00 PM + more events</div>
                        <div class="events-attended-item-details">
                            Big Fork Theatre Fortitude Valley, QLD<br/>
                            Starts at A$20.00<br/>
                            Big Fork Theatre<br/>
                            195 Followers
                        </div>
                    </div>
                    <div class="events-map">
                        <img class="w-100 h-100" src="images/1664892662815.jpg">
                    </div>
                </div>
                <div onclick="selectTab(1, 'events-tab-info')" class="events-item background-color-f4Cf0a flex-space-between-center">
                    <div class="events-item-text-description">
                        <div class="events-attended-item-title">Saturday Night Comedy</div>
                        <div class="time-info">Sat, Sep 24, 7:00 PM + more events</div>
                        <div class="events-attended-item-details">
                            Big Fork Theatre Fortitude Valley, QLD<br/>
                            Starts at A$20.00<br/>
                            Big Fork Theatre<br/>
                            195 Followers
                        </div>
                    </div>
                    <div class="events-map">
                        <img class="w-100 h-100" src="images/1664892662815.jpg">
                    </div>
                </div>
                -->
            </div>

            <div class="events-right-info">
                <div class="events-search-d">
                    <input placeholder="search" class="events-search"/>
                    <div class="search-icon"><svg t="1664933889901" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2543" width="40" height="40"><path d="M966.4 924.8l-230.4-227.2c60.8-67.2 96-156.8 96-256 0-217.6-176-390.4-390.4-390.4-217.6 0-390.4 176-390.4 390.4 0 217.6 176 390.4 390.4 390.4 99.2 0 188.8-35.2 256-96l230.4 227.2c9.6 9.6 28.8 9.6 38.4 0C979.2 950.4 979.2 934.4 966.4 924.8zM102.4 441.6c0-185.6 150.4-339.2 339.2-339.2s339.2 150.4 339.2 339.2c0 89.6-35.2 172.8-92.8 233.6-3.2 0-3.2 3.2-6.4 3.2-3.2 3.2-3.2 3.2-3.2 6.4-60.8 57.6-144 92.8-233.6 92.8C256 780.8 102.4 627.2 102.4 441.6z" p-id="2544" fill="#6C6C6C"></path></svg></div>
                </div>
                <div class="map-distribution">
                    <p>
                        <iframe src="https://www.google.com/maps/d/embed?mid=1NwF1n58Vpfmy0JpAR0JvgQGV8zFjMPU&ehbc=2E312F" width="400" height="900"></iframe>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="events-content-details events-tab-info background-color-f4Cf0a" style="display: none">
        <div class="events-item-details w-1270 background-color-ffffff">
            <div onclick="selectTab(0, 'events-tab-info')" class="close-events-item-details"><img class="w-100" src="images/close.png"></div>

            <div class="events-item-details-top flex-space-between-center">
                <div class="events-item-sketch">
                    <div style="padding-bottom: 50px">Saturday Night Comedy</div>
                    <div>MULTIPLE DATES<br>by Big Fork Theatre<br>Follow<br>196 followers</div>
                    <select class="select-info">
                        <option>Will Attend</option>
                        <option>Wish to Attend</option>
                        <option>No Interest</option>
                    </select>
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

                <img class="w-100" src="images/events-img2.png">
            </div>
        </div>
    </div>


 
    <iframe frameborder="no" scrolling="no" class="w-100-iframe footer-iframe" src="layout/footer.html?color=FF3131"></iframe>
</div>
</body>
</html>

