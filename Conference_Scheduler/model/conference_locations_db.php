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
        $conference_locations = [];

        foreach ($rows as $value) {
            $conference_locations[$value['conference_locationsID']] = new conference_location($value['conference_locationsID'], $value['locationID']. $value['conference_num']);
        }
        $statement->closeCursor();

        return $conference_locations;
    }
    
     public static function select_all_with_conference_num($conference_num) {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM conference_locations where conference_num = :conference_num';
        $statement = $db->prepare($queryUsers);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $rows = $statement->fetchAll();
        $conference_locations = [];

        foreach ($rows as $value) {
            $conference_locations[$value['conference_locationsID']] = new conference_location($value['conference_locationsID'], $value['locationID']);
        }
        $statement->closeCursor();

        return $conference_locations;
    }


    public static function add_conference_locations($conference_num, $locationID) {
    $db = Database::getDB();

    $query = 'INSERT INTO conference_locations
                 (conference_num, locationID)
              VALUES
                 (:conference_num, :locationID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':locationID', $locationID);
    $statement->bindValue(':conference_num', $conference_num);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
    
            
    }
    
    public static function add_conference_titles($conference_num, $titleID) {
    $db = Database::getDB();

    $query = 'INSERT INTO conference_speakers
                 (conference_num, titleID)
              VALUES
                 (:conference_num, :titleID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':titleID', $titleID);
    $statement->bindValue(':conference_num', $conference_num);
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
    
    public static function select_locations_with_conference_num_category_count($conference_num) {
        $db = Database::getDB();

        $queryUsers = 'SELECT locationID FROM conference_locations where conference_num = :conference_num';
        $statement = $db->prepare($queryUsers);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $rows = $statement->fetchAll();
        $conference_locations = [];

        foreach ($rows as $value) {
            array_push($conference_locations, $value['locationID']);
        }
        $statement->closeCursor();

        return $conference_locations;
    }

    public static function location_count_by_conference_num($conference_num) {
        $db = Database::getDB();

        $queryUsers = 'SELECT count(locationID) FROM conference_locations where conference_num = :conference_num';
        $statement = $db->prepare($queryUsers);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $rows = $statement->fetch();
        $statement->closeCursor();

        return $rows;
    }
}
