<?php


class title_db {
    
    public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM title';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $titles = [];

        foreach ($rows as $value) {
            $titles[$value['titleID']] = new title($value['titleID'], $value['title_name']);
        }
        $statement->closeCursor();

        return $titles;
    }
    
    public static function get_title($titleID) {
        $db = Database::getDB();
    
        $query = 'SELECT * FROM title
              WHERE titleID = :titleID';
        $statement = $db->prepare($query);
        $statement->bindValue(':titleID', $titleID);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
    
        return new title($row['titleID'], $row['title_name']);
    }

    public static function add_title($title_name) {
    $db = Database::getDB();

    $query = 'INSERT INTO title
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
    
    public static function get_title_with_category_by_conference($conferenceID) {
        $db = Database::getDB();

        $queryUsers = 'SELECT title.titleID, title_category.categoryID  FROM title_category join title on title_category.titleID = title.titleID join conference_speakers on title.titleID = conference_speakers.titleID WHERE conferenceID = :conferenceID ORDER BY title_category.categoryID';
        $statement = $db->prepare($queryUsers);
        $statement->bindValue(':titleID', $titleID);
        $statement->bindValue(':categoryID', $categoryID);
        $statement->bindValue(':conferenceID', $conferenceID);
        $statement->execute();
        $rows = $statement->fetchAll();
        $title_with_categories = [];

        foreach ($rows as $value) {
            array_push($title_with_categories, $value['titleID'], $value['categoryID']);
        }
        $statement->closeCursor();

        return $title_with_categories;
    }
    
}
