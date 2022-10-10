<?php
//in total 1657 collections.  will be import for initializaion
// to token needed for this api

require_once(__DIR__."/../tools/curl.php");
require_once(__DIR__."/../tools/constants.php");
require_once(__DIR__."/../controller/artistocialController.php");
require_once(__DIR__."/../model/artistocialEventLocation.php");

global $bne_api_url_event_location;

$result = json_decode(cGet($bne_api_url_event_location));

$artistocial = new Artistocial();

if($result->success == true){
    $records = $result->result->records;
    foreach($records as $k=>$v){
        $artCol = new ArtistocialEventLocation();
        $artCol->resourceId = $v->_id;
        $eventLocation = $artistocial->getEventLocation($artCol->resourceId);
        if(!is_null($eventLocation)){
            echo $artCol->resourceId ." exist , skip...<br/>";
            continue;
        }else{
            echo $artCol->resourceId ." not exist , inserting...<br/>";
        }
        $artCol->name = $v->{"Venue Name"};
        $artCol->type = $v->{"Venue type"};
        $artCol->latitude = trim($v->Latitude);
        $artCol->longitude = trim($v->Longitude);
        $artCol->address = $v->{"Venue address"};
        $artistocial->saveEventLocation($artCol);
        echo "saved one Event Location";
    }
}
?>