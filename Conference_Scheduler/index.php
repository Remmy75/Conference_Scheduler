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
        
        include('view/enter_speakers.php');
        die();
        break;
    
    case 'equipment':
        include('view/enter_equipment.php');
        die();
        break;
    
    case 'locations':
        include('view/enter_locations.php');
        die();
        break;
    
    case 'conferences':
        include('view/enter_conferences.php');
        die();
        break;
    
    case 'logout':
        include('');
        die();
        break;
    
    case 'add_speakers':
        
        include('view/add_confirmation.php');
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

