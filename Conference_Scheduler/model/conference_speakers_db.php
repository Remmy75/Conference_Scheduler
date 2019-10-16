<?php

//conference_titleID
//titleID
//
//$conference_titleID
//$titleID
//need to add fields to finish
class conference_speakers_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM conference_speakers';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $conference_speakers = [];

        foreach ($rows as $value) {
            $conference_speakers[$value['conference_titleID']] = new conference_speakers($value['conference_titleID'], $value['titleID']);
        }
        $statement->closeCursor();

        return $conference_speakers;
    }


    public static function add_conference_title($titleID) {
    $db = Database::getDB();

    $query = 'INSERT INTO conference_speakers
                 (titleID)
              VALUES
                 (:titleID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':titleID', $titleID);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
    
            
    }
    
    public static function delete_by_ID($conference_titleID) {
        $db = Database::getDB();
        $query = 'DELETE from conference_speakers WHERE conference_titleID = :conference_titleID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':title_speakerID', $conference_titleID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
}
