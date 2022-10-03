<?php

function cGet($url){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

function cPostWithoutParam($url){
    return cPost($url, null);
}

function cPost($url, $data){
    if(!isset($data)){
        $data = array();
    }
    # $url = 'http://server.com/path';
    # $data = array('key1' => 'value1', 'key2' => 'value2');

    // use key 'http' even if you send the request to https://...
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );
    
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    print $result;
    if ($result === FALSE) { 
        echo 'post wrong';
     }

    return $result;
}
?>