<?php
require_once(__DIR__."/../controller/userController.php");
require_once(__DIR__."/../model/busUser.php");
require_once(__DIR__."/../tools/constants.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $bio = $_POST["bio"];
    if (trim($email) == "") {
        echo "please input email";
        return;
    }
    if (trim($password) == "") {
        echo "please input password";
        return;
    }
    if (trim($name) == "") {
        echo "please input name";
        return;
    }
    if (trim($bio) == "") {
        echo "please input bio";
        return;
    }
    $user = new User();
    $u = $user->getUserByEmail($email);
    if (!is_null($u)) {
        echo "user already exist";
        return;
    }
    global $profilepicurls, $arttypes;

    $occupation = trim($_POST["occupation"]);

    $u = new BusUser();
    $u->email = $email;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $u->password = $hash;
    $u->name = trim($name);
    $u->occupation = trim($occupation);
    $u->bio = trim($bio);
    $u->arttype = $arttypes[rand(0,13)];
    $u->picurl = $profilepicurls[rand(0, 7)];
    $result = $user->saveUser($u);

    if ($result) {
        // Store data in session variables
        $_SESSION["loggedin"] = true;
        $u = $user->getUserByEmail($u->email);
        $_SESSION["id"] = $u->id;
        $_SESSION["email"] = $u->email;
        echo "Signup successful";
    }
}else{
    echo "only support POST";
}
