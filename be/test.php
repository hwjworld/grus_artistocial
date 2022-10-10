<?php
require_once(__DIR__."/controller/artistocialController.php");
$param = $_GET['param'];
if($param == '1'){
    /* get all genes */
    $artsy = new Artsy();
    $allGenes = $artsy->getAllGenes();
    var_dump( $allGenes[0]->getAllImageUrls());   
}

?>