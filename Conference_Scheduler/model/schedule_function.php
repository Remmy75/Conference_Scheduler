<?php 






                
               // *************** Assigning Titles into Trach scheduling *****************

function track_schedule($conference_num){

//get count of how many different categories
                $category_count = conference_speakers_db::get_distinct_category_count_for_conference($conference_num);
                var_dump($category_count[0]);
                $cat_count = (int) $category_count[0];
                var_dump($cat_count);
//get all titles for the conference
                $title = conference_speakers_db::get_titles_by_conference_num($conference_num);
                var_dump($title);
                //$title_count = conference_speakers_db::get_title_count_conference($conference_num);
                //var_dump($title_count);
                $title_per_category_count = conference_speakers_db::get_title_count_by_category_in_conference($conference_num);
                var_dump($title_per_category_count);
                $title_cat_count = (int) $title_per_category_count[18];
                var_dump($title_cat_count);
                
//Need to match the amount of rooms to the amount of categories
                $conference_location = conference_locations_db::select_locations_with_conference_num_category_count($conference_num);
                var_dump($conference_location);
                $title_placed = 0;
//plug into a room 1 category and have it move to next room and place adifferent category, until all rooms are full them start over
               
                for($i = 0; $i <= ($cat_count - 1); $i++){//number of categories
                   $session_number = 1;
                   
                    for($j = 0; $j <= ($title_cat_count - 1); $j++) {//number of titles per category
                        
                        location_title_db::assign_location($conference_location[$i], $title[$title_placed], $session_number, $conference_num);
                         $session_number++;
                         $title_placed++;
                         var_dump($title_placed);
                    }
                }
}
