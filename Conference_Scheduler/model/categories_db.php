<?php

class categories_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM category';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $categories = [];

        foreach ($rows as $value) {
            $categories[$value['categoryID']] = new categories($value['categoryID'], $value['category_name']);
        }
        $statement->closeCursor();

        return $categories;
    }
    
     public static function get_category($categoryID) {
        $db = Database::getDB();
    
        $query = 'SELECT * FROM category
              WHERE categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $row = $statement->fetch();
       
        $statement->closeCursor();
        return new categories($row['categoryID'], $row['category_name']);

    }


    public static function add_category($category_name) {
        $db = Database::getDB();

        $query = 'INSERT INTO category
                 (category_name)
                 VALUES
                 (:category_name)';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_name', $category_name);
        $statement->execute();
        $statement->closeCursor();
    
        $user_id = $db->lastInsertId();
            return $user_id;   
    }

    public static function delete_by_ID($categoryID) {
        $db = Database::getDB();
        $query = 'DELETE from category WHERE categoryID = :categoryID';
        try {
            $statement = $db->prepare($query);
            $statement->bindValue(':categoryID', $categoryID);
            $row_count = $statement->execute();
            $statement->closeCursor();
            return $row_count;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            display_db_error($error_message);
        }
    }
    
    public static function update_category($categoryID, $category_name) {
        $db = Database::getDB();
        $query = 'UPDATE category
              SET category_name = :category_name
              WHERE categoryID = :categoryID';
        $statement = $db->prepare($query);
        $statement->bindValue(':category_name', $category_name);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->execute();
        $statement->closeCursor();
    }
}
