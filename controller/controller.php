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

        $_SESSION['user'] = new User();

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

            $user->setFname($_POST['fname']);
            $user->setLname($_POST['lname']);
            $user->setUsername($_POST['username']);
            $user->setPassword($_POST['password']);
            $user->setEmail($_POST['email']);


            //if first name is valid store data
            if (Validation::validName($userFName)) {
                $user->setFname($userFName);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["fname"]', 'Please enter a valid first name');
            }

            //if last name is valid store data
            if (Validation::validName($userLName)) {
                $user->setLname($userLName);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["lname"]', 'Please enter a valid last name');
            }

            //if email is valid store data
            if (Validation::validEmail($userEmail)) {
                $user->setEmail($userEmail);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["email"]', 'Please enter a valid email');

            }

            //if username is valid store data
            $user->setUsername($userName);

            //if password is valid store data
            $user->setPassword($userPassword);

            /*//if password is valid store data
            if (Validation::isValidPassword($userPassword)) {
                $_SESSION['password'] = $userPassword;
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["password"]',
                    'Password must contain an uppercase, a number, and at least one special character');

            }*/

            $_SESSION['user'] = $user;

            if (empty($this->_f3->get('errors'))) {
                header('location: summary');
            }
        }

        //store the user input to the hive
        $this->_f3->set('user', $_POST['premium']);
        $this->_f3->set('userFName', $user->getFname());
        $this->_f3->set('userLName', $user->getLname());
        $this->_f3->set('userName', $user->getUsername());
        $this->_f3->set('userPassword', $user->getPassword());
        $this->_f3->set('userEmail', $user->getEmail());

        //display the signup page
        $view = new Template();
        echo $view->render('views/signup.html');
    }

    function summary()
    {
        $userID = $GLOBALS['dataLayer']->saveUser($_SESSION['user']);
        $this->_f3->set('userID', $userID);

        //Display the second order form
        $view = new Template();
        echo $view->render('views/summary.html');

        //This might be problematic
        unset($_SESSION['order']);
    }

    function login()
    {
        /*
        CREATE TABLE users (
            userid int(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
            username varchar(20) NOT NULL,
            password varchar(40) NOT NULL,
            authlevel int(1) DEFAULT NULL
        );
        INSERT INTO users (username, password, authlevel) VALUES
             ('jshmo', sha1('shmo123'), 1),
     */

        //Connect to database
        try {
            //Instantiate a PDO database object
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
                echo "Connect to database";
        }
        catch (PDOException $e) {
            echo $e->getMessage(); //for debugging
            echo "OOF";
        }

        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');

        // check if the user is already logged in, if yes redirect to welcome page
        if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
            header("location: welcome");
            exit;
        }

        //Connect to DB
        require $_SERVER['DOCUMENT_ROOT']."/../config.php";

        // Define variables and initialize with empty values
        $username = $password = "";
        $username_err = $password_err = $login_err = "";

        //Initialize error flag
        $errFlag = false;

        //See if the login form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // Check if username is empty
            if(empty(trim($_POST["username"]))){
                $username_err = "Please enter username.";
            } else{
                $username = trim($_POST["username"]);
            }

            // Check if password is empty
            if(empty(trim($_POST["password"]))){
                $password_err = "Please enter your password.";
            } else{
                $password = trim($_POST["password"]);
            }

            //Query the DB
            $sql = "SELECT * FROM users WHERE username = :un AND password = :pw";
            $sql2 = "INSERT INTO users (username, password, authlevel) 
                VALUES (:username, :password, :authlevel)";
            $statement = $dbh->prepare($sql);

            $un = $_POST['username'];
            $pw = sha1($_POST['password']);
            $statement->bindParam(':un', $un, PDO::PARAM_STR);
            $statement->bindParam(':pw', $pw, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $authLevel = $row['authlevel'];

            //Successful login
            if ($count == 1) {

                // record login in the session array
                $_SESSION['un'] = $un;

                //Send the user back where they came from
                if (isset($_SESSION['page'])) {
                    $loc = $_SESSION['page'];
                } else {
                    $loc = "welcome";
                }
                header("location: $loc");

            } else {
                //Set error flag
                $errFlag = true;
            }
        }

        // display the login page
        $view = new Template();
        echo $view->render('views/login.html');
    }

    function logout()
    {
        session_regenerate_id();
        session_destroy();
        $_SESSION = array();
        header('location: login');

        // display the home page
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function welcome()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Welcome');

        //Connect to DB
        require $_SERVER['DOCUMENT_ROOT']."/../config.php";

        // if the user is not logged in
        if (!isset($_SESSION['un'])) {
            // store the current page in the session
            $_SESSION['page'] = 'welcome';

            // redirect user to login page
            header('location: login');
        }

        // display the welcome page
        $view = new Template();
        echo $view->render('views/welcome.html');
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