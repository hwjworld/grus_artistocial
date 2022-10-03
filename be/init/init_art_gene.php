<?php
$resource = $_GET['resourceId'];
if (isset($resource)) {
    echo $resource;
} else {
    echo ' no gene resource id';
    return;
}

$url = 'https://api.artsy.net/api/genes/' . $resource;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response_json = curl_exec($ch);
curl_close($ch);
$response=json_decode($response_json, true);
print($response)
?>