<?php
require_once("../be/controller/userController.php");
require_once("../be/controller/artistocialController.php");
require_once("../be/controller/artsyController.php");
session_start();
$isLogin = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)?true:false;

if(!$isLogin){
    echo "<script>alert('Please sign in first');top.location.href='signin.php'</script>";
    die;
}
$uid = $_SESSION['id'];
$user = new User();
$u = $user->getUserById($uid);

$artistocial = new Artistocial();
// $hotevents = $artistocial->getHotEvent();
$user = new User();
$hotevents = $user->getUserEventAttended($uid);
$userportofolios = $user->getUserPortofolio($uid);
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
</head>

<body>
<div class="content-info">

    <iframe frameborder="no" scrolling="no" class="w-100-iframe top-iframe" src="layout/topTab.php"></iframe>


    <div class="profile-top background-color-3145ff">
        <div class="left-img-d">
            <img class="w-h-100" src="<?php  echo $u->picurl;?>">
        </div>

        <div class="right-d-info">
            <div class="introduction-board background-color-ffffff">
                Name: <?php  echo $u->name;?><br/>
                Occupation: <?php echo $u->name;?><br/>
                Email: <?php echo $u->email;?><br/>
                About me: <?php echo $u->bio;?><br />
                Preference: <?php echo $u->arttype;?>
            </div>

            <div class="right-img-d">
                <img class="w-h-100" src="images/profile-img2.png">
            </div>

            <div class="right-bottom-button">
                <span class="portfolio display-flex-center background-color-f4Cf0a"
                      onclick="selectTab(0, 'this-tab-item')">Portfolio</span>
                <span class="my-friends display-flex-center background-color-139E06"
                      onclick="selectTab(1, 'this-tab-item')">My Friends</span>
                <span class="events-attended display-flex-center background-color-FF3131"
                      onclick="selectTab(2, 'this-tab-item')">Events Attended</span>
            </div>
        </div>
    </div>

    <!--portfolio-->
    <div id="portfolio-info" class="this-tab-item">
        <div class="spacer-bar background-color-f4Cf0a"></div>
        <div class="w-1240 portfolio-dox">
            <?php foreach($userportofolios as $k=>$v){ if($k>=0 && $k<4){ ?>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="<?php echo $v->thumbnail; ?>"/>
                </div>
                <span><?php echo $v->title.'('.$v->date.')'; ?></span>
            </a>
            <?php }}?>
        </div>
        <div class="w-1240 portfolio-dox">
            <?php foreach($userportofolios as $k=>$v){ if($k>=4 && $k<8){ ?>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="<?php echo $v->thumbnail; ?>"/>
                </div>
                <span><?php echo $v->title.'('.$v->date.')'; ?></span>
            </a>
            <?php }}?>
        </div>
        <div class="w-1240 portfolio-dox">
            <?php foreach($userportofolios as $k=>$v){ if($k>=8 && $k<12){ ?>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="<?php echo $v->thumbnail; ?>"/>
                </div>
                <span><?php echo $v->title.'('.$v->date.')'; ?></span>
            </a>
            <?php }}?>
        </div>
        <div class="profile-last-img-d">
            <img class="w-h-100" src="images/profile-img2.png">
        </div>
        <div class="spacer-bar background-color-3145ff"></div>
    </div>

    <!--my friends-->
    <div id="my-friends" class="this-tab-item" style="display: none">
        <div class="spacer-bar background-color-139E06"></div>
        <div class="description-bar background-color-f4Cf0a">Click this profile picture to chat!</div>
        <div class="my-friends-info background-color-139E06">
            <div class="my-friends-title">Your Friends</div>
            <div class="w-1240 my-friends-dox">
                <a class="item-my-friends" onclick="selectTab(3, 'this-tab-item')">
                    <div class="item-my-friends-img-d">
                        <img class="w-h-100" src="images/profile-img1.png"/>
                    </div>
                    <span>Mary Painter</span>
                </a>
                <a class="item-my-friends" onclick="selectTab(3, 'this-tab-item')">
                    <div class="item-my-friends-img-d">
                        <img class="w-h-100" src="images/profile-img1.png"/>
                    </div>
                    <span>Mary Painter</span>
                </a>
                <a class="item-my-friends" onclick="selectTab(3, 'this-tab-item')">
                    <div class="item-my-friends-img-d">
                        <img class="w-h-100" src="images/profile-img1.png"/>
                    </div>
                    <span>Mary Painter</span>
                </a>
            </div>

            <div class="my-friends-title">Someone you might be interested...</div>
            <div class="w-1240 my-friends-dox">
                <a class="item-my-friends" onclick="selectTab(3, 'this-tab-item')">
                    <div class="item-my-friends-img-d">
                        <img class="w-h-100" src="images/profile-img1.png"/>
                    </div>
                    <span>Mary Painter</span>
                </a>
                <a class="item-my-friends" onclick="selectTab(3, 'this-tab-item')">
                    <div class="item-my-friends-img-d">
                        <img class="w-h-100" src="images/profile-img1.png"/>
                    </div>
                    <span>Mary Painter</span>
                </a>
                <a class="item-my-friends" onclick="selectTab(3, 'this-tab-item')">
                    <div class="item-my-friends-img-d">
                        <img class="w-h-100" src="images/profile-img1.png"/>
                    </div>
                    <span>Mary Painter</span>
                </a>
            </div>
        </div>
    </div>
    <!--events-attended-->

    <div id="events-attended" class="this-tab-item" style="display: none">
        <div class="spacer-bar background-color-FF3131"></div>
        <div class="description-bar background-color-f4Cf0a">Attended Events</div>
        <div class="background-color-FF3131">
        <?php if(count($hotevents)>0){ foreach($hotevents as $k=>$v){ ?>
            <div class="w-1240 events-attended-info">
            <a href="eventInfo.php?eid=<?php echo $v->id; ?>" target="_blank">
                <div class="events-attended-item flex-space-between background-color-ffffff">
               
                    <div class="events-attended-item-text-description">
                    
                        <div class="events-attended-item-title"><?php echo $v->title;?></div>
                        <div class="time-info"><?php echo $v->startDateTime;?></div>
                        <div class="events-attended-item-details">
                            <?php echo $v->location;?><br/>
                            Cost $<?php echo $v->cost;?><br/>
                            
                        </div>
                    </div>
                    <div class="publicity-map">
                        <img class="h-100" src="<?php echo $v->eventImage;?>">
                        
                    </div>
                    
                    <div class="wavy-line">
                        <img class="h-100" src="images/wavy-line.jpg">
                    </div>
                    <div class="ticket">TICKET</div>
                </div>
            </a>
            </div>
            <?php }} else { ?>
                <div class="w-1240 events-attended-info" style="color:white">
                    You haven't attend any Event yet, please browse<a href="events.php">events</a>!
                </div>
            <?php }?>
        </div>
    </div>

    <!--my friends details-->
    <div id="my-friends-details" class="this-tab-item" style="display: none">
        <div class="my-friends-details background-color-139E06">
            <div class="close-my-friends-details" onclick="selectTab(1, 'this-tab-item')"></div>
            <img src="images/profile-img3.png">
        </div>
    </div>

    
    <iframe frameborder="no" scrolling="no" class="w-100-iframe footer-iframe" src="layout/footer.php?color=3045ff"></iframe>
</div>
</body>
</html>

