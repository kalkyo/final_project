<?php

/**
 * Cart class
 * Represents a cart object with the total price
 * @author Peter Eang & Jada Senebouttarath
 * @copyright 2021
 */
class Cart extends Shoe
{
    private $_totalPrice;

    /**
     * Cart constructor.
     * @param $_totalPrice
     */
    public function __construct($_totalPrice = 0)
    {
        parent::__construct();
        $this->_totalPrice = $_totalPrice;
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
}