<?php

require_once(__DIR__ . "/../tools/database.php");
require_once(__DIR__ . "/../tools/constants.php");
require_once(__DIR__ . "/../dbmodel/db_bneart.php");
require_once(__DIR__."/userController.php");

class Artistocial
{


    private $db;

    function __construct()
    {
        $this->db = new Db();
    }


    public function getEventLocation($eventLocationId)
    {
        $eventLocation = $this->db->query(getEventLocationSql($eventLocationId));
        if (count($eventLocation) > 0) {
            return dataToModelEventLocation($eventLocation[0]);
        }
        return null;
    }

    public function getArtCollection($artCollectionId)
    {
        $artcollection = $this->db->query(getArtCollectionSql($artCollectionId));
        if (count($artcollection) > 0) {
            return dataToModelArtCollection($artcollection[0]);
        }
        return null;
    }

    public function getAllArtcollection()
    {
        $artCollection_result = $this->db->query(getAllArtCollectionSql());
        $artcollections = array();
        foreach($artCollection_result as $k=>$v){
            array_push($artcollections, dataToModelArtCollection($v));
        }
        return $artcollections;
    }

    public function getLibrary($libraryId)
    {
        $library = $this->db->query(getLibrarySql($libraryId));
        if (count($library) > 0) {
            return dataToModelLibrary($library[0]);
        }
        return null;
    }

    public function getAllLibrarys()
    {
        $library_result = $this->db->query(getAllLibrarySql());
        $libraries = array();
        foreach($library_result as $k=>$v){
            array_push($libraries, dataToModelLibrary($v));
        }
        return $libraries;
    }

    public function getEvent($eventId)
    {
        $event = $this->db->query(getEventSql($eventId));
        if (count($event) > 0) {
            return dataToModelEvent($event[0]);
        }
        return null;
    }

    public function getHotEvent(){
        $result = $this->db->query(getHotEventSql());
        $events = array();
        foreach($result as $k=>$v){
            array_push($events, dataToModelEvent($v));
        }
        return $events;
    }

    public function saveArtCollection(ArtistocialArtCollection $artCollection)
    {
        $result = $this->db->preparedStatment(getInsertArtCollectionSql(), str_repeat('s', 10), [
            $artCollection->resourceId,
            $artCollection->title,
            $artCollection->artist,
            $artCollection->location,
            $artCollection->material,
            $artCollection->description,
            $artCollection->installed,
            $artCollection->latitude,
            $artCollection->longitude,
            ''
        ]);
        if ($result) {
            echo "insert art collection from db successful";
        } else {
            echo "insert  art collection  from db fail";
        }
        return $result;
    }

    public function saveEventLocation(ArtistocialEventLocation $eventLocation)
    {
        $result = $this->db->preparedStatment(getInserteventLocationSql(), str_repeat('s', 6), [
            $eventLocation->resourceId,
            $eventLocation->name,
            $eventLocation->type,
            $eventLocation->latitude,
            $eventLocation->longitude,
            $eventLocation->address
        ]);
        if ($result) {
            echo "insert event location from db successful";
        } else {
            echo "insert event location from db fail";
        }
        return $result;
    }


    public function saveLibrary(ArtistocialLibrary $library)
    {
        $result = $this->db->preparedStatment(getInsertLibrarySql(), str_repeat('s', 29), [
            $library->resourceId,
            $library->name,
            $library->type,
            $library->serviceName,
            $library->serviceType,
            $library->wifi,
            $library->address1,
            $library->address2,
            $library->locality,
            $library->postcode,
            $library->phone,
            $library->mobile,
            $library->email,
            $library->managerTitle,
            $library->managerName,
            $library->managerPhone,
            $library->managerEmail,
            $library->dateCreated,
            $library->dateUpdated,
            $library->latitude,
            $library->longitude,
            $library->directoryUrl,
            $library->monday,
            $library->tuesday,
            $library->wednesday,
            $library->thursday,
            $library->friday,
            $library->saturday,
            $library->sunday
        ]);
        if ($result) {
            echo "insert library from db successful";
        } else {
            echo "insert library from db fail";
        }
        return $result;
    }

    public function saveEvent(ArtistocialEvent $event)
    {
        $result = $this->db->preparedStatment(getInsertEventSql(), str_repeat('s', 27), [
            $event->resourceId,
            $event->template,
            $event->title,
            $event->description,
            $event->locationType,
            $event->location,
            $event->startDateTime,
            $event->endDateTime,
            $event->dateTimeFormatted,
            $event->allDay,
            $event->canceled,
            $event->openSignUp,
            $event->reservationFull,
            $event->pastDeadline,
            $event->pastCancelDeadline,
            $event->requiresPayment,
            $event->refundsAllowed,
            $event->cost,
            $event->eventImage,
            $event->detailImage,
            $event->venue,
            $event->eventType,
            $event->age,
            $event->permaLinkUrl,
            $event->eventActionUrl,
            $event->categoryCalendar,
            $event->requirements
        ]);
        if ($result) {
            echo "insert library from db successful";
        } else {
            echo "insert library from db fail";
        }
        return $result;
    }

    public function getRecommendEvent($userid){
        global $arttype_eventarttype_match;
        $user = new User();
        $u = $user->getUserById($userid);
        $eventtype = $arttype_eventarttype_match[$u->arttype];
        
        $result = $this->db->query(getRecommendEventSql($eventtype));
        $events = array();
        foreach($result as $k=>$v){
            array_push($events, dataToModelEvent($v));
        }
        return $events;   
    }

    public function getRecommendArtCollection($userid){
        global $arttype_artcollectionarttype_match;
        $user = new User();
        $u = $user->getUserById($userid);
        $artCollectionType = $arttype_artcollectionarttype_match[$u->arttype];
        
        $artcollections_result = $this->db->query(getRecommendArtcollectionSql($artCollectionType));
        $artcollections = array();
        foreach($artcollections_result as $k=>$v){
            array_push($artcollections, dataToModelArtCollection($v));
        }
        return $artcollections;

    }
}
