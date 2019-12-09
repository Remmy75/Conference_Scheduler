<?php


class categories {
    
    private $categoryID, $category_name;
    function __construct($categoryID, $category_name) {
        
        $this->categoryID = $categoryID;
        $this->category_name = $category_name;
    }
    
    function getCategoryID() {
        return $this->categoryID;
    }

    function getCategory_name() {
        return $this->category_name;
    }

    function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }

    function setCategory_name($category_name) {
        $this->category_name = $category_name;
    }
}
