<?php

/*  validation.php
 *  Validate data from the final_project form
 *
 */

class Validation
{
    //returns the name if the name is valid otherwise false
    static function validName($name)
    {
        if (ctype_alpha($name)) {
            return $name;
        } else if ($name == "") {
            return !empty($name);
        }
    }

    //returns the age if the age is valid
    static function validAge($age)
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
    static function validPhone($phone)
    {
        if (preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone)) {
            return $phone;
        } else {
            return !empty($age);
        }
    }

    //returns the email if it is valid
    static function validEmail($email)
    {
        return !!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@
                                      ([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email);
    }

    /*
     * password checks for at least one lowercase char
        at least one uppercase char
        at least one digit
        at least one special sign of @#-_$%^&+=§!?
     */
    static function isValidPassword($password)
    {
        return !!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])
                    (?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $password);
    }

    //validate login
    static function loginUser($userName): bool
    {
        if ($userName == "admin") {
            return true;
        }
        else
            return false;
    }

    static function loginPass($userPassword): bool
    {
        if ($userPassword == "@adminPassword") {
            return true;
        }
        else
            return false;
    }
}

