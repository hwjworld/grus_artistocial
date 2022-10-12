<?php
require_once(__DIR__."/../tools/constants.php");
// Initialize the session
session_start();
 
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();
 
// Redirect to login page
global $website_base_home_url;
header("location: ".$website_base_home_url);
exit;
?>