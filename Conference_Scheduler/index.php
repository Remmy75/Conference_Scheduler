<?php
    require_once 'model/database.php';
    require('model/conference_db.php');
    require('model/conference_locations_db.php');
    require('model/conference_schedule_db.php');
    require('model/conference_speakers_db.php');
    require('model/equipment_db.php');
    require('model/location_equipment_db.php');
    require('model/locations_db.php');
    require('model/speakers_db.php');
    require('model/title_db.php');
    require('model/title_needs_db.php');
    require('model/title_speakers_db.php');
    
    require('model/locations.php');
    require('model/speakers.php');
    require('model/title.php');
    require('model/title_needs.php');
    require('model/title_speakers.php');
    require('model/conference.php');
    require('model/conference_locations.php');
    require('model/conference_schedule.php');
    require('model/conference_speakers.php');
    require('model/equipment.php');
    require('model/location_equipment.php');
    
    $lifetime = 60 * 60 * 24 * 14;    // 2 weeks in seconds
    session_set_cookie_params($lifetime, '/');
    session_start();
    
    $errors = '';

    $action = filter_input(INPUT_POST, 'action');
    if ($action === NULL) {
        $action = filter_input(INPUT_GET, 'action');
        if ($action === NULL) {
        $action = 'home';
        }
    }
    
    
    switch ($action) {
    case 'home': //default action set above if other action filters false.
        include('view/home.php');
        die();
        break;
    
    case 'speakers':
        
        $speakers = speakers_db::select_all();
        
        
        include('view/view_speakers.php');
        die();
        break;
    
    case 'view_enter_speakers':
        
        if (!isset($fName)) {
            $fName = '';
        }
        
        if (!isset($lName)) {
            $lName = '';
        }
        
        if (!isset($phone_num)) {
            $phone_num = '';
        }

        if (!isset($email)) {
            $email = '';
        }   

        if (!isset($error_message)) {
        $error_message = [];
        $error_message['fname'] = '';
        $error_message['lname'] = '';
        $error_message['phone_num'] = '';
        $error_message['email'] = '';
        }
        
        include 'view/enter_speakers.php';
        
        die();
        break;
        
    case 'enter_speakers':
        
        $fName = filter_input(INPUT_POST, 'fname');
        $lName = filter_input(INPUT_POST, 'lname');
        $phone_num = filter_input(INPUT_POST, 'phone_num');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
       
        $error_message = [];
        
        $error_message['fname'] = '';
        $error_message['lname'] = '';
        $error_message['phone_num'] = '';
        $error_message['email'] = '';

        $namePattern = '/^[a-zA-Z]/';
        $fnameValid = preg_match($namePattern, $fName);
        $lnameValid = preg_match($namePattern, $lName);

        if ($fName === null || $fName === "") {
            $error_message['fname'] = 'You must enter speakers first name.';
        } else if ($fnameValid === FALSE || $fnameValid === 0) {
            $error_message['fname'] = 'The first name must start with a letter.';
        }
        
        if ($lName === null || $lName === "") {
            $error_message['lname'] = 'You must enter speakers last name.';
        } else if ($lnameValid === FALSE || $lnameValid === 0) {
            $error_message['lname'] = 'The last name must start with a letter.';
        }
        
         // speaker phone number validation
        $phonePattern = '/^[0-9]{10}$/';
        $phoneValid = preg_match($phonePattern, $phone_num);
        
        if ($phone_num === null || $phone_num === "") {
            $error_message['phone_num'] = 'You must enter a Phone number with no dashes (ex 0001112222)';
        } else if ($phoneValid === FALSE || $phoneValid === 0) {
            $error_message['phone_num'] = "The phone must be 10 numbers, no dashes" ;
        }

        if ($error_message['fname'] != '' || $error_message['lname'] != '' || $error_message['phone_num'] != '' ||  $error_message['email'] != '') {
            include 'view/enter_speakers.php';
            exit();
        } else {

                speakers_db::add_speaker($fName, $lName, $phone_num, $email);
                include 'view/add_confirmation.php';    
        }
        
        die();
        break;
    
    
    case 'edit_speakers':
        
        $speakerID = filter_input(INPUT_POST, 'speakerID', FILTER_VALIDATE_INT);
    
        $speaker = speakers_db::get_speaker($speakerID);
        $_SESSION['currentSpeaker'] = $speaker;
        $fName = $speaker->getFname();
        $lName = $speaker->getLname();
        $phone_num = $speaker->getPhone_num();
        $email = $speaker->getEmail();
        
        $error_message = [];
        $error_message['fName'] = '';
        $error_message['lName'] = '';
        $error_message['phone_num'] = '';
        $error_message['email'] = '';
        
        include 'view/edit_speakers.php';
        die();
        break;
    
    case 'commitSpeakerUpdate':
        
        $speakerID = filter_input(INPUT_POST, 'speakerID');
        $fName = filter_input(INPUT_POST, 'fname');
        $lName = filter_input(INPUT_POST, 'lname');
        $phone_num = filter_input(INPUT_POST, 'phone_num');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
       
        $error_message = [];
        $speakers = speakers_db::get_speaker($speakerID);
        $error_message['fname'] = '';
        $error_message['lname'] = '';
        $error_message['phone_num'] = '';
        $error_message['email'] = '';

        $namePattern = '/^[a-zA-Z]/';
        $fnameValid = preg_match($namePattern, $fName);
        $lnameValid = preg_match($namePattern, $lName);

        if ($fName === null || $fName === "") {
            $error_message['fname'] = 'You must enter speakers first name.';
        } else if ($fnameValid === FALSE || $fnameValid === 0) {
            $error_message['storeName'] = 'The first name must start with a letter.';
        }
        
        if ($lName === null || $lName === "") {
            $error_message['lname'] = 'You must enter speakers last name.';
        } else if ($lnameValid === FALSE || $lnameValid === 0) {
            $error_message['storeName'] = 'The last name must start with a letter.';
        }
        
         // speaker phone number validation
        $phonePattern = '/^[0-9]{10}$/';
        $phoneValid = preg_match($phonePattern, $phone_num);
        
        if ($phone_num === null || $phone_num === "") {
            $error_message['storePhone'] = 'You must enter a Phone number with no dashes (ex 0001112222)';
        } else if ($phoneValid === FALSE || $phoneValid === 0) {
            $error_message['storePhone'] = "The phone must be 10 numbers, no dashes" ;
        }

        if ($error_message['fname'] != '' || $error_message['lname'] != '' || $error_message['phone_num'] != '' ||  $error_message['email'] != '') {
            include 'view/edit_speakers.php';
            exit();
        } else {

               speakers_db::update_speakers($speakerID, $fName, $lName, $phone_num, $email);
                include 'view/update_confirmation.php';    
        }
        
        die();
        break;
    
    
    case 'speakers_to_title':
        
        $speakerID = filter_input(INPUT_POST, 'speakerID', FILTER_VALIDATE_INT);
        
        $speaker = speakers_db::get_speaker($speakerID);
        $fName = $speaker->getFname();
        $lName = $speaker->getLname();
        
        $titles = title_db::select_all();
        
        include('view/add_speakers_to_titles.php');
        die();
        break;
    
    case 'add_speakers_title':
        
        $speakerID = filter_input(INPUT_POST, 'speakerID', FILTER_VALIDATE_INT);
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['checkbox'] = '';
        }
        
        if(!empty($_POST['title'])){
            
            foreach($_POST['title'] as $t) {
                speaker_title_db::add_title_speakers($titleID, $speakerID);
            }
            
            include('view/add_confirmation.php');
        } else {
            
            $error_message['checkbox'] = 'You must select at least 1 location.';
            
            include('view/add_speakers_to_titles.php');
            exit();
        }
     
        die();
        break;
    
    case 'equipment':
        
        $equipments = equipment_db::select_all();
        
        include('view/view_equipment.php');
        die();
        break;
    
    case 'view_enter_equipment':
        
        if (!isset($name)) {
            $name = '';
        }


        if (!isset($error_message)) {
            $error_message = [];
            $error_message['name'] = '';
        }
        
        include('view/enter_equipment.php');
        die();
        break;
        
    case 'enter_equipment':
        
        $name = filter_input(INPUT_POST, 'name');
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['name'] = '';
        }

        $namePattern = '/^[a-zA-Z]/';
        $nameValid = preg_match($namePattern, $name);

        if ($name === null || $name === "") {
            $error_message['fname'] = 'You must enter equipment name.';
        } else if ($nameValid === FALSE || $nameValid === 0) {
            $error_message['fname'] = 'The name must start with a letter.';
        }
        

        if ($error_message['name'] != '') {
            include 'view/enter_equipment.php';
            exit();
        } else {

                equipment_db::add_equipment($name);
                include 'view/add_confirmation.php';    
        }

        die();
        break;
    
    case 'equipment_to_title':
        
        $equipID = filter_input(INPUT_POST, 'equipID', FILTER_VALIDATE_INT);
        
        $equipment = equipment_db::get_equipment($equipID);
        $name = $equipment->getName();
        
        $titles = title_db::select_all();
        
        include('view/add_equipment_to_titles.php');
        die();
        break;
    
    case 'add_equipment_title':
        
        $equipID = filter_input(INPUT_POST, 'equipID', FILTER_VALIDATE_INT);
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['checkbox'] = '';
        }
        
        if(!empty($_POST['title'])){
            
            foreach($_POST['title'] as $t) {
                location_equipment_db::add_location_equipment($equipID, $a);
            }
            
            include('view/add_confirmation.php');
        } else {
            
            $error_message['checkbox'] = 'You must select at least 1 location.';
            
            include('view/add_equipment_to_titles.php');
            exit();
        }
     
        die();
        break;
    
    case 'equipment_to_location':
        
        $equipID = filter_input(INPUT_POST, 'equipID', FILTER_VALIDATE_INT);
        
        $equipment = equipment_db::get_equipment($equipID);
        $name = $equipment->getName();
        
        $locations = locations_bd::select_all();
        
        
        
        include('view/add_equipment_to_locations');
        die();
        break;
    
    case 'add_equipment_location':
        
       
        $equipID = filter_input(INPUT_POST, 'equipID', FILTER_VALIDATE_INT);
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['checkbox'] = '';
        }
        
        if(!empty($_POST['location'])){
            
            foreach($_POST['location'] as $l) {
                location_equipment_db::add_location_equipment($equipID, $l);
            }
            
            include('view/add_confirmation.php');
        } else {
            
            $error_message['checkbox'] = 'You must select at least 1 location.';
            
            include('view/add_equipment_to_locations.php');
            exit();
        }
        
        die();
        break;
    
    
    case 'edit_equipment':
        
        $equipID = filter_input(INPUT_POST, 'equipID', FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name');
        $equipment = equipment_DB::get_equipment($equipID);
        
        $name = $equipment->getName();
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['name'] = '';
        }
        
        include('view/edit_equipment.php');
        die();
        break;
        
    case 'commitEquipmentUpdate':
        
        $equipID = filter_input(INPUT_POST, 'equipID');
        $name = filter_input(INPUT_POST, 'name');
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['name'] = '';
        }

        $namePattern = '/^[a-zA-Z]/';
        $nameValid = preg_match($namePattern, $name);

        if ($name === null || $name === "") {
            $error_message['fname'] = 'You must enter equipment name.';
        } else if ($nameValid === FALSE || $nameValid === 0) {
            $error_message['fname'] = 'The name must start with a letter.';
        }
        

        if ($error_message['name'] != '') {
            include 'view/edit_equipment.php';
            exit();
        } else {

                equipment_db::update_equipment($equipID, $name);
                include 'view/add_confirmation.php';    
        }
        
    case 'locations':
        
        $locations = locations_db::select_all();
        
        include('view/view_locations.php');
        die();
        break;
    
    case 'view_enter_locations':
        
        if (!isset($bldg_name)) {
            $bldg_name = '';
        }

        if (!isset($room_num)) {
            $room_num = '';
        }

        if (!isset($error_message)) {
            $error_message = [];
            $error_message['bldg_name'] = '';
            $error_message['room_num'] = '';
        }
        
        include('view/enter_locations.php');
        die();
        break;
    
    case 'enter_location':
        
        $bldg_name = filter_input(INPUT_POST, 'bldg_name');
        $room_num = filter_input(INPUT_POST, 'room_num');
       
        $error_message = [];
        $error_message['bldg_name'] = '';
        $error_message['room_num'] = '';

        if ($bldg_name === null || $bldg_name === "") {
            $error_message['bldg_name'] = 'You must enter the buildings name.';
        } 
        
        if ($room_num === null || $room_num === "") {
            $error_message['room_num'] = 'You must enter the room number.';
        } 

        if ($error_message['bldg_name'] != '' || $error_message['room_num'] != '' ) {
            include 'view/enter_locations.php';
            exit();
        } else {

                locations_db::add_location($bldg_name, $room_num);
                include 'view/add_confirmation.php';    
        }
        
        die();
        break;
    
    case 'edit_location':
        
        $locationID = filter_input(INPUT_POST, 'locationID');
        $bldg_name = filter_input(INPUT_POST, 'bldg_name');
        $room_num = filter_input(INPUT_POST, 'room_num');
        
        $locations = locations_DB::get_location($locationID);
        
        $bldg_name = $locations->getBldgName();
        $room_num = $locations->getRoom_num();
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['bldg_name'] = '';
            $error_message['room_num'] = '';
        }
        
        include('view/edit_location.php');
        die();
        break;
    
    case 'commitLocationUpdate':
        
        $locationID = filter_input(INPUT_POST, 'locationID');
        $bldg_name = filter_input(INPUT_POST, 'bldg_name');
        $room_num = filter_input(INPUT_POST, 'room_num');
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['bldg_name'] = '';
            $error_message['room_num'] = '';
        }

         if ($bldg_name === null || $bldg_name === "") {
            $error_message['bldg_name'] = 'You must enter the buildings name.';
        } 
        
        if ($room_num === null || $room_num === "") {
            $error_message['room_num'] = 'You must enter the room number.';
        } 

        if ($error_message['bldg_name'] != '' || $error_message['room_num'] != '' ) {
            include 'view/edit_locations.php';
            exit();
        } else {

                locations_db::update_location($locationID, $bldg_name, $room_num);
                include 'view/update_confirmation.php';    
        }
       
        die();
        break;
    
    case 'location_to_conference':
        
        $locationID = filter_input(INPUT_POST, 'locationID', FILTER_VALIDATE_INT);
        
        $location = locations_db::get_location($locationID);
        $room_num = $location->getRoom_num();
        
        $conferences = conference_db::select_all();
        
        
        include('view/add_location_to_conference.php');
        die();
        break;
    
    case 'add_location_conference':
        
        $locationID = filter_input(INPUT_POST, 'locationID', FILTER_VALIDATE_INT);
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['checkbox'] = '';
        }
        
        if(!empty($_POST['conference'])){
            
            foreach($_POST['conference'] as $c) {
                location_equipment_db::add_location_equipment($locationID, $c);
            }
            
            include('view/add_confirmation.php');
        } else {
            
            $error_message['checkbox'] = 'You must select at least 1 location.';
            
            include('view/add_location_to_conference.php');
            exit();
        }
     
        die();
        break;
        
    case 'titles':
        
        $titles = title_db::select_all();
        
        include('view/view_title.php');
        die();
        break;
    
    case 'view_enter_titles':
        
        if (!isset($title_name)) {
            $title_name = '';
        }

        if (!isset($error_message)) {
            $error_message = [];
            $error_message['title_name'] = '';
        }
        
        include('view/add_title.php');
        die();
        break;
    
    
    case 'add_title':
         
        $title_name = filter_input(INPUT_POST, 'title_name');
       
        $error_message = [];
        $error_message['title_name'] = '';

        if ($title_name === null || $title_name === "") {
            $error_message['title_name'] = 'You must enter a title.';
        }

        if ($error_message['title_name'] != '' ) {
            include 'view/add_title.php';
            exit();
        } else {

                title_db::add_title($title_name);
                include 'view/add_confirmation.php';    
        }
        
        die();
        break;
    
    case 'edit_title':
        
        $titleID = filter_input(INPUT_POST, 'titleID', FILTER_VALIDATE_INT);
        
        $title = title_db::get_title($titleID);
        
        $title_name = $title->getTitle_name();
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['title_name'] = '';
        }

        include('view/edit_title.php');
        die();
        break;
    
    case 'commitTitleUpdate':
        
        $titleID = filter_input(INPUT_POST, 'titleID', FILTER_VALIDATE_INT);
        $title_name = filter_input(INPUT_POST, 'title_name');
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['title_name'] = '';
        }

        if ($title_name === null || $title_name === "") {
            $error_message['title_name'] = 'You must enter a title.';
        }

        if ($error_message['title_name'] != '' ) {
            include 'view/edit_title.php';
            exit();
            
        } else {

                title_db::update_title($titleID, $title_name);
                include 'view/update_confirmation.php';    
        }

        die();
        break;
        
    case '':
        include('');
        die();
        break;
    
     
    case 'title_to_conference':
        
        $titleID = filter_input(INPUT_POST, 'titleID', FILTER_VALIDATE_INT);
        
        $title = title_db::get_title($titleID);
        $title_name = $title->getTitle_name();
        
        $conferences = conference_db::select_all();
        
        include('view/add_title_to_conference.php');
        die();
        break;
    
    case 'add_title_conference':
        
        $titleID = filter_input(INPUT_POST, 'titleID', FILTER_VALIDATE_INT);
        
        if (!isset($error_message)) {
            $error_message = [];
            $error_message['checkbox'] = '';
        }
        
        if(!empty($_POST['conference'])){
            
            foreach($_POST['conference'] as $c) {
                location_equipment_db::add_location_equipment($locationID, $c);
            }
            
            include('view/add_confirmation.php');
        } else {
            
            $error_message['checkbox'] = 'You must select at least 1 location.';
            
            include('view/add_title_to_conference.php');
            exit();
        }
     
        die();
        break;
    
    case 'conferences':
        
        $conferences = conference_db::select_all();
        
        include('view/view_all_conferences.php');
        die();
        break;
    
    case 'view_enter_conference':
        
        if (!isset($conference_name)) {
            $conference_name = '';
        }

        if (!isset($conference_location)) {
            $conference_location = '';
        }

        if (!isset($start_time)) {
            $start_time = '';
        }

        if (!isset($end_time)) {
            $end_time = '';
        }

        if (!isset($lunch)) {
            $lunch = '';
        }

        if (!isset($session_length)) {
            $session_length = '';
        }

        if (!isset($break_length)) {
            $break_length = '';
        }

        if (!isset($error_message)) {
            $error_message = [];
            $error_message['conference_name'] = '';
            $error_message['conference_location'] = '';
            $error_message['start_time'] = '';
            $error_message['end_time'] = '';
            $error_message['lunch'] = '';
            $error_message['session_length'] = '';
            $error_message['break_length'] = '';
        }
        
        include('view/enter_conferences.php');
        die();
        break;
    
    case 'enter_conference':
        
        $conference_name = filter_input(INPUT_POST, 'conference_name');
        $conference_location = filter_input(INPUT_POST, 'conference_location');
        $start_time = filter_input(INPUT_POST, 'start_time');
        $end_time = filter_input(INPUT_POST, 'end_time');
        $lunch = filter_input(INPUT_POST, 'lunch');
        $session_length = filter_input(INPUT_POST, 'session_length', FILTER_VALIDATE_FLOAT);
        $break_length = filter_input(INPUT_POST, 'break_length', FILTER_VALIDATE_FLOAT);
       
        $error_message = [];
        $error_message['conference_name'] = '';
        $error_message['conference_location'] = '';
        $error_message['start_time'] = '';
        $error_message['end_time'] = '';
        $error_message['lunch'] = '';
        $error_message['session_length'] = '';
        $error_message['break_length'] = '';

        

        if ($conference_name === null || $conference_name === "") {
            $error_message['conference_name'] = 'You must enter a conference name.';
        } 
        
        if ($conference_location === null || $conference_location === "") {
            $error_message['conference_location'] = 'You must enter a conference location.';
        } 
        
        //time entered must be in military time ex. 0800, 1700
        $timePattern = '/^([01][0-9]|2[0-3]):([0-5][0-9])$/';
        $sTimeValid = preg_match($timePattern, $start_time);
        $eTimeValid = preg_match($timePattern, $end_time);
        $lTimeValid = preg_match($timePattern, $lunch);
        
        if ($start_time === null || $start_time === "") {
            $error_message['start_time'] = 'You must enter a start time in military time (ex 0800, 1700)';
        } else if ($sTimeValid === FALSE || $sTimeValid === 0) {
            $error_message['start_time'] = 'You must enter the time in military time (ex 0800, 1700)';
        }

        if ($end_time === null || $end_time === "") {
            $error_message['end_time'] = 'You must enter an end time in military time (ex 0800, 1700)';
        } else if ($eTimeValid === FALSE || $eTimeValid === 0) {
            $error_message['end_time'] = 'You must enter the time in military time (ex 0800, 1700)';
        }
        
        if ($lunch === null || $lunch === "") {
            $error_message['lunch'] = 'You must enter a lunch time in military time (ex 0800, 1700)';
        } else if ($lTimeValid === FALSE || $lTimeValid === 0) {
            $error_message['lunch'] = 'You must enter the lunch time in military time (ex 0800, 1700)';
        }
        
        $floatPattern = '/^-?(?:\d+|\d*\.\d+)$/';
        $sessionValid = preg_match($floatPattern, $session_length);
        $breakValid = preg_match($floatPattern, $break_length);
        
        if ($session_length === null || $session_length === "") {
            $error_message['session_length'] = 'You must enter a session length';
        } else if ($sessionValid === FALSE || $sessionValid === 0) {
            $error_message['session_length'] = 'You must enter session length in 1.00 float format (ex. .75 for 45 min)';
        }
        
        if ($break_length === null || $break_length === "") {
            $error_message['break_length'] = 'You must enter a break length';
        } else if ($breakValid === FALSE || $breakValid === 0) {
            $error_message['break_length'] = 'You must enter the break length in 1.00 format (ex .25 for 15 minutes)';
        }
        
        if ($error_message['conference_name'] != '' || $error_message['conference_location'] != '' || $error_message['start_time'] != '' ||  $error_message['end_time'] != '' || $error_message['lunch'] != '' || $error_message['session_length'] != '' ||  $error_message['break_length'] != '') {
            include 'view/enter_conferences.php';
            exit();
        } else {

                conference_db::add_conference($conference_name, $conference_location, $start_time, $end_time, $lunch, $session_length, $break_length);
                include 'view/add_confirmation.php';    
        }
        
        die();
        break;
        
    case 'edit_conference':
        
        $conference_num = filter_input(INPUT_POST, 'conference_num', FILTER_VALIDATE_INT);
        
        $conference = conference_db::get_conference($conference_num);
        
        $conference_name = $conference_name->getConference_name();
        $conference_location = $conference_location->getConference_location();
        $start_time = $start_time->getStart_time();
        $end_time = $end_time->getEnd_time();
        $lunch = $lunch->getLunch();
        $session_length = $session_length->getSession_length();
        $break_length = $break_length->getBreak_length();
        
        $error_message = [];
        $error_message['conference_name'] = '';
        $error_message['conference_location'] = '';
        $error_message['start_time'] = '';
        $error_message['end_time'] = '';
        $error_message['lunch'] = '';
        $error_message['session_length'] = '';
        $error_message['break_length'] = '';
        
        include('view/edit_speakers');
        die();
        break;
    
    case 'commitConferenceUpdate':
        
        $conference_name = filter_input(INPUT_POST, 'conference_name');
        $conference_location = filter_input(INPUT_POST, 'conference_location');
        $start_time = filter_input(INPUT_POST, 'start_time');
        $end_time = filter_input(INPUT_POST, 'end_time');
        $lunch = filter_input(INPUT_POST, 'lunch');
        $session_length = filter_input(INPUT_POST, 'session_length', FILTER_VALIDATE_FLOAT);
        $break_length = filter_input(INPUT_POST, 'break_length', FILTER_VALIDATE_FLOAT);
       
        $error_message = [];
        $error_message['conference_name'] = '';
        $error_message['conference_location'] = '';
        $error_message['start_time'] = '';
        $error_message['end_time'] = '';
        $error_message['lunch'] = '';
        $error_message['session_length'] = '';
        $error_message['break_length'] = '';

        

        if ($conference_name === null || $conference_name === "") {
            $error_message['conference_name'] = 'You must enter a conference name.';
        } 
        
        if ($conference_location === null || $conference_location === "") {
            $error_message['conference_location'] = 'You must enter a conference location.';
        } 
        
        //time entered must be in military time ex. 0800, 1700
        $timePattern = '/^([01][0-9]|2[0-3]):([0-5][0-9])$/';
        $sTimeValid = preg_match($timePattern, $start_time);
        $eTimeValid = preg_match($namePattern, $end_time);
        $lTimeValid = preg_match($namePattern, $lunch);
        
        if ($start_time === null || $start_time === "") {
            $error_message['start_time'] = 'You must enter a start time in military time (ex 0800, 1700)';
        } else if ($sTimeValid === FALSE || $sTimeValid === 0) {
            $error_message['start_time'] = 'You must enter the time in military time (ex 0800, 1700)';
        }

        if ($end_time === null || $end_time === "") {
            $error_message['end_time'] = 'You must enter an end time in military time (ex 0800, 1700)';
        } else if ($eTimeValid === FALSE || $eTimeValid === 0) {
            $error_message['end_time'] = 'You must enter the time in military time (ex 0800, 1700)';
        }
        
        if ($lunch === null || $lunch === "") {
            $error_message['lunch'] = 'You must enter a lunch time in military time (ex 0800, 1700)';
        } else if ($lTimeValid === FALSE || $lTimeValid === 0) {
            $error_message['lunch'] = 'You must enter the lunch time in military time (ex 0800, 1700)';
        }
        
        $floatPattern = '/^-?(?:\d+|\d*\.\d+)$/';
        $sessionValid = preg_match($floatPattern, $session_length);
        $breakValid = preg_match($floatPattern, $break_length);
        
        if ($session_length === null || $session_length === "") {
            $error_message['session_length'] = 'You must enter a session length';
        } else if ($sessionValid === FALSE || $sessionValid === 0) {
            $error_message['session_length'] = 'You must enter session length in 1.00 float format (ex. .75 for 45 min)';
        }
        
        if ($break_length === null || $break_length === "") {
            $error_message['break_length'] = 'You must enter a break length';
        } else if ($breakValid === FALSE || $breakValid === 0) {
            $error_message['break_length'] = 'You must enter the break length in 1.00 format (ex .25 for 15 minutes)';
        }
        
        if ($error_message['conference_name'] != '' || $error_message['conference_location'] != '' || $error_message['start_time'] != '' ||  $error_message['end_time'] != '' || $error_message['lunch'] != '' || $error_message['session_length'] != '' ||  $error_message['break_length'] != '') {
            include 'view/edit_conferences.php';
            exit();
        } else {

                conference_db::update_conference($conference_name, $conference_location, $start_time, $end_time, $lunch, $session_length, $break_length);
                include 'view/update_confirmation.php';    
        }
        
        die();
        break;
    
    case 'view_conference':
        include('view/view_conference');
        die();
        break;
    
    case 'logout':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    
    case '':
        include('');
        die();
        break;
    }

