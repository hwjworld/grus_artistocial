<?php

require_once(__DIR__."/../tools/curl.php");
require_once(__DIR__."/../tools/database.php");
require_once(__DIR__."/../dbmodel/db_artsy.php");
require_once(__DIR__."/../model/artsyGeneModel.php");
require_once(__DIR__."/../model/artstyArtist.php");
require_once(__DIR__."/../model/artsyArtwork.php");
require_once(__DIR__."/../tools/constants.php");
include __DIR__.'/../config/db_properties.php';

class Artsy{

    private $db;

    function __construct()
    {
        $this->db = new Db();
    }

    public function generateTokenGetUrl(){
        global $clientId, $secret, $artsy_token_api_url;
        return $artsy_token_api_url . '?client_id=' . $clientId . '&client_secret=' . $secret;
    }

    public function getToken(){
        $token = $this->getTokenFromDB();
        if(is_null($token)){
            $artsy = new Artsy();
            $content = json_decode(cPostWithoutParam($artsy->generateTokenGetUrl()),true);
            $token = $content['token'];
            $expire = date("Y-m-d H:i:s",strtotime($content['expires_at']));
            $this->saveTokenToDB([$token, $expire]);
        }
        return $token;
    }

    private function getTokenFromDB(){
        $token = $this->db->query(getQueryArtsyTokenSql());
        if(count($token)>0){
            echo "get token from db";
            return $token[0];
        }
        return null;
    }

    private function saveTokenToDB($data){
        var_dump($data);
        return $this->db->preparedStatment(getInsertArtsyTokenSql(), 'ss', $data);

        // // $this->db = new Db();
        // $result = $this->db->insert(getInsertArtsyTokenSql($data['token'], new DateTime($data['expiredate'])));
        // if($result){
        //     echo "insert token from db successful";
        // }else{
        //     echo "insert token from db fail";
        // }
        // return $result;
    }

    /**
     * insert gene into to db
     */
    public function insertGene(...$geneData){
        return $this->db->preparedStatment(getInsertGeneSql(), str_repeat('s',8), $geneData);
    }

    public function insertArtwork(...$artworkData){
        return $this->db->preparedStatment(getInsertArtworkSql(), str_repeat('s',17), $artworkData);
    }

    public function insertArtist(...$artistData){
        return $this->db->preparedStatment(getInsertArtistSql(), str_repeat('s',17), $artistData);
    }

    public function getCGetRequestHeader(){

        $header = ["X-XAPP-Token"=>$this->getToken()["token"]];
        return $header;
    }

    /**
     * get all genes
     */
    public function getAllGenes(){
        $genes = array();
        $genes_result = $this->db->query(getAllGenesSql());
        // var_dump($genes_result);
        foreach($genes_result as $k=>$v){
            array_push($genes, dataToModelGene($v));
        }
        return $genes;
    }

    public function getGeneByName($name){
        $v = $this->db->query(getGeneByNameSql($name));
        if(count($v)>0){
            return dataToModelGene($v[0]);
        }
        return null;
    }

    public function getLastArtwork(){
        $artwork_result = $this->db->query(getLastArtworkSql());
        if(count($artwork_result)>0){
            return dataToModelArtwork($artwork_result[0]);
        }
        return null;

    }

    /**
     * get artwork by artwork_id
     */
    public function getArtwork($artworkId){
        $artwork_result = $this->db->query(getArtworkSql($artworkId));
        if(count($artwork_result)>0){
            $artwork = dataToModelArtwork($artwork_result[0]);
            if(trim($artwork->artist_id)==''){
                $this->fillArtistForArtowrk($artwork->resourceId);
                echo $artwork->resourceId . "empty artist filled";
                $artwork = $this->getArtwork($artworkId); // reretrive artwork, because updated artist_id
            }
            return $artwork;
        }
        return null;
    }

    /**
     * retrive artist infor for artwork. do following 2 steps:
     * 1. set artist_id
     * 2. save artist to artist table
     */
    public function fillArtistForArtowrk($artworkId){
        global $artsy_artist_api_url;
        $url = $artsy_artist_api_url . "?artwork_id=" . $artworkId;
        echo $url;

        $artist_content = json_decode(cGetWithHeader($url, $this->getCGetRequestHeader()));
        var_dump($artist_content);
        $artist_result = $artist_content->_embedded->artists[0];
        
        $resourceId = $artist_result->id;
        $name = $artist_result->name;
        $at = $this->getArtist($resourceId);
        // var_dump($at);
        if (!is_null($at)) {
            echo "<br/>" . $name . " artist already exist <br/>";
        }else{
            $slug = $artist_result->slug;
            $created_at = $artist_result->created_at;
            $updated_at = $artist_result->updated_at;
            $sortable_name = $artist_result->sortable_name;
            $gender = $artist_result->gender;
            $biography = $artist_result->biography;
            $birthday = $artist_result->birthday;
            $deathday = $artist_result->deathday;
            $hometown = $artist_result->hometown;
            $location = $artist_result->location;
            $nationality = $artist_result->nationality;
            $image_versions = $artist_result->image_versions;
            $thumbnail = $artist_result->_links->thumbnail->href;
            $image = $artist_result->_links->image->href;
            $permalink = $artist_result->_links->permalink->href;
            $this->insertArtist($resourceId, $slug, $created_at, $updated_at, $name, $sortable_name, $gender, $biography, $birthday, $deathday, $hometown, $location, $nationality, $image_versions, $thumbnail, $image, $permalink);
        }
        // update artist_id in artwork
        $this->updateArtistInArtwork($artworkId, $resourceId);
    }

    /**
     * get artist by artist_id
     */
    public function getArtist($artistId){
        $artist_result = $this->db->query(getArtistSql($artistId));
        if(count($artist_result)>0){
            return dataToModelArtist($artist_result[0]);
        }
        return null;
    }

    public function updateArtistInArtwork($artworkId, $artistId){
        return $this->db->preparedStatment(getUpdateArtistInArtworkSql(), 'ss', array($artistId, $artworkId));
    }

}
?>