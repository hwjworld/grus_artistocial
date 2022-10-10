<?php
require_once("../be/controller/userController.php");
session_start();
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    echo "logined";
    $email = $_SESSION['email'];
    $user = new User();
    $u = $user->getUserByEmail($email);
}else{
    header("location: login.html");
    exit;
}
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


    <div class="profile-top background-color-3145ff">
        <div class="left-img-d">
            <img class="w-h-100" src="images/profile-img1.png">
        </div>

        <div class="right-d-info">
            <div class="introduction-board background-color-ffffff">
                Name: <?php echo $u->name;?><br/>
                Occupation: <?php echo $u->name;?><br/>
                Email: <?php echo $u->email;?><br/>
                About me: <?php echo $u->bio;?>
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
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
        </div>
        <div class="w-1240 portfolio-dox">
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
        </div>
        <div class="w-1240 portfolio-dox">
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
            <a class="item-portfolio">
                <div class="item-portfolio-img-d">
                    <img class="w-h-100" src="images/profile-img2.png"/>
                </div>
                <span>Christmas Gift from Mary (12/30/2021)</span>
            </a>
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

    <div id="events-attended" class="this-tab-item" style="display: none">
        <div class="spacer-bar background-color-FF3131"></div>
        <div class="description-bar background-color-f4Cf0a">Attended Events</div>
        <div class="background-color-FF3131">
            <div class="w-1240 events-attended-info">
                <div class="events-attended-item flex-space-between background-color-ffffff">
                    <div class="events-attended-item-text-description">
                        <div class="events-attended-item-title">Saturday Night Comedy</div>
                        <div class="time-info">Sat, Sep 24, 7:00 PM + more events</div>
                        <div class="events-attended-item-details">
                            Big Fork Theatre Fortitude Valley, QLD<br/>
                            Starts at A$20.00<br/>
                            Big Fork Theatre<br/>
                            195 Followers
                        </div>
                    </div>
                    <div class="publicity-map">
                        <img class="h-100" src="images/1664892662815.jpg">
                    </div>
                    <div class="wavy-line">
                        <img class="h-100" src="images/wavy-line.jpg">
                    </div>
                    <div class="ticket">TICKET</div>
                </div>

                <div class="events-attended-item flex-space-between background-color-ffffff">
                    <div class="events-attended-item-text-description">
                        <div class="events-attended-item-title">Saturday Night Comedy</div>
                        <div class="time-info">Sat, Sep 24, 7:00 PM + more events</div>
                        <div class="events-attended-item-details">
                            Big Fork Theatre Fortitude Valley, QLD<br/>
                            Starts at A$20.00<br/>
                            Big Fork Theatre<br/>
                            195 Followers
                        </div>
                    </div>
                    <div class="publicity-map">
                        <img class="h-100" src="images/1664892662815.jpg">
                    </div>
                    <div class="wavy-line">
                        <img class="h-100" src="images/wavy-line.jpg">
                    </div>
                    <div class="ticket">TICKET</div>
                </div>

                <div class="events-attended-item flex-space-between background-color-ffffff">
                    <div class="events-attended-item-text-description">
                        <div class="events-attended-item-title">Saturday Night Comedy</div>
                        <div class="time-info">Sat, Sep 24, 7:00 PM + more events</div>
                        <div class="events-attended-item-details">
                            Big Fork Theatre Fortitude Valley, QLD<br/>
                            Starts at A$20.00<br/>
                            Big Fork Theatre<br/>
                            195 Followers
                        </div>
                    </div>
                    <div class="publicity-map">
                        <img class="h-100" src="images/1664892662815.jpg">
                    </div>
                    <div class="wavy-line">
                        <img class="h-100" src="images/wavy-line.jpg">
                    </div>
                    <div class="ticket">TICKET</div>
                </div>
            </div>
        </div>
    </div>

    <!--my friends details-->
    <div id="my-friends-details" class="this-tab-item" style="display: none">
        <div class="my-friends-details background-color-139E06">
            <div class="close-my-friends-details" onclick="selectTab(1, 'this-tab-item')"></div>
            <img src="images/profile-img3.png">
        </div>
    </div>

    
    <iframe frameborder="no" scrolling="no" class="w-100-iframe footer-iframe" src="layout/footer.html?color=F4CF0A"></iframe>
</div>
</body>
</html>

