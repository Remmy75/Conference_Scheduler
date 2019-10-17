<?php

//speakerID
//fname
//lname
//phone_num
//email
//
//$speakerID
//$fname
//$lname
//$phone_num
//$email
class speakers {
    private $speakerID, $fname, $lname, $phone_num, $email;
    function __construct($speakerID, $fname, $lname, $phone_num, $email) {
        
        $this->speakerID = $speakerID;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->phone_num = $phone_num;
        $this->email = $email;
    }
    
    function getSpeakerID() {
        return $this->speakerID;
    }

    function getFname() {
        return $this->fname;
    }

    function getLname() {
        return $this->lname;
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

    function setFname($fname) {
        $this->fname = $fname;
    }

    function setLname($lname) {
        $this->lname = $lname;
    }

    function setPhone_num($phone_num) {
        $this->phone_num = $phone_num;
    }

    function setEmail($email) {
        $this->email = $email;
    }
}
