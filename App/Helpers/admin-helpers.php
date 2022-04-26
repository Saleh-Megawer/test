<?php
/**
 * Admin Helper Functions 
 */


// Admin Prefix URL
function admin_prefix()
{
    return "admin";
}


// Admin Url
function admin_url($to = null)
{   
    
    echo str_replace('\\','/',APP_URL . admin_prefix() . DS . $to);

}



