<?php

/*
conference_num
conference_name
conference_location
start_time
end_time
lunch
session_length
break_length

$conference_num
$conference_name
$conference_location
$start_time
$end_time
$lunch
$session_length
$break_length

*/
class conference {
    private $conference_num, $conference_name, $conference_location;
    function __construct($conference_num, $conference_name, $conference_location) {
        
        $this->conference_num = $conference_num;
        $this->conference_name = $conference_name;
        $this->conference_location = $conference_location;
        
        
    }
    function getConference_num() {
        return $this->conference_num;
    }

    function getConference_name() {
        return $this->conference_name;
    }

    function getConference_location() {
        return $this->conference_location;
    }
    
    function setConference_num($conference_num) {
        $this->conference_num = $conference_num;
    }

    function setConference_name($conference_name) {
        $this->conference_name = $conference_name;
    }

    function setConference_location($conference_location) {
        $this->conference_location = $conference_location;
    }
}
