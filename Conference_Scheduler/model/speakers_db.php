<?php

//need to add fields to finish
class speakers_db {
    public static function get_speaker($speakerID) {
    $db = Database::getDB();
    
    $query = 'SELECT * FROM speakers
              WHERE speakerID = :speakerID';
    $statement = $db->prepare($query);
    $statement->bindValue(':speakerID', $speakerID);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $speaker;
}


    public static function add_speaker($userName, $userFName, $userLName, $hashedPW, $userEmail) {
    $db = Database::getDB();

    $query = 'INSERT INTO users
                 (userName, userFName, userLName, userPWord, userEmail)
              VALUES
                 (:userName, :userFName, :userLName, :userPWord, :userEmail)';
    $statement = $db->prepare($query);
    $statement->bindValue(':userName', $userName);
    $statement->bindValue(':userFName', $userFName);
    $statement->bindValue(':userLName', $userLName);
    $statement->bindValue(':userPWord', $hashedPW);
    $statement->bindValue(':userEmail', $userEmail);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
    
            
}

    public static function check_user_by_email($userEmail) {
        $db = Database::getDB();
        $query = 'SELECT userEmail
              FROM users
              WHERE userEmail= :userEmail';

        $statement = $db->prepare($query);
        $statement->bindValue(':userEmail', $userEmail);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
        
        return $user;
}
    
    public static function get_user_by_username($userName) {
        $db = Database::getDB();
        $query = 'SELECT userName
              FROM users
              WHERE userName= :userName';

        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
        
        return $user;
    }
    
    public static function validate_user_login($userName) {
        $db = Database::getDB();;
        $query = 'SELECT userIDNum, userName, userFName, userLName, userPWord, userEmail
              FROM users
              WHERE userName= :userName';

        $statement = $db->prepare($query);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $value = $statement->fetch();

        $theUser = new user($value['userIDNum'], $value['userName'], $value['userFName'], $value['userLName'], $value['userPWord'], $value['userEmail']);
        
        $statement->closeCursor();

        return $theUser;
    }
}
