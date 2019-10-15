<?php
//need to edit field names
class locations_db {
    
     public static function select_all() {
        $db = Database::getDB();

        $queryUsers = 'SELECT * FROM locations';
        $statement = $db->prepare($queryUsers);
        $statement->execute();
        $rows = $statement->fetchAll();
        $locations = [];

        foreach ($rows as $value) {
            $locations[$value['locationID']] = new location($value['locationID'], $value['bldg_name'], $value['roomID']);
        }
        $statement->closeCursor();

        return $locations;
    }

    public static function get_locations($bldg_name) {
        $db = Database::getDB();

        $queryLocations = 'SELECT *'
                . 'FROM locations '
                . 'WHERE bldg_name = :bldg_name';

        $statement = $db->prepare($queryLocations);
        $statement->bindValue(':bldg_name', $bldg_name);
        $statement->execute();
        $rows = $statement->fetchAll();


        $locations = [];
        foreach ($rows as $row) {
            $locations[$row['bldg_name']] = new location($value['locationID'], $value['bldg_name'], $value['roomID']);
        }

        $statement->closeCursor();
        return $stores;
    }
    
    public static function add_location($bldg_name, $roomID) {
        $db = Database::getDB();
        $query = 'INSERT INTO locations
                 (bldg_name, roomID)
              VALUES
                 (:bldg_name, :roomID)';
        $statement = $db->prepare($query);

        $statement->bindValue(':bldg_name', $bldg_name);
        $statement->bindValue(':roomID', $roomID);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function update_location($locationID, $bldg_name, $roomID) {
        $db = Database::getDB();
        $query = 'UPDATE locations
              SET bldg_name = :bldg_name,
                  roomID = :roomID,
              WHERE locationID = :locationID';
        $statement = $db->prepare($query);
        $statement->bindValue(':bldg_name', $bldg_name);
        $statement->bindValue(':roomID', $roomID);
        $statement->bindValue(':locationID', $locationID);
        $statement->execute();
        $statement->closeCursor();
    }

}
?>

