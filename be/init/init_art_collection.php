<?php
//in total 191 collections.  will be import for initializaion
// to token needed for this api

// id=185 的导入不进来，奇怪

require_once(__DIR__."/../tools/curl.php");
require_once(__DIR__."/../tools/constants.php");
require_once(__DIR__."/../bneart/artistocialModel.php");
require_once(__DIR__."/../model/artistocialArtCollection.php");

global $bne_api_url_art_collection;

$result = json_decode(cGet($bne_api_url_art_collection));

$artistocial = new Artistocial();

if($result->success == true){
    $records = $result->result->records;
    foreach($records as $k=>$v){
        $artCol = new ArtistocialArtCollection();
        $artCol->resourceId = $v->_id;
        $artcollection = $artistocial->getArtCollection($artCol->resourceId);
        if(!is_null($artcollection)){
            echo $artCol->resourceId ." exist , skip...<br/>";
            continue;
        }else{
            echo $artCol->resourceId ." not exist , inserting...<br/>";
        }
        $artCol->title = $v->Item_title;
        $artCol->artist = $v->Artist;
        $artCol->location = $v->The_Location;
        $artCol->material = $v->Material;
        $artCol->description = trim($v->Description);
        $artCol->installed = $v->Installed;
        $artCol->latitude = $v->Latitude;
        $artCol->longitude = $v->Longitude;
        $artistocial->saveArtCollection($artCol);
        echo "saved one art collection";
    }
}
?>