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
     * @param string $fname User's first name, default ""
     * @param string $lname User's last name, default ""
     * @param string $email User's email, default ""
     * @param string $username User's username, default ""
     * @param string $password User's password, default ""
     * @return void
     */
    function __construct($fname="", $lname="", $email = "", $username = "", $password = "")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_username = $username;
        $this->_password = $password;
    }

    /**
     * getFname() function
     * @return string User's first name
     */
    public function getFname(): string
    {
        return $this->_fname;
    }

    /**
     * setFname() function
     * @param string $fname User's first name
     * @return void
     */
    public function setFname($fname): void
    {
        $this->_fname = $fname;
    }

    /**
     * getLname() function
     * @return string User's last name
     */
    public function getLname(): string
    {
        return $this->_lname;
    }

    /**
     * setLname() function
     * @param string $lname User's last name
     * @return void
     */
    public function setLname($lname): void
    {
        $this->_lname = $lname;
    }

    /**
     * getEmail() function
     * @return string User's Email
     */
    public function getEmail(): string
    {
        return $this->_email;
    }

    /**
     * setEmail() function
     * @param string $email User's email
     * @return void
     */
    public function setEmail($email): void
    {
        $this->_email = $email;
    }

    /**
     * getUsername() function
     * @return string User's username
     */
    public function getUsername(): string
    {
        return $this->_username;
    }

    /**
     * setUsername() function
     * @param string $userName User's username
     * @return void
     */
    public function setUsername($userName): void
    {
        $this->_username = $userName;
    }

    /**
     * getPassword() function
     * @return string User's password
     */
    public function getPassword(): string
    {
        return $this->_password;
    }

    /**
     * setPassword() function
     * @param string $password User's password
     */
    public function setPassword($password): void
    {
        $this->_password = $password;
    }
}