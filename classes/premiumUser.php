<?php

/**
 * Premium User class
 * Represents a Premium user object with standard user info and favorite shoe
 * @author Peter Eang & Jada Senebouttarath
 * @copyright 2021
 */
class PremiumUser extends User
{
    private $_favoriteShoes = array();

    /**
     * getFavoriteShoes() function
     * @return array User's favorite shoes
     */
    public function getFavoriteShoe()
    {
        return $this->_favoriteShoes;
    }

    /**
     * setFavoriteShoes() function
     * @param array $favoriteShoes User's favorite shoes
     * @return void
     */
    public function setFavoriteShoes($favoriteShoes)
    {
        $this->_favoriteShoes = $favoriteShoes;
    }


}