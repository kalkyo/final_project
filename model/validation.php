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

//returns the email if it is valid
function validEmail($email)
{
    return !!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@
([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email);;
}

/*
 * password checks for at least one lowercase char
    at least one uppercase char
    at least one digit
    at least one special sign of @#-_$%^&+=§!?
 */
function isValidPassword($password): bool
{
    $pattern = '/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/';
    return preg_match($pattern, $password) == 1;


}