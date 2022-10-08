<?php

function getQueryArtsyTokenSql(){
    return "SELECT token FROM artsytoken where expiredate>now() limit 1";
}

function getInsertArtsyTokenSql($token, $expiredate){
    return "insert into artsytoken(token, expiredate) value ('".$token."','".$expiredate."')";
}


function getInsertGeneSql(){
    return "insert into arttype(resourceId, name, display_name, description, image_versions, thumbnail, image, permalink) value (?,?,?,?,?,?,?,?)";
}

function getAllGenesSql(){
    return "select * from arttype";
}

function getGeneByNameSql($name){
    return "select * from arttype where name='".$name."' or display_name='".$name."' limit 1";
}

function getArtworkSql($artworkId){
    return "select * from artwork where resourceId='".$artworkId."'";
}

function getLastArtworkSql(){
    return "select * from artwork order by id desc limit 1";
}

function getArtistSql($artistId){
    return "select * from artist where resourceId='".$artistId."'";
}

function getInsertArtworkSql(){
    return "insert into artwork(resourceId,slug,created_at,updated_at,title,category,medium,date,collecting_institution,image_rights,sale_message,image_versions,thumbnail,image,permalink,artist_id,gene_id) value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
}

function getInsertArtistSql(){
    return "insert into artist(resourceId,slug,created_at,updated_at,name,sortable_name,gender,biography,birthday,deathday,hometown,location,nationality,image_versions,thumbnail,image,permalink) value (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
}

function getUpdateArtistInArtworkSql(){
    return "update artwork set artist_id=? where resourceId=?";
}


function dataToModelGene($v){
    $gene = new ArtsyGene();
    $gene->id = $v['id'];
    $gene->resourceId = $v['resourceId'];
    $gene->name = $v['name'];
    $gene->description = $v['description'];
    $gene->image_versions = explode(",", $v['image_versions']);
    $gene->thumbnail = $v['thumbnail'];
    $gene->image_url = $v['image'];
    $gene->permalink = $v['permalink'];
    return $gene;
}

function dataToModelArtwork($artwork_result){
    $artwork = new ArtsyArtwork();
    $artwork->id = $artwork_result['id'];
    $artwork->resourceId = $artwork_result['resourceId'];
    $artwork->slug = $artwork_result['slug'];
    $artwork->created_at = $artwork_result['created_at'];
    $artwork->updated_at = $artwork_result['updated_at'];
    $artwork->title = $artwork_result['title'];
    $artwork->category = $artwork_result['category'];
    $artwork->medium = $artwork_result['medium'];
    $artwork->date = $artwork_result['date'];
    $artwork->collecting_institution = $artwork_result['collecting_institution'];
    $artwork->image_rights = $artwork_result['image_rights'];
    $artwork->sale_message = $artwork_result['sale_message'];
    $artwork->image_versions = explode(",", $artwork_result['image_versions']);
    $artwork->thumbnail = $artwork_result['thumbnail'];
    $artwork->image = $artwork_result['image'];
    $artwork->permalink = $artwork_result['permalink'];
    $artwork->artist_id = $artwork_result['artist_id'];
    $artwork->gene_id = $artwork_result['gene_id'];
    return $artwork;
}

function dataToModelArtist($artist_result){
    $artist = new ArtsyArtist();
    $artist->id = $artist_result['id'];
    $artist->resourceId = $artist_result['resourceId'];
    $artist->slug = $artist_result['slug'];
    $artist->created_at = $artist_result['created_at'];
    $artist->updated_at = $artist_result['updated_at'];
    $artist->name = $artist_result['name'];
    $artist->sortable_name = $artist_result['sortable_name'];
    $artist->gender = $artist_result['gender'];
    $artist->biography = $artist_result['biography'];
    $artist->birthday = $artist_result['birthday'];
    $artist->deathday = $artist_result['deathday'];
    $artist->hometown = $artist_result['hometown'];
    $artist->location = $artist_result['location'];
    $artist->nationality = $artist_result['nationality'];
    $artist->image_versions = explode(",", $artist_result['image_versions']);
    $artist->thumbnail = $artist_result['thumbnail'];
    $artist->image = $artist_result['image'];
    $artist->permalink = $artist_result['permalink'];
    return $artist;
}
?>