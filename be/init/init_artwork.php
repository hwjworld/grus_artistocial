<?php

require_once(__DIR__ . "/../controller/artsyController.php");
require_once(__DIR__ . "/../tools/constants.php");
require_once(__DIR__ . "/../tools/curl.php");

$artsy = new Artsy();
/*
$gene_id = $_GET['gene_id'];
// check gene_id exist in database
$allGenes = $artsy->getAllGenes();
$gene = null;
foreach ($allGenes as $k => $v) {
    if ($v->resourceId == $gene_id) {
        $gene = $allGenes[$k];
        break;
    }
}
if (is_null($gene)) {
    echo "gene not found in database";
    return;
}
*/
// retrive 100 artwork
global $artsy_artwork_api_url;
$lastArtwork = $artsy->getLastArtwork();
$url = $artsy_artwork_api_url . "?size=3000&cursor=".$lastArtwork->resourceId."%3A".$lastArtwork->resourceId;
$artworks_content = json_decode(cGetWithHeader($url, $artsy->getCGetRequestHeader()));
// var_dump($artworks_content);
foreach ($artworks_content->_embedded->artworks as $k => $artwork) {
    $resourceId = $artwork->id;
    $title = $artwork->title;
    $aw = $artsy->getArtwork($resourceId);
    // var_dump($aw);
    if (!is_null($aw)) {
        echo "<br/>" . $title . " artwork already exist <br/>";
        continue;
    }
    $slug = $artwork->slug;
    $created_at = $artwork->created_at;
    $updated_at = $artwork->updated_at;
    $category = $artwork->category;
    $medium = $artwork->medium;
    $date = $artwork->date;
    $collecting_institution = $artwork->collecting_institution;
    $image_rights = $artwork->image_rights;
    $sale_message = $artwork->sale_message;
    $image_versions = $artwork->image_versions;
    $thumbnail = $artwork->_links->thumbnail->href;
    $image = $artwork->_links->image->href;
    $permalink = $artwork->_links->permalink->href;
    $artist_id = "";
    $ge_id = "";
    $artwork_gene = $artsy->getGeneByName($category);
    if(!is_null($artwork_gene)){
        $ge_id = $artwork_gene->resourceId; 
    }
    // $artist_id = substr($artist_id, strpos($artist_id, "=") + 1);
    echo "<br/> -- retriving artwork-" . $title . "--.... please wait..</br/>";
    
    //resourceId,slug,created_at,updated_at,title,category,medium,date,collecting_institution,image_rights,sale_message,image_versions,thumbnail,image,permalink,artist_id,gene_id
    $artsy->insertArtwork($resourceId, $slug, $created_at, $updated_at, $title, $category, $medium, $date, $collecting_institution, $image_rights, $sale_message, $image_versions, $thumbnail, $image, $permalink, $artist_id, $ge_id);
    // // retrive artist
    // $artist_url = $artwork->_links->artists->href;
    // check artwork exist and save artwork
    // check artist exist and save artist

}
