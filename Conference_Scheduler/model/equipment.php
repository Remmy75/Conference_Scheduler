<?php

class equipment {
    private $equipID, $name;
    function __construct($equipID, $name) {
        
        $this->equipID = $equipID;
        $this->name = $name;
    }
    
    function getEquipID() {
        return $this->equipID;
    }

    function getName() {
        return $this->name;
    }

    function setEquipID($equipID) {
        $this->equipID = $equipID;
    }

    function setName($name) {
        $this->name = $name;
    }
}
