<?php

/**
 * Orders class
 * Represents an Orders object with name, email ,username and address
 * @author Peter Eang & Jada Senebouttarath
 * @copyright 2021
 */

class Orders
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_address;
    private $_city;
    private $_state;
    private $_zipcode;

    /**
     * Member constructor.
     * @param string $fname User's first name, default ""
     * @param string $lname User's last name, default ""
     * @param string $email User's email, default ""
     * @param string $address User's address, default ""
     *
     */
    function __construct($fname = "", $lname = "", $email = "", $address = "",
    $city="", $state="", $zipcode="")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_address = $address;
        $this->_city = $city;
        $this->_state = $state;
        $this->_zipcode = $zipcode;

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
     * getAddress() function
     * @return string User's address
     */
    public function getAddress(): string
    {
        return $this->_address;
    }

    /**
     * setAddress() function
     * @param string $address User's address
     * @return void
     */
    public function setAddress($address): void
    {
        $this->_address = $address;
    }

    /**
     * @return mixed|string
     */
    public function getCity()
    {
        return $this->_city;
    }

    /**
     * @param mixed|string $city
     */
    public function setCity($city)
    {
        $this->_city = $city;
    }

    /**
     * @return mixed|string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed|string $state
     */
    public function setState($state)
    {
        $this->_state = $state;
    }

    /**
     * @return mixed|string
     */
    public function getZipcode()
    {
        return $this->_zipcode;
    }

    /**
     * @param mixed|string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->_zipcode = $zipcode;
    }

}