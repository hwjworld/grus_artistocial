<?php

require_once(__DIR__."/../controller/artsyController.php");
require_once(__DIR__."/../tools/curl.php");
require_once(__DIR__."/../tools/constants.php");

$resourceId = "";
if(!isset($_GET["geneId"])){
    echo "no geneId, will import all the genes";
    // return;
}else{
    $resourceId = $_GET["geneId"];
}
global $artsy_gene_api_url;

$url = $artsy_gene_api_url . $resourceId . "?size=2000";

$artsy = new Artsy();
$genecontent = cGetWithHeader($url, $artsy->getCGetRequestHeader());
// print($genecontent);

$genecontentarray = json_decode($genecontent);
// var_dump($genecontentarray);

$genes = array();
if(trim($resourceId) == ""){
    array_push($genes, $genecontentarray);
}else{
    $genes = $genecontentarray->_embedded->genes;
}

// var_dump($genes);

$allExistGenes = $artsy->getAllGenes();
$convertedGenes = array();
foreach($allExistGenes as $row){
    array_push($convertedGenes, $row->resourceId);
}
var_dump($convertedGenes);


foreach($genes as $k=>$v){
    $rid = $v->id;
    echo $v->id;
    $name = $v->name;
    if(in_array($rid, $convertedGenes)){
        echo '<br/>'.$name.' exists, skip..<br/>';
        continue;
    }
    if(is_null($name)){
        echo "no gene retrived";
        // return;
    }
    // return;
    $display_name = $v->display_name;
    $description = $v->description;
    $image_versions = $v->image_versions;
    $thumbnail = $v->_links->thumbnail->href;
    $image = $v->_links->image->href;
    $permalink = $v->_links->permalink->href;
    $artsy->insertGene($rid, $name, $display_name, $description, $image_versions, $thumbnail, $image, $permalink);
}


?>