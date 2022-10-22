
<?php
require_once(__DIR__."/../../be/controller/artsyController.php");

session_start();

$_SESSION["loggedin"] = true;
$_SESSION["id"] = 1;    

$artsy = new Artsy();
$l = $artsy->getLastArtwork();

$galleryArtworks = $artsy->getGalleryArtworks();

$current_index = 0;
if(isset($_GET["index"])){
    $current_index = $_GET["index"];
}
if($current_index<0){
    $current_index = 0;
}
if($current_index>count($galleryArtworks)){
    $current_index = count($galleryArtworks)-1;
}
$previewIndex = $current_index-1<0?0:$current_index-1;
$nextIndex = $current_index+1<count($galleryArtworks)?$current_index+1:count($galleryArtworks)-1;
$lastArtwork = $galleryArtworks[$current_index];

$isUserLogin = false;
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    $isUserLogin = true;
}

?>

<!DOCTYPE html>
<html class="monalisa-backg" lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Art Gallery | Artwork</title>
    <link rel="stylesheet" href="art gallery.css">
    <script src="art gallery.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>


<!--painting-->
<header>
    <div class="monalisawrap">
      <div href="monalisainfo.html" class="monalisaimg" target="_blank">
        <?php?>
        <img onclick="location.href = 'artdescription.php?index=<?php echo $current_index;?>';" src="<?php echo $lastArtwork->thumbnail?>" alt="Art Piece">
        <?php ?>
      </div>
    </div>
</header>


<!--previous and next button-->
<a href="fronpage.html" target="_self">
    <img class="homeicon" src="homeicon.png"/>
</a>

<a href="artwork.php?index=<?php echo $previewIndex;?>" target="_self">
    <img class="arrowb" src="arrow.png"/>
</a>

<a href="artwork.php?index=<?php echo $nextIndex;?>" target="_self">
    <img class="arrowf" src="arrow.png"/>
</a>

<!--buy button-->
<div class = "purchase">
    <p id="money"></p>
    <p id="cost"></p>
    <input class = "purchasebutton" id="Purchase" type="button" value="Purchase" onclick="BuyA(<?php echo $isUserLogin?>);"/>

    <script>
    // update the values
    document.getElementById("money").innerHTML = "MONEY: $" + money;
    document.getElementById("cost").innerHTML = "COST: $" + buyA;
    </script>
</div>
