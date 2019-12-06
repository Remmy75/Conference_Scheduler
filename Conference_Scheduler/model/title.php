<?php

//titleID
//title_name
//
//$titleID
//$title_name
class title {
    private $titleID, $title_name;
    function __construct($titleID, $title_name) {
        
        $this->titleID = $titleID;
        $this->title_name = $title_name;
    }
    
    function getTitleID() {
        return $this->titleID;
    }

    function getTitle_name() {
        return $this->title_name;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }

    function setTitle_name($title_name) {
        $this->title_name = $title_name;
    }
}
