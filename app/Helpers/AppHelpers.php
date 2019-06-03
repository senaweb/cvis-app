<?php


/**
 * /**
 * Display time $eg: Fri, Jun 20th, 2014
 * @param $date is the time from backend
 */
if (!function_exists('datefy')) {
    function datefy($date): string
    {
        return date("D, M jS, Y", strtotime($date));
    }
};

/**
 * Display carbon date 
 * @param $date is the date from db
 */
if (!function_exists('carbornize')) {
    function carbornize($date): string
    {
        return \Carbon\Carbon::parse($date)->format('d/m/Y');
    }
};

/**
 * Display carbon time format 
 * @param $time from database
 */
if (!function_exists('carbornizeTime')) {
    function carbornizeTime($time): string
    {
        return \Carbon\Carbon::createFromFormat('H:i:s', $time)->format('h:i');
    }
};



/**
 * Display time $eg: 04:07 AM
 * @param $time is the time from backend
 */
if (!function_exists('timefy')) {
    function timefy($time): string
    {
        return date('h:i A', strtotime($time));
    }
};

/**
 * Trancate text into elipses
 * @param $sting is the actual text to trancate or shorten
 * @param $lenght is the lenght of the words before trancation happends
 */
if (!function_exists('trancate')) {
    function trancate($string, $length = 15): string
    {
        return strlen($string) > $length ? substr($string, 0, $length) . "[...]" : $string;
    }
}
