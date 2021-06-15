<?php

// this is my controller for the final project

// turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// require autoload file
require_once ('vendor/autoload.php');
require $_SERVER['DOCUMENT_ROOT'].'/../config.php';

// start a session
session_start();

// instantiate fat-free
$f3 = Base :: instance();
$con = new Controller($f3);
$dataLayer = new DataLayer();

//test method
/*$datalayer->saveUser(new User("Pengu", "Mang", "pengu@gmail.com",
    "penguM", "testWord12!"));*/

// define default route
$f3->route('GET|POST /', function (){

    $GLOBALS['con']->home();
});

// define the create account signup route
$f3->route('GET|POST /signup', function ($f3)
{
    $GLOBALS['con']->signup();
});

// define summary route
$f3->route('GET /summary' , function ($f3)
{
    $GLOBALS['con']->summary();
});

// define login route
$f3->route('GET|POST /login' , function ($f3)
{
    $GLOBALS['con']->login();
});


// define welcome route
$f3->route('GET|POST /welcome' , function ($f3)
{
    $GLOBALS['con']->welcome();
});

// define the shoe story page route
$f3->route('GET /outfits', function ($f3)
{
    $GLOBALS['con']->outfits();
});

// run fat-free
$f3->run();