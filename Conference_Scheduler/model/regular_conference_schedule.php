<?php


$category_count = conference_speakers_db::get_distinct_category_count_for_conference($conference_num);//number of different categories
$total_titles = conference_speakers_db::get_title_count_conference($conference_num);//total title count in the conference
$title_in_category_count = conference_speakers_db::get_title_count_by_category_in_conference($conference_num);//gives how many of each title in each category
$conference_locations = conference_speakers_db::select_all_with_conference_num($conference_num);
$location_count = conference_locations_db::location_count_by_conference_num($conference_num);
$titles_and_categories = conference_speakers_db::get_titles_by_with_category_conference_num($conference_num);
$titles = conference_speakers_db::get_titles_by_conference_num($conference_num);
$title_placed_count = 0;
$session_number = 1;
$number_of_sessions = ceil($total_titles/$location_count);
$temp_conference_num = 1;
$titles_placed = array();
//divide title count by category/total titles will give % for how many of each title from total their is


//figures out % for each category in the conference
for($i = 0; $i <= $category_count; $i++)  {
		$category_counter[$i] = 0;
		$category_percentage_to_place[$i] = round(($title_in_category_count[$i]/$total_titles)*10);
                
}



do{
               
for($j= 0; $j <= $total_titles; $j++){
    
    if()
    for($h = 0; $h <= $location_count; $h++){
        location_title_db::assign_location($conference_locations->getLocationID(), $titles[$h], $session_number, $temp_conference_num);
        $titles_placed++;
        array_push($titles_placed, $titleID);//add titles that are assigned into this array and I can check if they've been placed or not. 
        //do the same for locations, clear the array everytime it flips to next session
    }
    $session_number++;
}




} while ($title_placed_count < $total_titles);
		

