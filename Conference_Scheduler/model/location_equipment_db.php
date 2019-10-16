<?php

//location_equipID
//equipID
//locationID
//
//$location_equipID
//$equipID
//$locationID
//need to add fields to finish
class location_equipment_db {
    
   public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM location_equipment';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $location_equipment = [];

        foreach ($rows as $value) {
            $location_equipment[$value['location_equipID']] = new location_equipment($value['location_equipID'], $value['equipID'], $value['locationID']);
        }
        $statement->closeCursor();

        return $location_equipment;
    }


    public static function add_location_equipment($equipID, $locationID) {
    $db = Database::getDB();

    $query = 'INSERT INTO users
                 (equipID, locationID)
              VALUES
                 (:equipID, :locationID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':equipID', $equipID);
    $statement->bindValue(':locationID', $locationID);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
    }
    
    
    public static function get_equipment_by_location($locationID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM location_equipment
              WHERE locationID = :locationID';

        $statement = $db->prepare($query);
        $statement->bindValue(':locationID', $locationID);
        $statement->execute();
        $user = $statement->fetch();
        $title_need = [];

        foreach ($rows as $value) {
            $title_need[$value['location_equipID']] = new title_need($value['location_equipID'], $value['equipID'], $value['locationID']);
        }
        $statement->closeCursor();

        return $title_need;
    }
    
    public static function delete_by_ID($location_equipID) {
        $db = Database::getDB();
        $query = 'DELETE from location_equipment WHERE location_equipID = :location_equipID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':location_equipID', $location_equipID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}
