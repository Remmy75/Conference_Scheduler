<?php 

require('model/location_title_db.php');
require('model/location_equipment_db.php');
require('model/title_needs_db.php');
require('model/location_equipment.php');
require('model/title_needs.php');

$sorted_location_equipments = location_equipment_db::select_locations_with_equip();
$sorted_title_array = title_needs_db::select_titles_with_equip();

usort($sorted_title_array, function($a, $b)
{
    if($a[count('equipID')] == $b[count('equipID')])
    {
        return 0;
    } 
    else if($a[count('equipID')] > $b[count('equipID')])
    {
        return -1;
    } 
    else 
    {
        return 1;
    }
    
});

usort($sorted_location_equipments, function($a, $b)
{
    if($a[count('equipID')] == $b[count('equipID')])
    {
        return 0;
    } 
    else if($a[count('equipID')] > $b[count('equipID')])
    {
        return -1;
    } 
    else 
    {
        return 1;
    }
    
});

function remove_locations($array_to_remove, $array_to_compare) {
	$run_time = 1;
	do{//checks for any locations that may not have enough equipment for the smallest title, and removes them from the array
		$smallest_remove = end($array_to_remove);//gets the last array from the locations
		$smallest_compare = end($array_to_compare);//gets last array from titles

		if(count($smallest_remove) >= count($smallest_compare)) {
			array_pop($array_to_remove);
		} else {
			$run_time = 0;
			}
	} while ($run_time > 0);
}

remove_locations($sorted_location_equipments, $sorted_title_array);


$total_titles = count($sorted_title_array);
$total_locations = count($sorted_location_equipments);
$minimum_sessions_needed = ceil($total_titles/$total_locations);//finds the minimumn number of sessions needed to run all speakers
$current_placement_session = 1;//whenever all the locations are used it adds 1 to this to put into the db for what session it is
$title_placed = 0;//need to have this add to itself until it matches the # of total titles
$location_placement_counter = 0;//adds to this everytime a location is placed, when it hits $total_locations it adds 1 to $current_placement_session
$conference_num = 1;//temporary conference_num until the lineup is finalized
$diff_increment = 0;//used to run through array_diff function after running through all locations for each title

do{//need to check now if the titles have a speaker who is in another title that may be scheduled right after this one
for($t = 0; $t <= $sorted_title_array.length; $t++){
    $title = $sorted_title_array[$t];
    if($diff_increment <= 0){//if diff_increment is 0, then the titles havent run through array_intersect
		if($location_placement_counter >= $location_equipments.length){
			$current_placement_session++;
		}
			for($l = 0; $l <= $sorted_location_equipments.length; $l++) {
				$location = $sorted_location_equipments[$l];
				$location_session = location_title_db::get_session_by_locationID($locationID);//pull location
				if($location_session !== $current_placement_session){//check if location has been assigned
					$intersectResult = array_intersect($location, $title);
					if(count($intersectResult) == count($location) && count($intersectResult) == count($title)) {//if for array_intersect
						location_title_db::assign_title_to_location($locationID, $titleID, $current_placement_session, $conference_num);//Assign conference_num 1, it will be a temporary conference_num until the lineup is finalized
						unset($sorted_title_array, $title);
						$location_placement_counter++;//how many locations placed
						$title_placed++;//how many titles placed
					} 
				}   
			}
		
    } else {//if diff_increment is greater than 0, it will run through this part until it matches the titles with a location
		if($location_placement_counter >= $location_equipments.length) {
			$current_placement_session++;
		}
			for($l = 0; $l <= $location_equipments.length; $l++) {
				$location = $location_equipments[$l];
				$location_session = location_title_db::get_session_by_locationID($locationID);//pull location
				$diffResult = array_diff($location, $title);
				if($diffResult <= (count($diffResult) + $diff_increment)){//diff_increment will add 1 to count each time running through until a title matches a location
					location_title_db::assign_title_to_location($locationID, $titleID, $current_placement_session, $conference_num);//Assign conference_num 1, it will be a temporary conference_num until the lineup is finalized 
					unset($sorted_title_array, $title);
					$location_placement_counter++;//how many locations placed
					$title_placed++;//how many titles placed
				}
			}
		
	}
}
$diff_increment++;

remove_locations($sorted_location_equipments, $sorted_title_array);//need to run to remove smallest locations again each time we have to go through the titles

} while ($title_placed < $total_titles);


