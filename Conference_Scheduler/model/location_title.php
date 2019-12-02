<?php 

class location_title {
    private $location_titleID, $locationID, $titleID, $session, $conference_num;
    function __construct($location_titleID, $locationID, $titleID, $session, $conference_num) {
        
        $this->location_titleID = $location_titleID;
        $this->locationID = $locationID;
        $this->titleID = $titleID;
        $this->session = $session;
        $this->conference_num = $conference_num;
        
    }
    function getLocation_titleID() {
        return $this->location_titleID;
    }

    function getLocationID() {
        return $this->locationID;
    }

    function getTitleID() {
        return $this->titleID;
    }
    
    function getSession() {
        return $this->session;
    }

    function getConference_num() {
        return $this->conference_num;
    }
    
    function setLocation_titleID($location_titleID) {
        $this->location_titleID = $location_titleID;
    }

    function setLocationID($locationID) {
        $this->locationID = $locationID;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }
    
    function setSession($session) {
        $this->session = $session;
    }

    function setConference_num($conference_num) {
        $this->conference_num = $conference_num;
    }
}
