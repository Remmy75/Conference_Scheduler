<?php


//titleID
//title_name
//
//$titleID
//$title_name
//need to add fields to finish
class title_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM title';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $title = [];

        foreach ($rows as $value) {
            $title[$value['titleID']] = new title($value['titleID'], $value['title_name']);
        }
        $statement->closeCursor();

        return $title;
    }


    public static function add_title($title_name) {
    $db = Database::getDB();

    $query = 'INSERT INTO users
                 (title_name)
              VALUES
                 (:title_name)';
    $statement = $db->prepare($query);
    $statement->bindValue(':title_name', $title_name);
    $statement->execute();
    $statement->closeCursor();
    
     $user_id = $db->lastInsertId();
            return $user_id;

}

    public static function update_title($titleID, $title_name) {
        $db = Database::getDB();
        $query = 'UPDATE title
              SET title_name = :title_name,
              WHERE titleID = :titleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':title_name', $title_name);
        $statement->bindValue(':titleID', $titleID);
        $statement->execute();
        $statement->closeCursor();
    }
    
}
