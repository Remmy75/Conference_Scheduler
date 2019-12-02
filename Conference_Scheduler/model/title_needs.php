<?php

//title_needsID
//equipmentID
//titleID
//
//$title_needsID
//$equipmentID
//$titleID
class title_needs {
    private $title_needsID, $equipID, $titleID;
    function __construct($title_needsID, $equipID, $titleID) {
        
        $this->title_needsID = $title_needsID;
        $this->equipID = $equipID;
        $this->titleID = $titleID;
        
        
        
    }
    function getTitle_needsID() {
        return $this->title_needsID;
    }

    function getEquipID() {
        return $this->equipID;
    }

    function getTitleID() {
        return $this->titleID;
    }

    function setTitle_needsID($title_needsID) {
        $this->title_needsID = $title_needsID;
    }

    function setEquipmentID($equipID) {
        $this->equipID = $equipID;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }
}
