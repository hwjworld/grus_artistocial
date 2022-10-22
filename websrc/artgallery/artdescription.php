
<?php
require_once(__DIR__."/../../be/controller/artsyController.php");

session_start();

$artsy = new Artsy();
$galleryArtworks = $artsy->getGalleryArtworks();

//$category = $lastArtwork->title;
//$category = $lastArtwork->category;
//$category = $lastArtwork->medium;

$current_index = 0;
if(isset($_GET["index"])){
    $current_index = $_GET["index"];
}
if($current_index<0 || $current_index>count($galleryArtworks)){
    echo "<p> error index </p>";
    die;
}
$current_artwork = $galleryArtworks[$current_index];
?>

<!DOCTYPE html>
<html class="monalisainfo-backg" lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Art Gallery | Description</title>
    <link rel="stylesheet" href="art gallery.css">
    <script src="art gallery.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
</head>

<!--navbar-->
<div class="infopagehead">
    <?php?>
    <h1><?php echo $current_artwork->title; ?></h1>
    <?php ?>
    <nav class="navbar">
        <a href="fronpage.html" target="">
            <img class="homeiconinfo" src="homeicon.png"/>
        </a>
        <a href="artwork.php?index=<?php echo $current_index;?>" target="_self" target="">
            <img class="arrowbinfo" src="arrow.png"/>
        </a>
    </nav>
</div>

<!--image-->
<div class="monalisainfoimg">
    <img src="<?php echo $current_artwork->thumbnail?>" alt="Art Piece">
</div>

<!--description text-->
<div class="mldescription">
    <h3>CATEGORY</h3>
    <p><?php echo $current_artwork->category; ?></p><br>
    <h3>MEDIUM</h3>
    <p><?php echo $current_artwork->medium; ?></p><br>
    <h3>COLLECTING INSTITUTION</h3>
    <p><?php echo $current_artwork->collecting_institution; ?></p>
</div>

<div> 
    <img src="backimg.jpg" class="backimg"> 
</div>
