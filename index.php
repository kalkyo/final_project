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
$f3->route('GET /' , function ()
{
   // display the home page
    $view = new Template();
    echo $view->render('views/home.html');
});

$f3->route('GET|POST /profile1', function ($f3)
{
    //Reinitialize a session array
    $_SESSION = array();

    //Initialize variables to store user input
    $userFName = "";
    $userLName ="";
    $userAge = "";
    $userPhone = "";
    $userGender ="";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $userFName = $_POST['fname'];
        $userLName = $_POST['lname'];
        $userAge = $_POST['age'];
        $userPhone = $_POST['phone'];
        $userGender = $_POST['gender'];

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

        //if age is valid store data
        if (validAge($userAge)) {
            $_SESSION['age'] = $userAge;
        }
        //set an error if not valid
        else {
            $f3->set('errors["age"]', 'Please enter a valid age number
            between 18 - 118');
        }

        //if phone number is valid store data
        if (validPhone($userPhone)) {
            $_SESSION['phone'] = $userPhone;
        }
        //set an error if not valid
        else {
            $f3->set('errors["phone"]', 'Please enter a valid phone number');
        }

        $_SESSION['fname'] = $_POST['fname'];
        $_SESSION['lname'] = $_POST['lname'];
        $_SESSION['age'] = $_POST['age'];
        $_SESSION['gender'] = $userGender;
        $_SESSION['phone'] = $_POST['phone'];

        if (empty($f3->get('errors'))) {
            header('location: profile2');
        }
    }

    //Get the data from the model
    $f3->set('genders', getGender());

    //store the user input to the hive
    $f3->set('userFName', $userFName);
    $f3->set('userLName', $userLName);
    $f3->set('userAge', $userAge);
    $f3->set('userPhone', $userPhone);
    $f3->set('userGender', $userGender);

    //display the personal information page
    $view = new Template();
    echo $view->render('views/personalinfo.html');
}
);

// run fat-free
$f3->run();
