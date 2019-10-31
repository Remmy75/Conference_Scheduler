<?php

//scheduleID
//conferenceID
//titleID
//locationID
//time
//
//$scheduleID
//$conferenceID
//$titleID
//$locationID
//$time
//need to add all fields to finish
class conference_schedule_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM conference_schedule';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $conference_schedules = [];

        foreach ($rows as $value) {
            $conference_schedules[$value['scheduleID']] = new conference_scheduled($value['scheduleID'], $value['conferenceID'], $value['titleID'], $value['locationID'], $value['time']);
        }
        $statement->closeCursor();

        return $conference_schedules;
    }

    public static function update_conference_schedule_conferenceID($scheduleID, $conferenceID) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET conferenceID = :conferenceID,
              WHERE scheduleID = :scheduleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':conferenceID', $conferenceID);
        $statement->bindValue(':scheduleID', $scheduleID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function update_conference_schedule_titleID($scheduleID, $titleID) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET titleID = :titleID,
              WHERE scheduleID = :scheduleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':titleID', $titleID);
        $statement->bindValue(':scheduleID', $scheduleID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function update_conference_schedule_locationID($scheduleID, $locationID) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET locationID = :locationID,
              WHERE scheduleID = :scheduleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':locationID', $locationID);
        $statement->bindValue(':scheduleID', $scheduleID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function update_conference_schedule_time($scheduleID, $time) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET time = :time,
              WHERE scheduleID = :scheduleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':time', $time);
        $statement->bindValue(':scheduleID', $scheduleID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function add_to_conference($conferenceID, $titleID, $locationID, $time) {
    $db = Database::getDB();

    $query = 'INSERT INTO conference_schedule
                 (conferenceID, titleID, locationID, time)
              VALUES
                 (:conferenceID, :titleID, :locationID, :time)';
    $statement = $db->prepare($query);
    $statement->bindValue(':conferenceID', $conferenceID);
    $statement->bindValue(':titleID', $titleID);
    $statement->bindValue(':locationID', $locationID);
    $statement->bindValue(':time', $time);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
             
}

    public static function delete_by_ID($scheduleID) {
        $db = Database::getDB();
        $query = 'DELETE from conference_schedule WHERE scheduleID = :scheduleID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':scheduleID', $scheduleID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }

    public static function get_scheduled_by_conferenceID($conferenceID) {
        $db = Database::getDB();
        $query = 'SELECT conferenceID
              FROM conference_schedule
              WHERE conferenceID = :conferenceID';

        $statement = $db->prepare($query);
        $statement->bindValue(':conferenceID', $conferenceID);
        $statement->execute();
        $conference = $statement->fetch();
        $statement->closeCursor();
        
        return $conference;
    }
    
    public static function get_scheduled_by_titleID($titleID) {
        $db = Database::getDB();
        $query = 'SELECT titleID
              FROM conference_schedule
              WHERE titleID = :titleID';

        $statement = $db->prepare($query);
        $statement->bindValue(':titleID', $titleID);
        $statement->execute();
        $conference = $statement->fetch();
        $statement->closeCursor();
        
        return $conference;
    }
}
