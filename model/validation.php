<?php

/*  validation.php
 *  Validate data from the final_project form
 *
 */

//returns the name if the name is valid otherwise false
function validName($name)
{
    if (ctype_alpha($name)) {
        return $name;
    } else if ($name == "") {
        return !empty($name);
    }
}

//returns the age if the age is valid
function validAge($age)
{
    $HIGHEST_AGE = 118;
    $LOWEST_AGE = 18;
    if (ctype_digit($age)) {
        if ($age < $LOWEST_AGE || $age > $HIGHEST_AGE) {
            return !ctype_digit($age);
        }
        return !empty($age);
    }
}

//returns the phone number if it is valid following the regex
function validPhone($phone)
{
    if (preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)) {
        return $phone;
    } else {
        return !empty($age);
    }
}