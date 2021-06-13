<?php

/**
 * User class
 * Represents a user object with name, email ,username and password
 * @author Peter Eang & Jada Senebouttarath
 * @copyright 2021
 */

class User
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_username;
    private $_password;

    /**
     * Member constructor.
     * @param string $_fname User's first name, default ""
     * @param string $_lname User's last name, default ""
     * @param string $_email User's email, default ""
     * @param string $_username User's username, default ""
     * @param string $_password User's password, default ""
     * @return void
     */
    function __construct($_fname="", $_lname="", $_email = "", $_username = "", $_password = "")
    {
        $this->_fname = $_fname;
        $this->_lname = $_lname;
        $this->_email = $_email;
        $this->_username = $_username;
        $this->_password = $_password;
    }

    /**
     * getFname() function
     * @return string User's first name
     */
    public function getFname()
    {
        return $this->_fname;
    }

    /**
     * setFname() function
     * @param string $fname User's first name
     * @return void
     */
    public function setFname($fname)
    {
        $this->_fname = $fname;
    }

    /**
     * getLname() function
     * @return string User's last name
     */
    public function getLname()
    {
        return $this->_lname;
    }

    /**
     * setLname() function
     * @param string $lname User's last name
     * @return void
     */
    public function setLname($lname)
    {
        $this->_lname = $lname;
    }

    /**
     * getEmail() function
     * @return string User's Email
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * setEmail() function
     * @param string $email User's email
     * @return void
     */
    public function setEmail($email)
    {
        $this->_email = $email;
    }

    /**
     * getUsername() function
     * @return string User's username
     */
    public function getUsername()
    {
        return $this->_username;
    }

    /**
     * setUsername() function
     * @param string $userName User's username
     * @return void
     */
    public function setUsername($userName)
    {
        $this->_username = $userName;
    }

    /**
     * getPassword() function
     * @return string User's password
     */
    public function getPassword()
    {
        return $this->_password;
    }

    /**
     * setPassword() function
     * @param string $password User's password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }
}