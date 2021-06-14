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
                $this->_f3->set('errors["fname"]', 'Please enter a valid first name');
            }

            //if last name is valid store data
            if (validName($userLName)) {
                $_SESSION['lname'] = $userLName;
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["lname"]', 'Please enter a valid last name');
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
                header('location: welcome');
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

        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');

        //Initialize error flag
        $errFlag = false;

        //See if the login form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Connect to DB
            require $_SERVER['DOCUMENT_ROOT']."/../config.php";

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
                    $loc = "login";
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