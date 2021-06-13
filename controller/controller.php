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

    function signup()
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
                $this->_f3->set('errors["fname"]', 'Please enter a valid name');
            }

            //if last name is valid store data
            if (validName($userLName)) {
                $_SESSION['lname'] = $userLName;
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["lname"]', 'Please enter a valid name');
            }

            //if email is valid store data
            if (validEmail($userEmail)) {
                $_SESSION['email'] = $userEmail;
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["email"]', 'Please enter a valid email');
            }

            $_SESSION['fname'] = $_POST['fname'];
            $_SESSION['lname'] = $_POST['lname'];
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            $_SESSION['email'] = $_POST['email'];


            if (empty($this->_f3->get('errors'))) {
                header('location: profile2');
            }
        }

        //store the user input to the hive
        $this->_f3->set('userFName', $userFName);
        $this->_f3->set('userLName', $userLName);
        $this->_f3->set('userName', $userName);
        $this->_f3->set('userPassword', $userPassword);
        $this->_f3->set('userEmail', $userEmail);

        //display the personal information page
        $view = new Template();
        echo $view->render('views/signup.html');
    }

    function login()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');

        // display the home page
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function outfits()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Outfits');

        // display the store page
        $view = new Template();
        echo $view->render('views/outfits.html');
    }
}