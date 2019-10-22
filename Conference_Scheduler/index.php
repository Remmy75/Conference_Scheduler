<?php

    require_once 'model/conference_db.php';
    require_once 'model/conference_locations_db.php';
    require_once 'model/conference_schedule_db.php';
    require_once 'model/conference_speakers_db.php';
    require_once 'model/equipment_db.php';
    require_once 'model/location_equipment_db.php';
    require_once 'model/locations_db.php';
    require_once 'model/speakers_db.php';
    require_once 'model/title_db.php';
    require_once 'model/title_needs_db.php';
    require_once 'model/title_speakers_db.php';
    
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
        
        include('view/view_speakers.php');
        die();
        break;
    
    case 'add_speakers':
        
        include('view/add_confirmation.php');
        die();
        break;
    
    case 'enter_speakers':
        include('view/enter_speakers.php');
        die();
        break;
    
    case 'edit_speakers':
        include('');
        die();
        break;
    
    case 'speakers_to_title':
        include('');
        die();
        break;
    
    case 'equipment':
        include('view/view_equipment.php');
        die();
        break;
    
    case 'enter_equipment':
        include('view/enter_equipment.php');
        die();
        break;
    
    case 'equipment_to_title':
        include('view/add_equipment_to_titles.php');
        die();
        break;
    
    case 'equipment_to_location':
        include('view/add_equipment_to_locations');
        die();
        break;
    
    case 'edit_equipment':
        include('view/edit_equipment.php');
        die();
        break;
    
    case 'locations':
        include('view/view_locations.php');
        die();
        break;
    
    case 'edit_location':
        include('view/edit_location.php');
        die();
        break;
    
    case 'enter_location':
        include('view/enter_location.php');
        die();
        break;
    
    case 'location_to_conference':
        include('view/add_location_to_conference.php');
        die();
        break;
    
    case 'titles':
        include('view/view_titles.php');
        die();
        break;
    
     case 'enter_title':
        include('view/enter_title.php');
        die();
        break;
    
    case 'edit_title':
        include('view/edit_title.php');
        die();
        break;
    
    case 'title_to_conference':
        include('view/add_title_to_conference.php');
        die();
        break;
    
    case 'conferences':
        include('view/view_all_conferences.php');
        die();
        break;
    
    case 'edit_conference':
        include('view/edit_conference.php');
        die();
        break;
    
    case 'enter_conference':
        include('view/enter_conferences.php');
        die();
        break;
    
    case 'view_conference':
        include('view/view_conference');
        die();
        break;
    
    case '':
        include('');
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

