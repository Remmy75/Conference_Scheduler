<?php

//titleID
//title_name
//
//$titleID
//$title_name
class title {
    private $titleID, $title_name, $category;
    function __construct($titleID, $title_name, $category) {
        
        $this->titleID = $titleID;
        $this->title_name = $title_name;
        $this->category = $category;
    }
    
    function getTitleID() {
        return $this->titleID;
    }

    function getTitle_name() {
        return $this->title_name;
    }
    
    function getCategory() {
        return $this->category;
    }

    function setTitleID($titleID) {
        $this->titleID = $titleID;
    }

    function setTitle_name($title_name) {
        $this->title_name = $title_name;
    }
    
    function setCategory($category) {
        $this->category = $category;
    }
}
