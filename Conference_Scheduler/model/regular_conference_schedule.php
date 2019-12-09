<?php

function regular_schedule($conference_num) {

    $category_count = conference_speakers_db::get_distinct_category_count_for_conference($conference_num); //number of different categories
    var_dump($category_count);
    $total_titles = conference_speakers_db::get_title_count_conference($conference_num); //total title count in the conference
    var_dump($total_titles);
    $total_title_count = (int) $total_titles[0];
    var_dump($total_title_count);
    $title_in_category_count = conference_speakers_db::get_title_count_by_category_in_conference($conference_num); //gives how many of each title in each category
    var_dump($title_in_category_count);
    $locations = locations_db::get_locationID_with_conference_num($conference_num);
    var_dump($locations);
    $location_count = conference_locations_db::location_count_by_conference_num($conference_num);
    var_dump($location_count);
    $loc_count = (int) $location_count[0];
    var_dump($loc_count);
//    $titles_and_categories = conference_speakers_db::get_titles_by_with_category_conference_num($conference_num);
//    var_dump($titles_and_categories);
    $titles = conference_speakers_db::get_titles_by_conference_num_order_by_titleID($conference_num);
    var_dump($titles);
//    $multiple_titles_with_speakerID = title_speakers_db::select_speakerID_with_multiple_titleID();
//    var_dump($multiple_titles_with_speakerID);

    $location_placed_count = 0;
    $title_placed_count = 1;
    $session_number = 1;
    $number_of_sessions = ceil($total_title_count / $loc_count);
    $temp_conference_num = 1;
    $place_title = 0;
    $dummy_count = 0;

    $titles_placed = array();
    var_dump($titles_placed);
    $locations_placed = array();
    $category_percentage_to_place = array();

//$title_count_column = array_column($title_in_category_count, 'titleID');//pulls the number for each category and puts in its own array
//$category_column = array_column($$title_in_category_count, 'category');//pulls each category to form its own array
//divide title count by category/total titles will give % for how many of each title from total their is
//figures out % for each category in the conference
//for ($i = 0; $i <= $category_count; $i++) {
//    $category_counter[$i] = 0;
//    $category_percentage_to_place = [$category_column[$i] => round(($title_count_column[$i] / $total_titles) * 10)];//uses the category_column as key and the % of how many of that item is compared to total titles
//}



    while ($title_placed_count <= $total_title_count) {

        for ($j = 0; $j <= ($total_title_count - 1); ) {
            //$titleID = $titles[$j];
            if (!in_array($titles[$place_title], $titles_placed, true)) {

                if ($location_placed_count == $loc_count) {
                    $session_number++;
                    $locations_placed = array();
                    $location_placed_count = 0;
                    for ($h = 0; $h <= ($loc_count - 1); $h++) {

                        if (!in_array($locations[$h], $locations_placed, true)) {
                            location_title_db::assign_location($locations[$h], $titles[$place_title], $session_number, $conference_num);
                            
                            array_push($titles_placed, $titles[$place_title]); //add titles that are assigned into this array and I can check if they've been placed or not. 
                            array_push($locations_placed, $locations[$h]); //do the same for locations, clear the array everytime it flips to next session
                            $title_placed_count++;
                            $location_placed_count++;
                            $place_title++;
                            $j++;
                        }
                        
                    }
                } else {
                    for ($k = 0; $k <= ($loc_count - 1); $k++) {

                        if (!in_array($locations[$k], $locations_placed, true)) {
                            location_title_db::assign_location($locations[$k], $titles[$place_title], $session_number, $conference_num);
                            
                            array_push($titles_placed, $titles[$place_title]); //add titles that are assigned into this array and I can check if they've been placed or not. 
                            array_push($locations_placed, $locations[$k]); //do the same for locations, clear the array everytime it flips to next session
                            $title_placed_count++;
                            $location_placed_count++;
                            $place_title++;
                            $j++;
                        }
                        
                    }
                }
            }
        }
    } 
}
