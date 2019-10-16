<?php

//conference_locationsID
//locationID
//
//$conference_locationsID
//$locationID
//need to add all fields to finish
class conference_locations_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM conference_locations';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $conference_location = [];

        foreach ($rows as $value) {
            $conference_location[$value['conference_locationsID']] = new conference_location($value['conference_locationsID'], $value['locationID']);
        }
        $statement->closeCursor();

        return $conference_location;
    }


    public static function add_conference_locations($locationID) {
    $db = Database::getDB();

    $query = 'INSERT INTO conference_locations
                 (locationID)
              VALUES
                 (:locationID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':locationID', $locationID);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
    
            
    }

    public static function delete_by_ID($conference_locationsID) {
        $db = Database::getDB();
        $query = 'DELETE from conference_locations WHERE conference_locationsID = :conference_locationsID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':conference_locationsID', $conference_locationsID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}
