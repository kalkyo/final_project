<?php

/*  data-layer.php
 *  Return data for the final_project website
 */
//Connect to DB
require_once($_SERVER['DOCUMENT_ROOT']."/../config.php");

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
        try{
            // instantiate a PDO db obj
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            // echo "connected to database!"
        }
        catch(PDOException $e){
            //echo $e->getMessage(); //debugging purposes
            die("Srry T-T");
        }
    }

    static function getShoes()
    {
        return array("af1" => "Air Force 1", "aj1" => "Air Jordan 1", "sb" => "SB Dunk Low",
            "nmd" => "Human Race NMD", "superstar" => "Superstar 80s Bape", "yeezy" => "Yeezy Boost 700");
    }


    function saveOrder($order)
    {
        //1. define the query
        $sql ="";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);


    }

    /**
     * saveUser accepts an user object and inserts it into the database
     * @param $user
     * @return string
     */
    /*
    function saveUser($user)
    {
        //1. Define the query
        $sql = "INSERT INTO users(fname, lname, username, password, email)
                VALUES (:fname, :lname, :username, :password, :email)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $user = $_SESSION['user'];
        $statement->bindParam(':fname', $user->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $user->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':username', $user->getUsername(), PDO::PARAM_STR);
        $statement->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        $statement->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        //5. Process the results (get userID)
        $id = $this->_dbh->lastInsertId();
        return $id;

    }
    */

    /**
     * getUser returns user object from database
     * @return array An array of data rows
     */
    /*
    function getUser()
    {
        //1. Define the query
        $sql = "SELECT id FROM users WHERE username = '$userName' and passcode = '$userPassword'";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters
        $user = $_SESSION['user'];
        $statement->bindParam(':fname', $user->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $user->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':username', $user->getUsername(), PDO::PARAM_STR);
        $statement->bindParam(':password', $user->getPassword(), PDO::PARAM_STR);
        $statement->bindParam(':email', $user->getEmail(), PDO::PARAM_STR);

        //4. Execute the query
        $statement->execute();

        //5. Process the results (get userID)
        $id = $this->_dbh->lastInsertId();
        return $id;
    }
    */


}