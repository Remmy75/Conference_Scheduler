<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of location_title_db
 *      $this->room_titleID = $room_titleID;
        $this->titleID = $room_num;
        $this->room_num = $titleID;
 * @author william.remaklus
 */
class location_title_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM location_title';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $locations = [];

        foreach ($rows as $value) {
            $locations[$value['room_titleID']] = new locations($value['room_titleID'], $value['room_num'], $value['titleID']);
        }
        $statement->closeCursor();

        return $locations;
    }
    
    
}