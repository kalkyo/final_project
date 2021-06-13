<?php

// this is my controller for the diner project

// turn on error-reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

// start a session
session_start();


// require autoload file
require_once ('vendor/autoload.php');
require_once ('model/data-layer.php');
require_once ('model/validation.php');


// instantiate fat-free
$f3 = Base :: instance();

// define default route
$f3->route('GET /' , function ($f3)
{
    // save variable to the F3 "hive" - title
    $f3->set('title', 'Streetwear Storm');
   // display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

// define the create account profile1 route
$f3->route('GET|POST /profile1', function ($f3)
{
    // save variable to the F3 "hive" - title
    $f3->set('title', 'Streetwear Storm');

    //Reinitialize a session array
    $_SESSION = array();

    //Initialize variables to store user input
    $userFName = "";
    $userLName ="";
    $userEmail = "";
    $userName = "";
    $userPassword = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userFName = $_POST['fname'];
        $userLName = $_POST['lname'];
        $userEmail = $_POST['email'];
        $userName = $_POST['username'];
        $userPassword = $_POST['password'];


        //if first name is valid store data
        if (validName($userFName)) {
            $_SESSION['fname'] = $userFName;
        }
        //set an error if not valid
        else {
            $f3->set('errors["fname"]', 'Please enter a valid name');
        }

        //if last name is valid store data
        if (validName($userLName)) {
            $_SESSION['lname'] = $userLName;
        }
        //set an error if not valid
        else {
            $f3->set('errors["lname"]', 'Please enter a valid name');
        }

        //if email is valid store data
        if (validEmail($userEmail)) {
            $_SESSION['email'] = $userEmail;
        }
        //set an error if not valid
        else {
            $f3->set('errors["email"]', 'Please enter a valid email');
        }

        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $_SESSION['email'] = $_POST['email'];


        if (empty($f3->get('errors'))) {
            header('location: profile2');
        }
    }

    //Get the data from the model
    $f3->set('genders', getGender());

    //store the user input to the hive
    $f3->set('userFName', $userFName);
    $f3->set('userLName', $userLName);
    $f3->set('userName', $userName);
    $f3->set('userPassword', $userPassword);
    $f3->set('userEmail', $userEmail);

    //display the personal information page
    $view = new Template();
    echo $view->render('views/signup.html');
}
);

// define login route
$f3->route('GET /login' , function ($f3)
{
    // save variable to the F3 "hive" - title
    $f3->set('title', 'Streetwear Storm');

    // display the home page
    $view = new Template();
    echo $view->render('views/login.php');
});

// define the shoe story page route
$f3->route('GET /outfits', function ($f3)
{
    // save variable to the F3 "hive" - title
    $f3->set('title', 'Outfits');

    // display the store page
    $view = new Template();
    echo $view->render('views/outfits.html');
});

// run fat-free
$f3->run();
