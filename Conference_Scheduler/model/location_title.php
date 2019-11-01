<?php

class location_title {
    private $room_titleID, $room_num, $titleID;
    function __construct($room_titleID, $room_titleID, $titleID) {
        
        $this->room_titleID = $room_titleID;
        $this->room_num = $room_num;
        $this->titleID = $titleID;      
        
    }
    function getRoom_titleID() {
        return $this->room_titleID;
    }

    function getTitleID() {
        return $this->room_num;
    }

    function getRoom_num() {
        return $this->titleID;
    }

    function setRoom_titleID($room_titleID) {
        $this->room_titleID = $room_titleID;
    }

    function setRoom_num($room_num) {
        $this->room_num = $room_num;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }
}
