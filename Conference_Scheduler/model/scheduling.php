<?php

require_once 'models/title_needs-db.php';
require_once 'models/location_equipment_db.php';

$title_needs = title_needs_db::select_titles_with_equipment();
$location_equip = location_equipment_db::select_locations_with_equipment();

$title = "title00";
$location = "location00";
        
for($i = 0; $i <= $title_needs.length; $i++) {
    $title = $title_needs($i);
    ++$title;
}

for($j = 0; $j <= $location_equip.length; $j++) {
    $location = $location_equip($j);
    ++$location;
}