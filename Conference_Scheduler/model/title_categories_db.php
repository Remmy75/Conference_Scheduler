<?php


class title_categories_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM title_categories order by categoryID';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $title_categories = [];

        foreach ($rows as $value) {
            $title_category[$value['title_categoryID']] = new title_category($value['title_categoryID'], $value['categoryID'], $value['titleID']);
        }
        $statement->closeCursor();

        return $title_categories;
    }
    
    public static function add_category_title($categoryID, $titleID) {
    $db = Database::getDB();

    $query = 'INSERT INTO title_categories
                 (categoryID, titleID)
              VALUES
                 (:categoryID, :titleID)';
    $statement = $db->prepare($query);
    $statement->bindValue(':titleID', $titleID);
    $statement->bindValue(':categoryID', $categoryID);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;
    
            
    }
    
    
}
