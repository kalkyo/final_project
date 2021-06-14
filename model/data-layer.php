<?php

/*  data-layer.php
 *  Return data for the final_project website
 *
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
    public function __construct()
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


}