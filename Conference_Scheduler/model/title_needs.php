<?php

//title_needsID
//equipmentID
//titleID
//
//$title_needsID
//$equipmentID
//$titleID
class title_needs {
    private $title_needsID, $equipmentID, $titleID;
    function __construct($title_needsID, $equipmentID, $titleID) {
        
        $this->title_needsID = $title_needsID;
        $this->equipmentID = $equipmentID;
        $this->titleID = $titleID;
        
        
        
    }
    function getTitle_needsID() {
        return $this->title_needsID;
    }

    function getEquipmentID() {
        return $this->equipmentID;
    }

    function getTitleID() {
        return $this->titleID;
    }

    function setTitle_needsID($title_needsID) {
        $this->title_needsID = $title_needsID;
    }

    function setEquipmentID($equipmentID) {
        $this->equipmentID = $equipmentID;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }
}
