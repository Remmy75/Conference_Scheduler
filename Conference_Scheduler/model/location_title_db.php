<<?php

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
            $locations[$value['location_titleID']] = new locations($value['location_titleID'], $value['locationID'], $value['titleID'], $value['session'], $value['conference_num']);
        }
        $statement->closeCursor();

        return $locations;
    }
    
    public static function get_session_by_locationID($locationID) {
        $db = Database::getDB();
        $query = 'SELECT session
              FROM location_title
              WHERE locationID = :locationID';

        $statement = $db->prepare($query);
        $statement->bindValue(':locationID', $locationID);
        $statement->execute();
        $location_session = $statement->fetch();
        $statement->closeCursor();
        return $location_session;
    }
    
    public static function assign_title_to_location($locationID, $titleID, $session, $conference_num) {
        $db = Database::getDB();

        $query = 'INSERT INTO location_title
                 (locationID, titleID, session, conference_num)
                 VALUES
                 (:locationID, :titleID, :session, :conference_num)';
        $statement = $db->prepare($query);
        $statement->bindValue(':locationID', $locationID);
        $statement->bindValue(':titleID', $titleID);
        $statement->bindValue(':session', $session);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    
        $location_titleID = $db->lastInsertId();
            return $location_titleID;
    
            
    }
    
}
