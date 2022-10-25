<?php

require_once(__DIR__."/../tools/constants.php");
require_once(__DIR__."/../controller/userController.php");
global $website_base_home_url;

// Initialize the session
session_start();

echo "login...\n";
// Check if the user is already logged in, if yes then redirect him to home page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ".$website_base_home_url);
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter email.\n";
    } else{
        $username = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.\n";
    } else{
        $password = trim($_POST["password"]);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }
    // Validate credentials
    if(empty($username_err) && empty($password_err)){

        $user = new User();
        // $u = $user->getUserByValidEmailAndPwd($username, $password);
        $u = $user->getUserByEmail($username);
        if(is_null($u) || password_verify($password, $u->password)){
            echo "login successful";
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $u->id;
            $_SESSION["email"] = $u->email;
            // Redirect user to welcome page
            // header("location: ".$website_base_home_url);
        } else{
            // Password is not valid, display a generic error message
            $login_err = "Invalid username or password.";
            echo $login_err;
        }
    }else{
        echo $username_err. $password_err;
    }
}else{
    echo "only support POST";
}
?>
 