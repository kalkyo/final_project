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

    static function saveOrder($order)
    {
        //1. Define the query
        $sql = "INSERT INTO cart (total_price, shoe_id)
               VALUES (:total_price, :shoe_id)";
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