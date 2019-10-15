<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of location
 *
 * @author Home
 */
class locations {
    private $locationID, $bldg_name, $roomID;
    function __construct($locationID, $bldg_name, $roomID) {
        
        $this->locationID = $locationID;
        $this->bldg_name = $bldg_name;
        $this->roomID = $roomID;
        
        
        
    }
    function getLocationID() {
        return $this->locationID;
    }

    function getBldgName() {
        return $this->bldg_name;
    }

    function getRoomID() {
        return $this->roomID;
    }

    function setLocationID($locationID) {
        $this->locationID = $locationID;
    }

    function setBldgName($bldg_name) {
        $this->bldg_name = $bldg_name;
    }

    function setRoomID($roomID) {
        $this->roomID = $roomID;
    }

  
}
