<?php
require_once("artsyModel.php");

function getArtsyToken(){
    $artsy = new Artsy();
    return $artsy->getToken();
}

// var_dump(getArtsyToken());
?>