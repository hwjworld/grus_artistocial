<?php
//in total 331 libraries.  will be import for initializaion
// to token needed for this api

require_once(__DIR__ . "/../tools/curl.php");
require_once(__DIR__ . "/../tools/constants.php");
require_once(__DIR__ . "/../bneart/artistocialModel.php");
require_once(__DIR__ . "/../model/artistocialEvent.php");

global $bne_api_url_event;

$result = json_decode(cGet($bne_api_url_event));

$artistocial = new Artistocial();

foreach ($result as $k => $v) {
    $model = new ArtistocialEvent();
    $model->resourceId = $v->eventID;
    $event = $artistocial->getEvent($model->resourceId);
    if (!is_null($event)) {
        echo $model->resourceId . " exist , skip...<br/>";
        continue;
    } else {
        echo $model->resourceId . " not exist , inserting...<br/>";
    }

    $model->template = $v->template;
    $model->title = $v->title;
    $model->description = $v->description;
    $model->locationType = trim($v->locationType);
    $model->location = $v->location;
    $model->startDateTime = $v->startDateTime;
    $model->endDateTime = $v->endDateTime;
    $model->dateTimeFormatted = $v->dateTimeFormatted;
    $model->allDay = $v->allDay;
    $model->canceled = $v->canceled;
    $model->openSignUp = $v->openSignUp;
    $model->reservationFull = $v->reservationFull;
    $model->pastDeadline = $v->pastDeadline;
    $model->pastCancelDeadline = $v->pastCancelDeadline;
    $model->requiresPayment = $v->requiresPayment;
    $model->refundsAllowed = $v->refundsAllowed;
    $model->eventImage = trim($v->eventImage->url);
    $model->detailImage = trim($v->detailImage->url);
    foreach($v->customFields as $kk=>$vv){
        if($vv->label=="Venue"){
            $model->venue = $vv->value;
        }elseif($vv->label=="Event type"){
            $model->eventType = $vv->value;
        }elseif($vv->label=="Cost"){
            $model->cost = $vv->value;
        }elseif($vv->label=="Age"){
            $model->age = $vv->value;
        }elseif($vv->label=="Requirements"){
            $model->requirements = $vv->value;
        }
    }
    $model->permaLinkUrl = $v->permaLinkUrl;
    $model->eventActionUrl = $v->eventActionUrl;
    $model->categoryCalendar = $v->categoryCalendar;
    $artistocial->saveEvent($model);
    echo "saved one Event";
}