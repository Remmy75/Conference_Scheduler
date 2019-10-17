<?php

//location_equipID
//equipID
//locationID
//
//$location_equipID
//$equipID
//$locationID
class location_equipment {
   private $location_equipID, $equipID, $locationID;
    function __construct($location_equipID, $equipID, $locationID) {
        
        $this->location_equipID = $location_equipID;
        $this->equipID = $equipID;
        $this->locationID = $locationID;
    }
    
    function getLocation_equipID() {
        return $this->location_equipID;
    }

    function getEquipID() {
        return $this->equipID;
    }

    function getLocationID() {
        return $this->locationID;
    }
    
    function setLocation_equipID($location_equipID) {
        $this->location_equipID = $location_equipID;
    }

    function setEquipID($equipID) {
        $this->equipID = $equipID;
    }
    
    function setLocationID($locationID) {
        $this->locationID = $locationID;
    }
}
