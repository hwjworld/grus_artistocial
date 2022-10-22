<?php

require_once(__DIR__."/../controller/userController.php");
require_once(__DIR__."/../controller/artsyController.php");
require_once(__DIR__."/../controller/artistocialController.php");

session_start();

$_SESSION["loggedin"] = true;
$_SESSION['id'] =1;

if(!(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)){
    header("location: login.html");
    exit;
}

$userid = $_SESSION['id'];
$user = new User();
$u = $user->getUserById($userid);

if(isset($_GET['purchaseArtwork'])){
    
}else if(isset($_GET['attendEvent'])){
    $eventid = $_GET['eventId'];
    $user->userAttendEvent($userid, $eventid);
}else if(isset($_GET['cancelEvent'])){
    $eventid = $_GET['eventId'];
    $user->userCancelEvent($userid, $eventid);
}
?>