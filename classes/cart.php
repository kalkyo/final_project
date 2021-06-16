<?php

/**
 * Cart class
 * Represents a cart object with the total price
 * @author Peter Eang & Jada Senebouttarath
 * @copyright 2021
 */
class Cart extends Orders
{
    private $_totalPrice;
    private $_shoes;

    /**
     * Cart constructor.
     * @param $_totalPrice
     * @param $_shoes
     */
    public function __construct($_totalPrice=0, $_shoes="")
    {
        parent::__construct();
        $this->_totalPrice = $_totalPrice;
        $this->_shoes = $_shoes;
    }


    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        return $this->_totalPrice;
    }

    /**
     * @param mixed $totalPrice
     */
    public function setTotalPrice($totalPrice): void
    {
        $this->_totalPrice = $totalPrice;
    }

    /**
     * @return mixed|string
     */
    public function getShoes()
    {
        return $this->_shoes;
    }

    /**
     * @param mixed|string $shoes
     */
    public function setShoes($shoes)
    {
        $this->_shoes = $shoes;
    }

}