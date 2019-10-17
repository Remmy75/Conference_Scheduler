<?php

//scheduleID
//conferenceID
//titleID
//locationID
//time
//
//$scheduleID
//$conferenceID
//$titleID
//$locationID
//$time
class conference_schedule {
    private $scheduleID, $conferenceID, $titleID, $locationID, $time;
    function __construct($scheduleID, $conferenceID, $titleID, $locationID, $time) {
        
        $this->scheduleID = $scheduleID;
        $this->conferenceID = $conferenceID;
        $this->titleID = $titleID;
        $this->locationID = $locationID;
        $this->time = $time;
    }
    
    function getScheduleID() {
        return $this->scheduleID;
    }

    function getConferenceID() {
        return $this->conferenceID;
    }

    function getTitleID() {
        return $this->titleID;
    }

    function getLocationID() {
        return $this->locationID;
    }

    function getTime() {
        return $this->time;
    }
    
    function setScheduleID($scheduleID) {
        $this->scheduleID = $scheduleID;
    }

    function setConferenceID($conferenceID) {
        $this->conferenceID = $conferenceID;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }

    function setLocationID($locationID) {
        $this->locationID = $locationID;
    }

    function setTime($time) {
        $this->time = $time;
    }
}
