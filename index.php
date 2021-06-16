<?php

// this is my controller for the final project

// turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require autoload file
require_once('vendor/autoload.php');
require $_SERVER['DOCUMENT_ROOT'] . '/../config.php';

// start a session
session_start();

// instantiate fat-free
$f3 = Base:: instance();
$con = new Controller($f3);
$dataLayer = new DataLayer();

// define default route
$f3->route('GET|POST /', function () {

    $GLOBALS['con']->home();
});

// define the create account signup route
$f3->route('GET|POST /checkout', function ($f3) {
    $GLOBALS['con']->checkout();
});

// define the create account signup route
$f3->route('GET|POST /cart', function ($f3) {
    $GLOBALS['con']->cart();
});

// define summary route
$f3->route('GET /summary', function ($f3) {
    $GLOBALS['con']->summary();
});

// define login route
$f3->route('GET|POST /login', function ($f3) {
    $GLOBALS['con']->login();
});

// define logout route
$f3->route('GET /logout', function ($f3) {
    $GLOBALS['con']->logout();
});


// define welcome route
$f3->route('GET|POST /welcome', function ($f3) {
    $GLOBALS['con']->welcome();
});

// define the shoe story page route
$f3->route('GET /shoes', function ($f3) {
    $GLOBALS['con']->shoes();
});

// run fat-free
$f3->run();