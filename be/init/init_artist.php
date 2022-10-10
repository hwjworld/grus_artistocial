<?php
//策略从初始化改为每次请求artwork时去获取

// 避免第一次访问巨量的artist api导致风险

//以下代码仅为测试获取artist 接口用

require_once(__DIR__ . "/../controller/artsyController.php");
require_once(__DIR__ . "/../tools/constants.php");
require_once(__DIR__ . "/../tools/curl.php");
// $artsy = new Artsy();
// $lastArtwork = $artsy->getLastArtwork();
// $lastArtwork = $artsy->getArtwork('516ca4970f8b78ba6500080d');
// if(trim($lastArtwork->artist_id)==''){
//     $artsy->fillArtistForArtowrk($lastArtwork->resourceId);
//     echo "empty artist filled";
// }else{
//     echo "has artist";
// }
?>