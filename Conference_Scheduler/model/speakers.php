<?php

//speakerID
//fName
//lName
//phone_num
//email
//
//$speakerID
//$fname
//$lname
//$phone_num
//$email
class speakers {
    private $speakerID, $fName, $lName;
    function __construct($speakerID, $fName, $lName) {
        
        $this->speakerID = $speakerID;
        $this->fName = $fName;
        $this->lName = $lName;
    }
    
    function getSpeakerID() {
        return $this->speakerID;
    }

    function getFname() {
        return $this->fName;
    }

    function getLname() {
        return $this->lName;
    }
    
    function setSpeakerID($speakerID) {
        $this->speakerID = $speakerID;
    }

    function setFname($fName) {
        $this->fName = $fName;
    }

    function setLname($lName) {
        $this->lName = $lName;
    }
}
