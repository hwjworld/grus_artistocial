<?php

require_once(__DIR__."/../tools/database.php");
require_once(__DIR__."/../dbmodel/db_bneart.php");

class Artistocial{


    private $db;

    function __construct()
    {
        $this->db = new Db();
    }


    public function getEventLocation($eventLocationId){
        $eventLocation = $this->db->query(getEventLocation($eventLocationId));
        if(count($eventLocation)>0){
            return dataToModelEventLocation($eventLocation[0]);
        }
        return null;
    }

    public function getArtCollection($artCollectionId){
        $artcollection = $this->db->query(getArtCollection($artCollectionId));
        if(count($artcollection)>0){
            return dataToModelArtCollection($artcollection[0]);
        }
        return null;
    }

    public function saveArtCollection(ArtistocialArtCollection $artCollection){
        
        $result = $this->db->preparedStatment(getInsertArtCollectionSql(),str_repeat('s',10),[
        $artCollection->resourceId,
        $artCollection->title,
        $artCollection->artist,
        $artCollection->location,
        $artCollection->material,
        $artCollection->description,
        $artCollection->installed,
        $artCollection->latitude,
        $artCollection->longitude,
        '']);
        if($result){
            echo "insert art collection from db successful";
        }else{
            echo "insert  art collection  from db fail";
        }
        return $result;
    }

    public function saveEventLocation(ArtistocialEventLocation $eventLocation){
        $result = $this->db->preparedStatment(getInserteventLocationSql(),str_repeat('s',6),[
        $eventLocation->resourceId,
        $eventLocation->name,
        $eventLocation->type,
        $eventLocation->latitude,
        $eventLocation->longitude,
        $eventLocation->address
        ]);
        if($result){
            echo "insert event location from db successful";
        }else{
            echo "insert event location from db fail";
        }
        return $result;
    }
}
?>