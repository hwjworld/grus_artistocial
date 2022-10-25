<?php
require_once(__DIR__."/../model/artistocialEvent.php");
require_once(__DIR__."/../model/artistocialEventLocation.php");
require_once(__DIR__."/../model/artistocialArtCollection.php");
require_once(__DIR__."/../model/artistocialLibrary.php");

function getInsertArtCollectionSql()
{
    return "insert into artcollection(resourceId, title, artist, location, material, description, installed, latitude, longitude, arttype) value (?,?,?,?,?,?,?,?,?,?)";
}

function getInsertEventLocationSql()
{
    return "insert into eventlocation(resourceId, name, type, latitude, longitude, address) value(?,?,?,?,?,?)";
}

function getInsertLibrarySql()
{
    return "insert into library(resourceId,name,type,serviceName,serviceType,wifi,address1,address2,locality,postcode,phone,mobile,email,managerTitle,managerName,managerPhone,managerEmail,dateCreated,dateUpdated,latitude,longitude,directoryUrl,monday,tuesday,wednesday,thursday,friday,saturday,sunday) value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
}

function getInsertEventSql()
{
    return "insert into event(resourceId,template,title,description,locationType,location,startDateTime,endDateTime,dateTimeFormatted,allDay,canceled,openSignUp,reservationFull,pastDeadline,pastCancelDeadline,requiresPayment,refundsAllowed,cost,eventImage,detailImage,venue,eventType,age,permaLinkUrl,eventActionUrl,categoryCalendar,requirements) value(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
}

function getArtCollectionSql($id)
{
    return "select * from artcollection where resourceid=" . $id;
}

function getAllArtCollectionSql()
{
    return "select * from artcollection";
}

function getEventLocationSql($id)
{
    return "select * from eventlocation where resourceid=" . $id;
}

function getLibrarySql($id)
{
    return "select * from library where resourceid=" . $id;
}

function getAllLibrarySql()
{
    return "select * from library";
}

function getEventSql($id)
{
    return "select * from event where resourceid=" . $id;
}

function getHotEventSql()
{
    return "select * from event order by startDatetime desc limit 10";
}

function getRecommendEventSql($eventtypes)
{
    $where_clause = "'x'";
    foreach($eventtypes as $k=>$v){
        $where_clause = $where_clause.",'".$v."'";
    }
    return "select * from event where eventtype in (".$where_clause.")";
}

function getRecommendArtcollectionSql($eventtypes)
{
    $where_clause = "'x'";
    foreach($eventtypes as $k=>$v){
        $where_clause = $where_clause.",'".$v."'";
    }
    return "select * from artcollection where material in (".$where_clause.")";
}


function dataToModelArtCollection($result)
{
    $model = new ArtistocialArtCollection();
    $model->id = $result['id'];
    $model->resourceId = $result['resourceId'];
    $model->title = $result['title'];
    $model->artist = $result['artist'];
    $model->location = $result['location'];
    $model->material = $result['material'];
    $model->description = $result['description'];
    $model->installed = $result['installed'];
    $model->latitude = $result['latitude'];
    $model->longitude = $result['longitude'];
    $model->arttype = $result['arttype'];
    return $model;
}

function dataToModelEventLocation($result)
{
    $model = new ArtistocialEventLocation();
    $model->id = $result['id'];
    $model->resourceId = $result['resourceId'];
    $model->name = $result['name'];
    $model->type = $result['type'];
    $model->latitude = $result['latitude'];
    $model->longitude = $result['longitude'];
    $model->address = $result['address'];
    return $model;
}

function dataToModelLibrary($result)
{
    $model = new ArtistocialLibrary();
    $model->id = $result['id'];
    $model->resourceId = $result['resourceId'];
    $model->name = $result['name'];
    $model->type = $result['type'];
    $model->serviceName = $result['serviceName'];
    $model->serviceType = $result['serviceType'];
    $model->wifi = $result['wifi'];
    $model->address1 = $result['address1'];
    $model->address2 = $result['address2'];
    $model->locality = $result['locality'];
    $model->postcode = $result['postcode'];
    $model->phone = $result['phone'];
    $model->mobile = $result['mobile'];
    $model->email = $result['email'];
    $model->managerTitle = $result['managerTitle'];
    $model->managerName = $result['managerName'];
    $model->managerPhone = $result['managerPhone'];
    $model->managerEmail = $result['managerEmail'];
    $model->dateCreated = $result['dateCreated'];
    $model->dateUpdated = $result['dateUpdated'];
    $model->latitude = $result['latitude'];
    $model->longitude = $result['longitude'];
    $model->directoryUrl = $result['directoryUrl'];
    $model->monday = $result['monday'];
    $model->tuesday = $result['tuesday'];
    $model->wednesday = $result['wednesday'];
    $model->thursday = $result['thursday'];
    $model->friday = $result['friday'];
    $model->saturday = $result['saturday'];
    $model->sunday = $result['sunday'];
    return $model;
}

function dataToModelEvent($result)
{
    $model = new ArtistocialEvent();
    $model->id = $result['id'];
    $model->resourceId = $result['resourceId'];
    $model->template = $result['template'];
    $model->title = $result['title'];
    $model->description = $result['description'];
    $model->locationType = $result['locationType'];
    $model->location = $result['location'];
    $model->startDateTime = $result['startDateTime'];
    $model->endDateTime = $result['endDateTime'];
    $model->dateTimeFormatted = $result['dateTimeFormatted'];
    $model->allDay = $result['allDay'];
    $model->canceled = $result['canceled'];
    $model->openSignUp = $result['openSignUp'];
    $model->reservationFull = $result['reservationFull'];
    $model->pastDeadline = $result['pastDeadline'];
    $model->pastCancelDeadline = $result['pastCancelDeadline'];
    $model->requiresPayment = $result['requiresPayment'];
    $model->refundsAllowed = $result['refundsAllowed'];
    $model->cost = $result['cost'];
    $model->eventImage = $result['eventImage'];
    $model->detailImage = $result['detailImage'];
    $model->venue = $result['venue'];
    $model->eventType = $result['eventType'];
    $model->age = $result['age'];
    $model->permaLinkUrl = $result['permaLinkUrl'];
    $model->eventActionUrl = $result['eventActionUrl'];
    $model->categoryCalendar = $result['categoryCalendar'];
    $model->requirements = $result['requirements'];
    return $model;
}
