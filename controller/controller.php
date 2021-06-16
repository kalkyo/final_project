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

    function cart()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');

        //Initialize variables for user input
        $userShoes = array();

        //Reinitialize a session array
        $_SESSION = array();

        $_SESSION['cart'] = new Cart();

        //If the form has been submitted, validate the data
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //If shoes are selected
            if (!empty($_POST['shoes'])) {

                //Get user input
                $userShoes = $_POST['shoes'];

                //If shoes are valid
                if (Validation::validShoes($userShoes)) {
                    $_SESSION['cart']->setShoes(implode(", ", $userShoes));
                    $_SESSION['cart']->setTotalPrice(number_format((double)count($userShoes) * 150.00 * 1.1 + 10.00, 2));
                }
                else {
                    $this->_f3->set('errors["shoes"]', 'Invalid selection');
                }
            }

            //If the error array is empty, redirect to summary page
            if (empty($this->_f3->get('errors'))) {
                header('location: checkout');
            }
        }

        //Get the shoes from the Model and send them to the View
        $this->_f3->set('shoes', DataLayer::getShoes());

        //Add the user data to the hive
        $this->_f3->set('userShoes', $userShoes);

        //Display the second orders form
        $view = new Template();
        echo $view->render('views/cart.html');
    }

    // checkout
    function checkout()
    {

        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Streetwear Storm');

        $_SESSION['orders'] = new Orders();

        // For if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userFName = $_POST['fname'];
            $userLName = $_POST['lname'];
            $userEmail = $_POST['email'];
            $userAddress = $_POST['address'];
            $userCity = $_POST['city'];
            $userState = $_POST['state'];
            $userZipcode = $_POST['zipcode'];



            //if first name is valid store data
            if (Validation::validName($userFName)) {
                $_SESSION['orders']->setFname($userFName);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["fname"]', 'Please enter a valid first name');
            }

            //if last name is valid store data
            if (Validation::validName($userLName)) {
                $_SESSION['orders']->setLname($userLName);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["lname"]', 'Please enter a valid last name');
            }

            //if email is valid store data
            if (Validation::validEmail($userEmail)) {
                $_SESSION['orders']->setEmail($userEmail);
            }
            //set an error if not valid
            else {
                $this->_f3->set('errors["email"]', 'Please enter a valid email');

            }

            //if address is valid store data
            $_SESSION['orders']->setAddress($userAddress);

            $_SESSION['orders']->setCity($userCity);

            $_SESSION['orders']->setState($userState);

            $_SESSION['orders']->setZipcode($userZipcode);



            if (empty($this->_f3->get('errors'))) {
                header('location: summary');
            }
        }

        //Get the shoes from the Model and send them to the View
        $this->_f3->set('states', DataLayer::getStates());

        //store the user input to the hive
        $this->_f3->set('userFName', $_SESSION['orders']->getFname());
        $this->_f3->set('userLName', $_SESSION['orders']->getLname());
        $this->_f3->set('userAddress', $_SESSION['orders']->getAddress());
        $this->_f3->set('userEmail', $_SESSION['orders']->getEmail());
        $this->_f3->set('userCity', $_SESSION['orders']->getCity());
        $this->_f3->set('userState', $_SESSION['orders']->getState());
        $this->_f3->set('userZipcode', $_SESSION['orders']->getZipcode());


        //display the checkout page
        $view = new Template();
        echo $view->render('views/checkout.html');
    }

    function summary()
    {
        // save variable to the F3 "hive" - title
        $this->_f3->set('title', 'Summary');

        //Save the cart and orders to the database
        $cartId = $GLOBALS['dataLayer']->saveCart($_SESSION['cart']);
        $this->_f3->set('cartId', $cartId);

        //Display the second orders form
        $view = new Template();
        echo $view->render('views/summary.html');

        //This might be problematic
        unset($_SESSION['orders']);
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