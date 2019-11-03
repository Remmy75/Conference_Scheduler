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
            $speakers[$value['speakerID']] = new speakers($value['speakerID'], $value['fName'], $value['lName'], $value['phone_num'], $value['email']);
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
        return new speakers($row['speakerID'], $row['fName'], $row['lName'], $row['phone_num'], $row['email']);
        
        
        
    }
    
    
    public static function add_speaker($fname, $lname, $phone_num, $email) {
        $db = Database::getDB();

        $query = 'INSERT INTO users
                 (fname, lname, phone_num, email)
              VALUES
                 (:fname, :lname, :phone_num, :email)';
        $statement = $db->prepare($query);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':phone_num', $phone_num);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $statement->closeCursor();
    
        $user_id = $db->lastInsertId();
            return $user_id;       
    }
    
    public static function update_speakers_fName($speakerID, $fname) {
        $db = Database::getDB();
        $query = 'UPDATE speakers
              SET fname = :fname,
              WHERE speakerID = :speakerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':speakerID', $speakerID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function update_speakers_lName($speakerID, $lname) {
        $db = Database::getDB();
        $query = 'UPDATE speakers
              SET lname = :lname,
              WHERE speakerID = :speakerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':speakerID', $speakerID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function update_speakers_phone_num($speakerID, $phone_num) {
        $db = Database::getDB();
        $query = 'UPDATE speakers
              SET phone_num = :phone_num,
              WHERE speakerID = :speakerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':phone_num', $phone_num);
        $statement->bindValue(':speakerID', $speakerID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function update_speakers_email($speakerID, $email) {
        $db = Database::getDB();
        $query = 'UPDATE speakers
              SET email = :email,
              WHERE speakerID = :speakerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':speakerID', $speakerID);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function update_speakers($speakerID, $fname, $lname, $phone_num, $email) {
        $db = Database::getDB();
        $query = 'UPDATE speakers
              SET fname = :fname,
                  lname = :lname,
                  phone_num = :phone_num,
                  email = :email
              WHERE speakerID = :speakerID';
        $statement = $db->prepare($query);
        $statement->bindValue(':fname', $fname);
        $statement->bindValue(':lname', $lname);
        $statement->bindValue(':phone_num', $phone_num);
        $statement->bindValue(':email', $email);
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
