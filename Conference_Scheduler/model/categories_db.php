<?php

class categories_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM categories';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $categories = [];

        foreach ($rows as $value) {
            $category[$value['categoryID']] = new category($value['categoryID'], $value['category_name']);
        }
        $statement->closeCursor();

        return $categories;
    }
}
