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
    private $speakerID, $fName, $lName, $phone_num, $email;
    function __construct($speakerID, $fName, $lName, $phone_num, $email) {
        
        $this->speakerID = $speakerID;
        $this->fName = $fName;
        $this->lName = $lName;
        $this->phone_num = $phone_num;
        $this->email = $email;
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

    function getPhone_num() {
        return $this->phone_num;
    }

    function getEmail() {
        return $this->email;
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

    function setPhone_num($phone_num) {
        $this->phone_num = $phone_num;
    }

    function setEmail($email) {
        $this->email = $email;
    }
}
