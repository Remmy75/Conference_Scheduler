<?php

function regular_schedule($conference_num){

$category_count = conference_speakers_db::get_distinct_category_count_for_conference($conference_num); //number of different categories
$total_titles = conference_speakers_db::get_title_count_conference($conference_num); //total title count in the conference
$title_in_category_count = conference_speakers_db::get_title_count_by_category_in_conference($conference_num); //gives how many of each title in each category
$locations = conference_speakers_db::get_titles_by_conference_num($conference_num);
$location_count = conference_locations_db::location_count_by_conference_num($conference_num);
$titles_and_categories = conference_speakers_db::get_titles_by_with_category_conference_num($conference_num);
$titles = conference_speakers_db::get_titles_by_conference_num($conference_num);
$multiple_titles_with_speakerID = title_speakers_db::select_speakerID_with_multiple_titleID();

$location_placed_count = 0;
$title_placed_count = 0;
$session_number = 1;
$number_of_sessions = ceil($total_titles / $location_count);
$temp_conference_num = 1;

$titles_placed = array();
$locations_placed = array();
$category_percentage_to_place = array();

$title_count_column = array_column($title_in_category_count, 'titleID');//pulls the number for each category and puts in its own array
$category_column = array_column($$title_in_category_count, 'category');//pulls each category to form its own array

//divide title count by category/total titles will give % for how many of each title from total their is
//figures out % for each category in the conference
for ($i = 0; $i <= $category_count; $i++) {
    $category_counter[$i] = 0;
    $category_percentage_to_place = [$category_column[$i] => round(($title_count_column[$i] / $total_titles) * 10)];//uses the category_column as key and the % of how many of that item is compared to total titles
}



do {

    for ($j = 0; $j <= $total_titles; $j++) {
        $titleID = $titles[$j];
        if (!in_array($titleID, $titles)) {
            if ($location_placed_count == $location_count) {
                $session_number++;
                $locations_placed = array();
                for ($h = 0; $h <= $location_count; $h++) {
                    $locationID = $locations[$h];
                    if (!in_array($titleID, $multiple_titles_with_speakerID)) {
                        if (!in_array($locationID, $locations_placed)) {
                            location_title_db::assign_location($locationID, $titleID, $session_number, $temp_conference_num);
                            $titles_placed++;
                            $location_placed_count++;
                            array_push($titles_placed, $titleID); //add titles that are assigned into this array and I can check if they've been placed or not. 
                            array_push($locations_placed, $locationID); //do the same for locations, clear the array everytime it flips to next session
                        }
                    } else {
                        $multiple_speaker_session_check = location_title_db::get_session_by_titleID($titleID);
                        if ($multiple_speaker_session_check !== $session_number || $multiple_speaker_session_check !== ($session_number - 1 ) || $session_number == $number_of_sessions) {
                            if (!in_array($locationID, $locations_placed)) {
                                location_title_db::assign_location($locationID, $titleID, $session_number, $temp_conference_num);
                                $titles_placed++;
                                $location_placed_count++;
                                array_push($titles_placed, $titleID); //add titles that are assigned into this array and I can check if they've been placed or not. 
                                array_push($locations_placed, $locationID); //do the same for locations, clear the array everytime it flips to next session
                            }
                        }
                    }
                }
            }
        }
    }
} while ($title_placed_count < $total_titles);


}