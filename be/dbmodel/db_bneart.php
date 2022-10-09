<?php

function getInsertArtCollectionSql(){
    return "insert into artcollection(resourceId, title, artist, location, material, description, installed, latitude, longitude, arttype) value (?,?,?,?,?,?,?,?,?,?)";
}

function getInsertEventLocationSql(){
    return "insert into eventlocation(resourceId, name, type, latitude, longitude, address) value(?,?,?,?,?,?)";
}

function getArtCollection($id){
    return "select * from artcollection where resourceid=".$id;
}

function getEventLocation($id){
    return "select * from eventlocation where resourceid=".$id;
}

function dataToModelArtCollection($result){
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

function dataToModelEventLocation($result){
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
?>

