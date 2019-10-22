<!DOCTYPE html>
<!-- SQL Query for locations equipment for conference
SELECT equipment.equipID, equipment.name, locations.bldg_name, locations.room_num
FROM equipment JOIN location_equip on equipment.equipID = location_equip.equipID
			   JOIN locations on location_equip.locationID = locations.locationID
			   JOIN conference_locations on locations.locationID = conference_locations.locationID
WHERE conference_locationsID = :conference_locationsID
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
    </body>
</html>
