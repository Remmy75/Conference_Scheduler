<?php

//title_speakerID
//titleID
//speakerID
//
//$title_speakerID
//$titleID
//$speakerID
//need to add fields to finish
class title_speakers_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM title_speakers';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $title_speakers = [];

        foreach ($rows as $value) {
            $title_speakers[$value['title_speakerID']] = new title_speakers($value['title_speakerID'], $value['titleID'], $value['speakerID']);
        }
        $statement->closeCursor();

        return $title_speakers;
    }


    public static function add_title_speakers($titleID, $speakerID) {
    $db = Database::getDB();

    $query = 'INSERT INTO users
                 (titleID, speakerID)
              VALUES
                 (:titleID, :speakerID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':titleID', $titleID);
    $statement->bindValue(':speakerID', $speakerID);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
    
            
}

    public static function update_speakers_by_title($titleID, $speakerID) {
        $db = Database::getDB();
        $query = 'UPDATE equipment
              SET speakerID = :speakerID,
              WHERE titleID = :titleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':speakerID', $speakerID);
        $statement->bindValue(':titleID', $titleID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    
    public static function get_speakers_by_titleID($titleID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM title_speakers
              WHERE titleID = :titleID';

        $statement = $db->prepare($query);
        $statement->bindValue(':titleID', $titleID);
        $statement->execute();
        $user = $statement->fetch();
        $title_speakers = [];

        foreach ($rows as $value) {
            $title_speakers[$value['$title_speakerID']] = new title_speakers($value['$title_speakerID'], $value['speakerID'], $value['titleID']);
        }
        $statement->closeCursor();

        return $title_speakers;
    }
    
    public static function delete_by_ID($title_speakerID) {
        $db = Database::getDB();
        $query = 'DELETE from title_speakers WHERE title_speakerID = :title_speakerID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':title_speakerID', $title_speakerID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function select_speakerID_with_titleID() {
        $db = Database::getDB();

        $queryUsers = 'SELECT count(titleID) as titleID_count, speakerID FROM title_speakers order by speakerID';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $title_speaker = [];

        foreach ($rows as $value) {
            $title_speaker[$value['speakerID']] = new title_speakers($value['speakerID'], $value['titleID']);
        }
        $statement->closeCursor();

        return $title_speaker;
    }
    
    public static function get_titleID_by_speakerID($speakerID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM title_speakers
              WHERE speakerID = :speakerID';

        $statement = $db->prepare($query);
        $statement->bindValue(':speakerID', $speakerID);
        $statement->execute();
        $user = $statement->fetch();
        $title_speakers = [];

        foreach ($rows as $value) {
            $title_speakers[$value['$title_speakerID']] = new title_speakers($value['$title_speakerID'], $value['speakerID'], $value['titleID']);
        }
        $statement->closeCursor();

        return $title_speakers;
    }
}
