<?php

/**
 * Order class
 * Represents an order object with name, email ,username and address
 * @author Peter Eang & Jada Senebouttarath
 * @copyright 2021
 */

class Order
{
    private $_fname;
    private $_lname;
    private $_email;
    private $_address;
    private $_shoes;

    /**
     * Member constructor.
     * @param string $fname User's first name, default ""
     * @param string $lname User's last name, default ""
     * @param string $email User's email, default ""
     * @param string $address User's address, default ""
     *
     */
    function __construct($fname = "", $lname = "", $email = "", $address = "", $_shoes = "")
    {
        $this->_fname = $fname;
        $this->_lname = $lname;
        $this->_email = $email;
        $this->_address = $address;
        $this->_shoes = $_shoes;

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
     * getShoes() function
     * @return mixed|string User's shoe selection
     */
    public function getShoes()
    {
        return $this->_shoes;
    }

    /**
     * setShoes() function
     * @param mixed|string $shoes
     */
    public function setShoes($shoes)
    {
        $this->_shoes = $shoes;
    }


}