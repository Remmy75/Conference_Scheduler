<?php

//conference_locationsID
//locationID
//
//$conference_locationsID
//$locationID
class conference_locations {

    private $conference_locationsID, $locationID;
    function __construct($conference_locationsID, $locationID) {
        
        $this->conference_locationsID = $conference_locationsID;
        $this->locationID = $locationID;
    }
    
    function getConference_locationsID() {
        return $this->conference_locationsID;
    }

    function getLocationID() {
        return $this->locationID;
    }

    function setConference_locationsID($conference_locationsID) {
        $this->conference_locationsID = $conference_locationsID;
    }

    function setLocationID($locationID) {
        $this->locationID = $locationID;
    }
}


