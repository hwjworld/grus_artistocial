<?php

require_once(__DIR__."/../controller/userController.php");
require_once(__DIR__."/../model/busUser.php");
require_once(__DIR__."/../tools/constants.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (trim($email) == "" || trim($password) == "") {
        echo "please input email";
        return;
    }
    $user = new User();
    $u = $user->getUserByEmail($email);
    if (!is_null($u)) {
        return "user already exist";
    }
    global $profilepicurls;

    $name = $_POST["name"];
    $occupation = $_POST["occupation"];
    $bio = $_POST["bio"];
    $u = new BusUser();
    $u->email = $email;
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $u->password = $hash;
    $u->name = trim($name);
    $u->occupation = trim($occupation);
    $u->bio = trim($bio);
    $u->arttype = 'Painting';
    $u->picurl = $profilepicurls[rand(0, 7)];
    $result = $user->saveUser($u);

    if ($result) {
        echo true;
    }
}else{
    echo "only support POST";
}
