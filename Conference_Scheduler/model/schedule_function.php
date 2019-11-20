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


//example using usort to sort the arrays from largest to smallest
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

<?php
$priorities = array(5, 8, 3, 7, 3);

usort($priorities, function($a, $b)
{
    if ($a == $b)
    {
        echo "a ($a) is same priority as b ($b), keeping the same\n";
        return 0;
    }
    else if ($a > $b)
    {
        echo "a ($a) is higher priority than b ($b), moving b down array\n";
        return -1;
    }
    else {
        echo "b ($b) is higher priority than a ($a), moving b up array\n";               
        return 1;
    }
});

echo "Sorted priorities:\n";
var_dump($priorities);
?>

Output:

b (8) is higher priority than a (3), moving b up array
b (5) is higher priority than a (3), moving b up array
b (7) is higher priority than a (3), moving b up array
a (3) is same priority as b (3), keeping the same
a (8) is higher priority than b (3), moving b down array
b (8) is higher priority than a (7), moving b up array
b (8) is higher priority than a (5), moving b up array
b (8) is higher priority than a (3), moving b up array
a (5) is higher priority than b (3), moving b down array
a (7) is higher priority than b (5), moving b down array

Sorted priorities:
array(5) {
  [0]=> int(8)
  [1]=> int(7)
  [2]=> int(5)
  [3]=> int(3)
  [4]=> int(3)
}

<?php
$arr = [
    [
        "name"=> "Sally",
        "nick_name"=> "sal",
        "availability"=> "0",
        "is_fav"=> "0"
    ],
    [
        "name"=> "David",
        "nick_name"=> "dav07",
        "availability"=> "0",
        "is_fav"=> "1"
    ],
    [
        "name"=> "Zen",
        "nick_name"=> "zen",
        "availability"=> "1",
        "is_fav"=> "0"
    ],
    [
        "name"=> "Jackson",
        "nick_name"=> "jack",
        "availability"=> "1",
        "is_fav"=> "1"
    ],
    [
        "name"=> "Rohit",
        "nick_name"=> "rod",
        "availability"=> "0",
        "is_fav"=> "0"
    ],

];

usort($arr,function($a,$b){
    $c = $b[count('equipID')] - $a[count('equipID'];
   
    return $c;
});

print_r($arr);
?>

Output:

Array
(
    [0] => Array
        (
            [name] => Jackson
            [nick_name] => jack
            [availability] => 1
            [is_fav] => 1
        )

    [1] => Array
        (
            [name] => David
            [nick_name] => dav07
            [availability] => 0
            [is_fav] => 1
        )

    [2] => Array
        (
            [name] => Zen
            [nick_name] => zen
            [availability] => 1
            [is_fav] => 0
        )

    [3] => Array
        (
            [name] => Rohit
            [nick_name] => rod
            [availability] => 0
            [is_fav] => 0
        )

    [4] => Array
        (
            [name] => Sally
            [nick_name] => sal
            [availability] => 0
            [is_fav] => 0
        )

)