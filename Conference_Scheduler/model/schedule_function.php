<?php
//need to add field to the location_title db when entering the assignments. 
//Add a session # variable
//get all titles with equipment
$title_needs = title_needs_db::select_titles_with_equip();

//get all locations
$location_equipments = location_equipment_db::select_locations_with_equip();

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

//Once it runs through if a title is matched then it needs to be removed from the array of arrays
//Or deleted from the variable list
unset($variable);//this to remove from an array 

//example of comparing 2 arrays to see if they match
function identical_values( $arrayA , $arrayB ) {

    sort( $arrayA );
    sort( $arrayB );

    return $arrayA == $arrayB;
}

for() {//pull title
    if(){//title hasnt been run through these
    for() {//pull location
        if(){//check if title has been assigned
            //run $intersectResult = array_intersect($location, $title);
            //run $diffResult = array_diff($location, $title);
            if(count($intersectResult) == count($location) && count($intersectResult) == count($title)) {//if for array_intersect
                //assign location and title
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


//
function sort_by_length($arrays) {
    $lengths = array_map('count', $arrays);
    asort($lengths);
    $return = array();
    foreach(array_keys($lengths) as $k)
        $return[$k] = $arrays[$k];
    return $return;
}