<?php

/*  data-layer.php
 *  Return data for the final_project website
 */
//Connect to DB
require_once($_SERVER['DOCUMENT_ROOT'] . "/../config.php");

class DataLayer
{
    // field for database obj
    private $_dbh;

    /**
     * DataLayer constructor.
     */
    function __construct()
    {
        // connect to the database
        try {
            // instantiate a PDO db obj
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            // echo "connected to database!"
        } catch (PDOException $e) {
            //echo $e->getMessage(); //debugging purposes
            die("Srry T-T");
        }
    }

    static function getShoes()
    {
        return array("af1" => "Air Force 1", "aj1" => "Air Jordan 1", "sb" => "SB Dunk Low",
            "nmd" => "Human Race NMD", "superstar" => "Superstar 80s Bape", "yeezy" => "Yeezy Boost 700");
    }

    function saveCart($cart)
    {
        //1. Define the query
        $sql = "INSERT INTO cart (total_price, shoes)
               VALUES (:total_price, :shoes)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':total_price', $cart->getTotalPrice(), PDO::PARAM_INT);
        $statement->bindParam(':shoes', $cart->getShoes(), PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        //5. Process the results (get CartID)
        $id = $this->_dbh->lastInsertId();
        return $id;
    }

    function saveOrders($orders)
    {
        //1. Define the query
        $sql = "INSERT INTO orders (fname, lname, email, address, city, state, zipcode)
               VALUES (:fname, :lname, :email, :address, :city, :state, :zipcode)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $statement->bindParam(':fname', $orders->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $orders->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':email', $orders->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':address', $orders->getAddress(), PDO::PARAM_STR);
        $statement->bindParam(':city', $orders->getCity(), PDO::PARAM_STR);
        $statement->bindParam(':state', $orders->getState(), PDO::PARAM_STR);


        //4. Execute the query
        $statement->execute();

        //5. Process the results (get CartID)
        $id = $this->_dbh->lastInsertId();
        return $id;
    }

    static function getStates(): array
    {
        return array('Select a State', 'Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California', 'Colorado', 'Connecticut', 'Delaware',
            'District of Columbia', 'Florida', 'Georgia', 'Hawaii', 'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas',
            'Kentucky', 'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota', 'Mississippi',
            'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire', 'New Jersey', 'New Mexico', 'New York',
            'North Carolina', 'North Dakota', 'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
            'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington',
            'West Virginia', 'Wisconsin', 'Wyoming');
    }
}