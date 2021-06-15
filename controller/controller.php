<?php

class Controller
{
    private $_f3; //router

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');
        // display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    // checkout
    function checkout()
    {
        //Reinitialize a session array
        $_SESSION = array();

        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');

        //Instantiate a Member or Premium Member obj
        if (isset($_POST['premium'])) {
            $user = new PremiumUser();
        } else {
            $user = new User();
        }

        $_SESSION['user'] = new User();
        var_dump($_SESSION['user']);

        //Initialize variables to store user input
        $userFName = "";
        $userLName = "";
        $userEmail = "";
        $userName = "";
        $userPassword = "";

        // For if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userFName = $_POST['fname'];
            $userLName = $_POST['lname'];
            $userEmail = $_POST['email'];
            $userName = $_POST['username'];
            $userPassword = $_POST['password'];


            //if first name is valid store data
            if (Validation::validName($userFName)) {
                $_SESSION['user']->setFname($userFName);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["fname"]', 'Please enter a valid first name');
            }

            //if last name is valid store data
            if (Validation::validName($userLName)) {
                $_SESSION['user']->setLname($userLName);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["lname"]', 'Please enter a valid last name');
            }

            //if email is valid store data
            if (Validation::validEmail($userEmail)) {
                $_SESSION['user']->setEmail($userEmail);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["email"]', 'Please enter a valid email');

            }

            //if username is valid store data
            $_SESSION['user']->setUsername($userName);

            //if password is valid store data
            $_SESSION['user']->setPassword($userPassword);

            /*//if password is valid store data
            if (Validation::isValidPassword($userPassword)) {
                $_SESSION['password'] = $userPassword;
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["password"]',
                    'Password must contain an uppercase, a number, and at least one special character');
            }*/

            if (empty($this->_f3->get('errors'))) {
                header('location: summary');
            }
        }

        //store the user input to the hive
        $this->_f3->set('user', $_POST['premium']);
        $this->_f3->set('userFName', $_SESSION['user']->getFname());
        $this->_f3->set('userLName', $_SESSION['user']->getLname());
        $this->_f3->set('userName', $_SESSION['user']->getUsername());
        $this->_f3->set('userPassword', $_SESSION['user']->getPassword());
        $this->_f3->set('userEmail', $_SESSION['user']->getEmail());

        //display the signup page
        $view = new Template();
        echo $view->render('views/checkout.html');
    }

    function summary()
    {
        /*
        $userId = $GLOBALS['dataLayer']->saveUser($_SESSION['user']);
        $this->_f3->set('userId', $userId);
        */

        //Display the second order form
        $view = new Template();
        echo $view->render('views/summary.html');

        //This might be problematic
        unset($_SESSION['order']);
    }

    function login()
    {
        $_SESSION = array();

        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validLogin = false;

            $username = $_POST['username'];
            $userpass = $_POST['password'];

            if(Validation::loginUser($username)){
                $validLogin = true;
            }else{
                $validLogin = false;
                $this->_f3->set('errors["username"]', "Incorrect Username");
            }

            if(Validation::loginPass($userpass)){
                $validLogin = true;
            }else{
                $validLogin = false;
                $this->_f3->set('errors["password"]', "Incorrect Password");
            }

            //If there are no errors, redirect to profile route
            if (empty($this->_f3->get('errors')) && $validLogin === true) {
                header('location: welcome');
            }
        }

        //Display the home page
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function logout()
    {
        $_SESSION = array();
        header('location: 328/final_project/');
    }

    function welcome()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Welcome');

        //Connect to DB
       require $_SERVER['DOCUMENT_ROOT']."/../config.php";

       /*
        // if the user is not logged in
        if (!isset($_SESSION['un'])) {

            // store the current page in the session
            $_SESSION['page'] = 'welcome.html';

            // redirect user to login page
            header('location: login');
        }
       */

        // display the welcome page
        $view = new Template();
        echo $view->render('views/welcome.html');
    }

    function shoes()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Shoes');

        // display the store page
        $view = new Template();
        echo $view->render('views/shoes.html');
    }
}