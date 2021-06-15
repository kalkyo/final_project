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

        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');



        // For if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userFName = $_POST['fname'];
            $userLName = $_POST['lname'];
            $userEmail = $_POST['email'];
            $userAddress = $_POST['address'];


            //if first name is valid store data
            if (Validation::validName($userFName)) {
                $_SESSION['order']->setFname($userFName);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["fname"]', 'Please enter a valid first name');
            }

            //if last name is valid store data
            if (Validation::validName($userLName)) {
                $_SESSION['order']->setLname($userLName);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["lname"]', 'Please enter a valid last name');
            }

            //if email is valid store data
            if (Validation::validEmail($userEmail)) {
                $_SESSION['order']->setEmail($userEmail);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["email"]', 'Please enter a valid email');

            }

            //if address is valid store data
            $_SESSION['order']->setAddress($userAddress);


            if (empty($this->_f3->get('errors'))) {
                header('location: summary');
            }
        }



        //store the user input to the hive
        $this->_f3->set('userFName', $_SESSION['order']->getFname());
        $this->_f3->set('userLName', $_SESSION['order']->getLname());
        $this->_f3->set('userAddress', $_SESSION['order']->getAddress());
        $this->_f3->set('userEmail', $_SESSION['order']->getEmail());

        //display the signup page
        $view = new Template();
        echo $view->render('views/checkout.html');
    }

    function cart()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');

        //Reinitialize a session array
        $_SESSION = array();

        $_SESSION['order'] = new Order();

        //Initialize variables for user input
        $userShoes = array();

        $_POST['shoes'] = "";

        //If the form has been submitted, validate the data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            var_dump($_POST);

            //If shoes are selected
            if (!empty($_POST['shoes'])) {

                //Get user input
                $userShoes = $_POST['shoes'];

                //If shoes are valid
                if (Validation::validShoes($userShoes)) {
                    $_SESSION['order']->setShoes(implode(", ", $userShoes));
                }
                else {
                    $this->_f3->set('errors["shoes"]', 'Invalid selection');
                }
            }

            if(!isset($_POST['shoes'])){
                //do something when not set
                $this->_f3->set('errors["shoes"]', 'Invalid selection');

            }

            //If the error array is empty, redirect to summary page
            if (empty($this->_f3->get('errors'))) {
                header('location: checkout');
            }
        }

        //var_dump($userShoes);

        //Get the shoes from the Model and send them to the View
        $this->_f3->set('shoes', DataLayer::getShoes());

        //Add the user data to the hive
        $this->_f3->set('userShoes', $userShoes);

        //Display the second order form
        $view = new Template();
        echo $view->render('views/cart.html');
    }

    function summary()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Summary');

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