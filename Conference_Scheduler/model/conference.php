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
    private $conference_num, $conference_name, $conference_location, $start_time, $end_time, $lunch, $session_length, $break_length;
    function __construct($conference_num, $conference_name, $conference_location, $start_time, $end_time, $lunch, $session_length, $break_length) {
        
        $this->conference_num = $conference_num;
        $this->conference_name = $conference_name;
        $this->conference_location = $conference_location;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->lunch = $lunch;
        $this->session_length = $session_length;
        $this->break_length = $break_length;
        
        
        
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

    function getStart_time() {
        return $this->start_time;
    }

    function getEnd_time() {
        return $this->end_time;
    }
    
    function getLunch() {
        return $this->lunch;
    }

    function getSession_length() {
        return $this->session_length;
    }

    function getBreak_length() {
        return $this->break_length;
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

    function setStart_time($start_time) {
        $this->start_time = $start_time;
    }

    function setEnd_time($end_time) {
        $this->end_time = $end_time;
    }
    
    function setLunch($lunch) {
        $this->lunch = $lunch;
    }

    function setSession_length($session_length) {
        $this->session_length = $session_length;
    }

    function setBreak_length($break_length) {
        $this->break_length = $break_length;
    }
}
