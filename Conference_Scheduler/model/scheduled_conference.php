<?php


class scheduled_conference {
    private $room_num, $title_name, $lName, $session_number, $conference_name;
    function __construct($room_num, $title_name, $lName, $session_number, $conference_name) {
        
        $this->room_num = $room_num;
        $this->title_name = $title_name;
        $this->lName = $lName;
        $this->session_number = $session_number;
        $this->conference_name = $conference_name;
    }
    
    function getRoom_num() {
        return $this->room_num;
    }
    
    function getTitle_name() {
        return $this->title_name;
    }

    function getLName() {
        return $this->lName;
    }
        
    function getSession_number() {
        return $this->session_number;
    }
    
    function getConference_name() {
        return $this->conference_name;
    }
    
    function setRoom_num($room_num) {
        $this->room_num = $room_num;
    }

    function setTitle_name($title_name) {
        $this->title_name = $title_name;
    }

    function setLName($lName) {
        $this->lName = $lName;
    }
      
    function setSession_number($session_number) {
        $this->session_number = $session_number;
    }    
    
    function setConference_name($conference_name) {
        $this->conference_name = $conference_name;
    }
}
