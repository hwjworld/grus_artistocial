
<?php
require_once(__DIR__."/../../be/controller/artsyController.php");
require_once(__DIR__."/../../be/controller/userController.php");
session_start();

$isLogin = (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)?true:false;
$uid = 0;
if(!$isLogin){
    $uid = $_SESSION['id'];
    $user = new User();
    $u = $user->getUserById($uid);
}
$artsy = new Artsy();
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
$currentArtwork = $galleryArtworks[$current_index];
// var_dump($currentArtwork);

$isUserLogin = 0;
if($isLogin){
    $isUserLogin = 1;
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
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</head>


<!--painting-->
<section>
    <div class="artworkwrap">
      <div href="artworkinfo.html" class="artworkimg" target="_blank">

        <img onclick="location.href='artdescription.php?artworkid=<?php echo $currentArtwork->id;?>&index=<?php echo $current_index;?>';" src="<?php echo $currentArtwork->thumbnail?>" alt="Art Piece">

      </div>
    </div>
</section>

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
<div class = "preference">
    <p id="cost">Title: <?php echo $currentArtwork->title; ?> </p>
    <p id="cost">Date: <?php echo $currentArtwork->date; ?> </p>
    <p id="cost">Collection Instituion: <?php echo $currentArtwork->collecting_institution; ?> </p>
    <p id="money">ArtType: <?php echo $currentArtwork->category; ?></p>
    <br/>
    <input class = "preferencebutton" id="Purchase" type="button" value="Make Preference!" onclick="BuyA('<?php echo $isUserLogin;?>','<?php echo $currentArtwork->id;?>','<?php echo $currentArtwork->category; ?>');"/>

    <script>
    // update the values
    //document.getElementById("money").innerHTML = "MONEY: $" + money;
    //document.getElementById("cost").innerHTML = "COST: $" + buyA;
    </script>
</div>
