<?php

class speakers_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM speakers';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $speakers = [];

        foreach ($rows as $value) {
            $speakers[$value['speakerID']] = new speakers($value['speakerID'], $value['fName'], $value['lName']);
        }
        $statement->closeCursor();

        return $speakers;
    }
    
    public static function get_speaker($speakerID) {
        $db = Database::getDB();
    
        $query = 'SELECT * FROM speakers
              WHERE speakerID = :speakerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':speakerID', $speakerID);
        $statement->execute();
        $row = $statement->fetch();
        
        $statement->closeCursor();
        return new speakers($row['speakerID'], $row['fName'], $row['lName']);
  
    }
    
    
    public static function add_speaker($fname, $lname) {
        $db = Database::getDB();

        $query = 'INSERT INTO speakers
                 (fname, lname)
              VALUES
                 (:fname, :lname)';
        $statement = $db->prepare($query);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->execute();
        $statement->closeCursor();
    
        $user_id = $db->lastInsertId();
            return $user_id;       
    }
    
    public static function update_speakers($speakerID, $fname, $lname) {
        $db = Database::getDB();
        $query = 'UPDATE speakers SET fname = :fname, lname = :lname WHERE speakerID = :speakerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':speakerID', $speakerID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function delete_by_ID($speakerID) {
        $db = Database::getDB();
        $query = 'DELETE from speakers WHERE speakerID = :speakerID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':speakerID', $speakerID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
}
