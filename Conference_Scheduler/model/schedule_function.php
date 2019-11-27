<?php 

require('model/location_title_db.php');
require('model/location_equipment_db.php');
require('model/title_needs_db.php');
require('model/location_equipment.php');
require('model/title_needs.php');



$sorted_title_array = title_needs_db::select_titles_with_equip();
$sorted_location_array = location_equipment_db::select_locations_with_equip();

usort($sorted_title_array, function($a, $b)//sorts the arrays and puts them from big to small
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

usort($sorted_location_equipments, function($a, $b)//sorts the arrays and puts them from big to small
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
		if($location_placement_counter == $location_equipments.length){
			$current_placement_session++;
                        $location_placement_counter = 0;
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
		if($location_placement_counter == $location_equipments.length) {
			$current_placement_session++;
                        $location_placement_counter = 0;
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

$acting_conference_schedule = location_title_db::select_with_conference_number($conference_num);



//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
//Everything below this is leftover


//seperate each into individual components/arrays
$total_titles = count($title_needs);//count of titles
for($t = 0; $t <= $title_needs.length; $t++){
    $title = $title_needs[$t];
}

$total_locations = count($location_equipments);//count of locations
for($l = 0; $l <= $location_equipments.length; $l++){
    $location.$l = $location_equipments($l);
}

$minimum_sessions_needed = ceil($total_titles/$total_locations);//finds the minimumn number of sessions needed to run all speakers

//Need to sort the titles and locations before trying to compare to each other.
//        Or sort right when comparing
//
//Compare like sizes at first to eliminate those
//
//array_intersect, will show what variables are the same inside an array
$array1 = array("a" => "green", "red", "blue");
$array2 = array("b" => "green", "yellow", "red");
$result = array_intersect($array1, $array2);
print_r($result);

//would give this
//Array
//(
//    [a] => green
//    [0] => red
//)
//If array_intersect is used first, it could match up all rooms with titles that have the same #
//Could use if(count($result) == count($location) && count($result) == count($title)) then assign it to that room


//array_intersect shows the same between the arrays
//array_diff shows whats different between arrays
//Compare using array_diff smaller titles to larger locations to assign those. 
//        If no items in the title that isnt in the location it can be assigned to that location

$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result);

//would give this result
//Array
//(
//    [1] => blue
//)
//This would all be inside the for loops seperating the array of arrays
//With this, it would be if(empty($result)) then assign to that location. 
    //Have to have an if statement to check if the location or title has been through already and been placed into either
    //Would have $result = ($location, $title);
//That would be first round or at least until the $result starts having a value
    //Then it would be if($result
//Order of how to do this,
    //for loop to pull title
    //once pulled, sort it and send to next step
        //for loop to pull the location
        //once location pulled, sort it and go to next step
            //if statement to check if the title or location has been assigned
                //if statement checking the array_intersect first
                //if matched will assign the title to the location
                    //Go through this every location is full or until it needs to switch to array_diff
                //if statement checking the array_diff of the location and title
                //if matched will assign the title to the location and die
                    //if not a match, will cycle through the next title and go through this again

//Will need to do a check first to see if any of the locations will have to little of the equipment to use.
//need to figure out logic to see about running through on a title multiple times to match with a location using the array_diff


$current_placement_session = 1;//whenever all the locations are used it adds 1 to this to put into the db for what session it is
$title_placed = 0;//need to have this add to itself until it matches the # of totel titles
$location_placement_counter = 0;//adds to this everytime a location is placed, when it hits $total_locations it adds 1 to $current_placement_session
$temp_conference_num = 1;
$array[] = $location_title;
do{
for($t = 0; $t <= $title_needs.length; $t++){
    $title = $title_needs[$t];
    //pull title
    if(){//title hasnt been run through these
    for($l = 0; $l <= $location_equipments.length; $l++) {
        $location = $location_equipments[$l];
        $location_session = location_title_db::get_session_by_locationID($locationID);//pull location
        if($location_session !== $current_placement_session){//check if location has been assigned
            //run $intersectResult = array_intersect($location, $title);
            //run $diffResult = array_diff($location, $title);
            if(count($intersectResult) == count($location) && count($intersectResult) == count($title)) {//if for array_intersect
                location_title_db::assign_location($location, $title, $current_placement_session, $temp_conference_num);//assign location and title, write to db, assign conference_num 1 which will be a temporary conf, delete after assigning to true db
                //set a counter and once it hits the same # of locations start a new session
                //drop out of all these and start over til the titles are all taken
            } else if(empty($diffResult)) {//if the intersect doesnt match then will try to match with this
                
            }
        } else if() {//location check if session # matches current session
            if(count($result) == count($location) && count($result) == count($title)) {//if for array_intersect
                //assign location and title
                //set a counter and once it hits the same # of locations start a new session
                //drop out of all these and start over til the titles are all taken
            }else if(empty($diffResult)) {//if the intersect doesnt match then will try to match with this
                //can do a variable that will increment everytime the same title goes throug and use that as a parameter for this if statement
                //example would be if($diffResult <= (count($diffResult) + $diffIncrement))
            }
        }
            
    }
    }else if(){//title needs to go through locations and assign into a location with more equipment than needed
        for() {//pull location
            if(count($intersectResult) >= count($title)){//place into location that has more equipment than needed
                
            }
            
        }
    }
}
} while ($title_placed < $total_titles);

//---------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------------
//need to place titles in rooms making sure that the same categories are not scheduled at the same time
//have choice to place by either category or random
//some speakers may have extended times
//some may speak multiple times on the same title
//if scheduling by category/track, could sort by title category and seperate according to category, then place



//query to get titles with categories
$titles = title_categories_db::select_all();//ordered by category, should be able to seperate into different arrays with each category being in its own
$count = conference_speakers_db::get_category_count_for_conference($conferenceID);//gets count for how many different categories in the conference
$categories = conference_speakers_db::get_categories_in_conference($conferenceID);//gets categories in the conference
$f;


//place spots into location by category
//then place by titleID
//if title time is longer than 1 hour do +1 per time over and make sure they get placed back to back
***//have to add time length field to title table

//pull titleID with categoryID
    //run through array_column to get an array of array of categoryID as name and titleID's as values
    //get count of how many values in the array of array
    //figure out how many titles must be placed each session ie how many locations
    //total_titles/total_locations = $num_of_sessions
    //figure % of each category and that much should get placed each session
    //formula 
        //variables for formula
        //total categories
        //total titles in each category
        //total locations
        //number of sessions
        //
        //run this each placing of titles, it will change each session

$titles_with_categories = title_db::get_title_with_category_by_conference($conferenceID);
$count = conference_speakers_db::get_category_count_for_conference($conferenceID);//gets count for how many different categories in the conference


