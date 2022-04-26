<?php


// Set Session
function session_flash($name, $content)
{
   return $_SESSION[$name] = $content;
}


function isset_session($name, $redirect_to = null)
{
   if (isset($_SESSION[$name])) {

      return redirect($redirect_to);
   }
}


/**
 * Has Session For Check If Have Session OR No 
 * Return True Or False
 */
function has_session($session_name)
{
   if (isset($_SESSION[$session_name])) {
      return true;
   }
}

/**
 * Get Session Data
 */
function get_session($session_name)
{
   return $_SESSION[$session_name];
}

/**
 * Get Session Error Data
 * This Function Only For Display Errors
 */
function errors($value)
{
   if (has_session("errors")) {
      foreach (array_values($_SESSION['errors']) as $k => $v) {
         if (isset($v[$value])) {


            return "Hel";
         }
      }
   }
}

function not_isset_session($name, $redirect_to = null)
{
   if (!isset($_SESSION[$name])) {

      return redirect($redirect_to);
   }
}










//////////////// Auth

function auth($session_name, $value)
{
   if (has_session($session_name)) {
      if (isset(get_session($session_name)[$value])) {
         return get_session($session_name)[$value];
      }
   }
}


function check_role()
{
   if (auth('admin', 'role') != 'admin') {
      redirect(admin_prefix() . '/home');
   }
}

// Token Login


function remove_token()
{
   setcookie('remember_token', NULL, time() - (30 * 60 * 60 * 25), '/');
   setcookie('token', NULL, time() - (30 * 60 * 60 * 25), '/');
}
