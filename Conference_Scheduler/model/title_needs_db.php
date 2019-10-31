<?php

//title_needsID
//equipmentID
//titleID
//
//$title_needsID
//$equipmentID
//$titleID
//need to add fields to finish
class title_needs_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM title_needs';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $title_needs = [];

        foreach ($rows as $value) {
            $title_needs[$value['title_needsID']] = new title_needs($value['title_needsID'], $value['equipmentID'], $value['titleID']);
        }
        $statement->closeCursor();

        return $title_needs;
    }


    public static function add_title_need($equipmentID, $titleID) {
    $db = Database::getDB();

    $query = 'INSERT INTO title_needs
                 (equipmentID, titleID)
              VALUES
                 (:equipmentID, :titleID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':equipmentID', $equipmentID);
    $statement->bindValue(':titleID', $titleID);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
}
    
    public static function get_needs_by_titleID($titleID) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM title_needs
              WHERE titleID = :titleID';

        $statement = $db->prepare($query);
        $statement->bindValue(':titleID', $titleID);
        $statement->execute();
        $user = $statement->fetch();
        $title_needs = [];

        foreach ($rows as $value) {
            $title_needs[$value['title_needsID']] = new title_needs($value['title_needsID'], $value['equipmentID'], $value['titleID']);
        }
        $statement->closeCursor();

        return $title_needs;
    }
    
}
