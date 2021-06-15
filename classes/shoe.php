<?php
/**
 * Shoe class
 * Represents a shoe object with the model, brand, and price
 * @author Peter Eang & Jada Senebouttarath
 * @copyright 2021
 */
class Shoe
{
    private $_model;
    private $_brand;
    private $_price;

    /**
     * Shoe constructor.
     * @param $_model
     * @param $_brand
     * @param $_price
     */
    public function __construct($_model="", $_brand="", $_price=0)
    {
        $this->_model = $_model;
        $this->_brand = $_brand;
        $this->_price = $_price;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->_model = $model;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->_brand;
    }

    /**
     * @param mixed $brand
     */
    public function setBrand($brand): void
    {
        $this->_brand = $brand;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->_price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->_price = $price;
    }





}