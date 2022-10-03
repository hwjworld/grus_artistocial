<?php

require_once("../tools/curl.php");
require_once("../tools/database.php");
require_once("../config/db_properties.php");

class Artsy{

    public function generateTokenGetUrl(){
        return $this->token_url . '?client_id=' . $this->clientId . '&client_secret=' . $this->secret;
    }

    public function getToken(){
        $token = $this->getTokenFromDB();
        if(is_null($token)){
            $artsy = new Artsy();
            $content = cPostWithoutParam($artsy->generateTokenGetUrl());
            $token = json_decode($content, true)['token'];
            var_dump($token);
            $this->saveTokenToDB($token);
        }
        return $token;
    }

    private function getTokenFromDB(){
        $db = new Db();
        $token = $db->query("SELECT token FROM artsytoken where expiredate>now() limit 1;");
        if(count($token)>0){
            echo "get token from db";
            return $token[0];
        }
        return null;
    }

    private function saveTokenToDB($data){
        $db = new Db();
        $result = $db->insert("insert into artsytoken(token, expiredate) value ('".$data['token']."','".$data['expiredate']."');");
        if($result){
            echo "insert token from db successful";
        }else{
            echo "insert token from db fail";
        }
        return $result;
    }

    /**
     * retrive gene from artsy and update to db
     */
    public function retriveAndUpdateGene($geneId){
        if(is_null($geneId)){
            return null;
        }

    }

}
?>