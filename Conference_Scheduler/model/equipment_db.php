<?php

//equipID
//name
//
//$equipID
//$name
//need to add fields to finish
class equipment_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM equipment';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $equipment = [];

        foreach ($rows as $value) {
            $equipment[$value['equipID']] = new equipment($value['equipID'], $value['name']);
        }
        $statement->closeCursor();

        return $equipment;
    }
    
    public static function get_equipment($equipID) {
        $db = Database::getDB();
    
        $query = 'SELECT * FROM equipment
              WHERE equipID = :equipID';
        $statement = $db->prepare($query);
        $statement->bindValue(':equipID', $equipID);
        $statement->execute();
        $user = $statement->fetch();
        $statement->closeCursor();
        return $user;
    }


    public static function add_equipment($name) {
        $db = Database::getDB();

        $query = 'INSERT INTO equipment
                 (name)
                 VALUES
                 (:name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->execute();
        $statement->closeCursor();
    
        $user_id = $db->lastInsertId();
            return $user_id;   
    }

    public static function delete_by_ID($equipID) {
        $db = Database::getDB();
        $query = 'DELETE from equipment WHERE equipID = :equipID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':equipID', $equipID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function update_equipment($equipID, $name) {
        $db = Database::getDB();
        $query = 'UPDATE equipment
              SET name = :name,
              WHERE equipID = :equipID';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':equipID', $equipID);
        $statement->execute();
        $statement->closeCursor();
    }
}
