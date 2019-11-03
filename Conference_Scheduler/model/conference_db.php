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
            $conferences[$value['conference_num']] = new conference($value['conference_num'], $value['conference_name'], $value['conference_location'], $value['start_time'], $value['end_time'], $value['lunch'], $value['session_length'], $value['break_length']);
        }
        $statement->closeCursor();

        return $conferences;
    }
    
    public static function update_conference_conference_name($conference_num, $conference_name) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET conference_name = :conference_name,
              WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':conference_name', $conference_name);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }

     public static function update_conference_conference_location($conference_num, $conference_location) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET conference_location = :conference_location,
              WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':conference_location', $conference_location);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function update_conference_start_time($conference_num, $start_time) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET start_time = :start_time,
              WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':start_time', $start_time);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }

     public static function update_conference_end_time($conference_num, $end_time) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET end_time = :end_time,
              WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':end_time', $end_time);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function update_conference_lunch($conference_num, $lunch) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET lunch = :lunch,
              WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':lunch', $lunch);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }

     public static function update_conference_session_length($conference_num, $session_length) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET session_length = :session_length,
              WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':session_length', $session_length);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }
    
    public static function update_conference_break_length($conference_num, $break_length) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET break_length = :break_length,
              WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':break_length', $break_length);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function add_conference($conference_name, $conference_location, $start_time, $end_time, $lunch, $session_length, $break_length) {
    $db = Database::getDB();

    $query = 'INSERT INTO conferences
                 (conference_name, conference_location, start_time, end_time, lunch, session_length, break_length)
              VALUES
                 (, :conference_name, :conference_location, :start_time, :end_time, :lunch, :session_length, :break_length)';
    $statement = $db->prepare($query);
    $statement->bindValue(':conference_name', $conference_name);
    $statement->bindValue(':conference_location', $conference_location);
    $statement->bindValue(':start_time', $start_time);
    $statement->bindValue(':end_time', $end_time);
    $statement->bindValue(':lunch', $lunch);
    $statement->bindValue(':session_length', $session_length);
    $statement->bindValue(':break_length', $break_length);
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
        return new conference($value['conference_num'], $value['conference_name'], $value['conference_location'], $value['start_time'], $value['end_time'], $value['lunch'], $value['session_length'], $value['break_length']);

    }
    
    public static function update_conference($conference_num, $conference_name, $conference_location, $start_time, $end_time, $lunch, $session_length, $break_length) {
        $db = Database::getDB();
        $query = 'UPDATE conference_schedule
              SET conference_name = :conference_name,
              WHERE conference_num = :conference_num';
        $statement = $db->prepare($query);
        $statement->bindValue(':conference_name', $conference_name);
        $statement->bindValue(':conference_location', $conference_location);
        $statement->bindValue(':start_time', $start_time);
        $statement->bindValue(':end_time', $end_time);
        $statement->bindValue(':lunch', $lunch);
        $statement->bindValue(':session_length', $session_length);
        $statement->bindValue(':break_length', $break_length);
        $statement->bindValue(':conference_num', $conference_num);
        $statement->execute();
        $statement->closeCursor();
    }
    
}
