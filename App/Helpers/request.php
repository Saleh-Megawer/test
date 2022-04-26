<?php


/**
 * Check IF Request Post Or No
 */

function post($backTo = null)
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect($backTo);
    }
}


/**
 * Helper Function For The $_POST[]
 */
function request($name)
{
    return $_POST[$name];
}



/**
 * Helper Function For The $_POST[]
 */
function has_file($name)
{
    if (isset($_FILES[$name])) {
        return true;
    }
}

/**
 * Helper Function For The $_POST[]
 */
function files($name)
{
    if (has_file($name)) {
        return $_FILES[$name];
    }
}




function required_request($name)
{
    if (!isset($name)) {
        return  back();
    } else {
        return $name;
    }
}



function isset_request($request)
{
    if (isset($request)) {
        return true;
    } else {
        return false;
    }
}



function get($name)
{
    return $_GET[$name];
}