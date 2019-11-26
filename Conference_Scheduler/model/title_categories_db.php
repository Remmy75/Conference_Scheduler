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
    
    
}
