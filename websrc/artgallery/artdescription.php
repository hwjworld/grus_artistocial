
<?php
require_once(__DIR__."/../../be/controller/artsyController.php");

session_start();

$artsy = new Artsy();
$lastArtwork = $artsy->getLastArtwork();
$category = $lastArtwork->title;
$category = $lastArtwork->category;
$category = $lastArtwork->medium;
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
    <h1><?php echo $lastArtwork->title; ?></h1>
    <?php ?>
    <nav class="navbar">
        <a href="fronpage.html" target="">
            <img class="homeiconinfo" src="homeicon.png"/>
        </a>
        <a href="artwork.php" target="">
            <img class="arrowbinfo" src="arrow.png"/>
        </a>
    </nav>
</div>

<!--image-->
<div class="monalisainfoimg">
    <img src="<?php echo $lastArtwork->thumbnail?>" alt="Art Piece">
</div>

<!--description text-->
<div class="mldescription">
    <h3>CATEGORY</h3>
    <p><?php echo $lastArtwork->category; ?></p><br>
    <h3>MEDIUM</h3>
    <p><?php echo $lastArtwork->medium; ?></p><br>
    <h3>COLLECTING INSTITUTION</h3>
    <p><?php echo $lastArtwork->collecting_institution; ?></p>
</div>

<div> 
    <img src="backimg.jpg" class="backimg">
</div>
