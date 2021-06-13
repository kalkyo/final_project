<?php

// this is my controller for the diner project

// turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require autoload file
require_once ('vendor/autoload.php');

// start a session
session_start();

// instantiate fat-free
$f3 = Base :: instance();
$con = new Controller($f3);

// define default route
$f3->route('GET /', function (){

    $GLOBALS['con']->home();
});

// define the create account profile1 route
$f3->route('GET|POST /profile1', function ($f3)
{
    $GLOBALS['con']->profile1();
});

// define login route
$f3->route('GET|POST /login' , function ($f3)
{
    $GLOBALS['con']->login();
});

// define the shoe story page route
$f3->route('GET /outfits', function ($f3)
{
    $GLOBALS['con']->outfits();
});

// run fat-free
$f3->run();
