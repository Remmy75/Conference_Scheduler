<?php

//locationID
//bldg_name
//room_num

//$locationID
//$bldg_name
//$room_num
class locations {
    private $locationID, $bldg_name, $room_num;
    function __construct($locationID, $bldg_name, $room_num) {
        
        $this->locationID = $locationID;
        $this->bldg_name = $bldg_name;
        $this->room_num = $room_num;
        
        
        
    }
    function getLocationID() {
        return $this->locationID;
    }

    function getBldgName() {
        return $this->bldg_name;
    }

    function getRoom_num() {
        return $this->room_num;
    }

    function setLocationID($locationID) {
        $this->locationID = $locationID;
    }

    function setBldgName($bldg_name) {
        $this->bldg_name = $bldg_name;
    }

    function setRoom_num($room_num) {
        $this->room_num = $room_num;
    }

  
}
