<?php

//conference_titleID
//titleID
//
//$conference_titleID
//$titleID
class conference_speakers {
    private $conference_titleID, $titleID;
    function __construct($conference_titleID, $titleID) {
        
        $this->conference_titleID = $conference_titleID;
        $this->titleID = $titleID;
    }
    
    function getConference_titleID() {
        return $this->conference_titleID;
    }

    function getTitleID() {
        return $this->titleID;
    }

    function setConference_titleID($conference_titleID) {
        $this->conference_titleID = $conference_titleID;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }
}
