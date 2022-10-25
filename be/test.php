<?php
require_once(__DIR__."/controller/artsyController.php");
require_once(__DIR__."/controller/artistocialController.php");
require_once(__DIR__."/controller/userController.php");
// $param = $_GET['param'];
// if($param == '1'){
//     /* get all genes */
//     $artsy = new Artsy();
//     $allGenes = $artsy->getAllGenes();
//     var_dump( $allGenes[0]->getAllImageUrls());   
// }

// $v = '2022-10-17T10:02:17+00:00';
// echo date("Y-m-d H:i:s",strtotime($v));

// $artsy = new Artsy();
// $artsy->getToken();
// var_dump($artsy->getGalleryArtworks());

// $user = new User();
// $user->setPortofolioToUser(1);
// $eventAttended = $user->getUserEventAttended(1);
// var_dump($eventAttended);

$artitocial = new Artistocial();
var_dump($artitocial->getRecommendArtCollection(3));

?>