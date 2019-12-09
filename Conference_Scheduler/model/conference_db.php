<?php


class conference_db {
    
   public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM conferences';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $conferences = [];

        foreach ($rows as $value) {
            $conferences[$value['conference_num']] = new conference($value['conference_num'], $value['conference_name'], $value['conference_location']);
        }
        $statement->closeCursor();

        return $conferences;
    }

    public static function add_conference($conference_name, $conference_location) {
    $db = Database::getDB();

    $query = 'INSERT INTO conferences
                 (conference_name, conference_location)
              VALUES
                 (:conference_name, :conference_location)';
    $statement = $db->prepare($query);
    $statement->bindValue(':conference_name', $conference_name);
    $statement->bindValue(':conference_location', $conference_location);
    $statement->execute();
    $statement->closeCursor();
    
    $user_id = $db->lastInsertId();
        return $user_id;   
            
}
    
    public static function get_conference($conference_num) {
        $db = Database::getDB();
        $query = 'SELECT *
              FROM conferences
              WHERE conference_num = :conference_num';

        $statement = $db->prepare($query);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $value = $statement->fetch();
        
        $statement->closeCursor();
        return new conference($value['conference_num'], $value['conference_name'], $value['conference_location']);

    }
    
    public static function update_conference($conference_num, $conference_name, $conference_location) {
        $db = Database::getDB();
        $query = 'UPDATE conferences SET conference_name = :conference_name, conference_location = :conference_location WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':conference_name', $conference_name);
        $statement->bindValue(':conference_location', $conference_location);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }
    
}
