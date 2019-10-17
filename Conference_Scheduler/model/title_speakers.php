<?php

//title_speakerID
//titleID
//speakerID
//
//$title_speakerID
//$titleID
//$speakerID
class title_speakers {
    private $title_speakerID, $speakerID, $titleID;
    function __construct($title_speakerID, $speakerID, $titleID) {
        
        $this->title_speakerID = $title_speakerID;
        $this->speakerID = $speakerID;
        $this->titleID = $titleID;
    
    }
    function getTitle_speakerID() {
        return $this->title_speakerID;
    }

    function getSpeakerID() {
        return $this->speakerID;
    }

    function getTitleID() {
        return $this->titleID;
    }

    function setTitle_speakerID($title_speakerID) {
        $this->title_speakerID = $title_speakerID;
    }

    function setSpeakerID($speakerID) {
        $this->speakerID = $speakerID;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }
}
