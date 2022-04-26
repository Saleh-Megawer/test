<?php

/*** Error Mode ***/
//error_reporting(0);


/*** Website Info ***/
define("APP_NAME", 'Search Academy');

define("APP_LINK", 'https://search-academy.com/u/');


/*** DataBase ***/
define("DB_NAME", 'mejsp_search_academy');
define("DB_USERNAME", 'root');
define("DB_PASSWORD", '');




/*** Mail ***/
define("MAIL_MAILER", 'smtp');
define("MAIL_HOST", 'smtp.hostinger.com');
define("MAIL_PORT", 465); // 587
define("MAIL_USERNAME", 'sender@search-academy.com');
define("MAIL_PASSWORD", 'V4xad723tQp@t*U');
define("MAIL_ENCRYPTION", 'ssl');
define("MAIL_FROM_ADDRESS", 'sender@search-academy.com');
define("MAIL_LOGO", ''); // Image URL Example => https://your-domain.come/logo.png















/**
 * ---------------------------------------
 * ---------------------------------------
 * Do not modify the following information
 * ---------------------------------------
 * ---------------------------------------
 */
define("DS", DIRECTORY_SEPARATOR); // DIRECTORY_SEPARATOR [ \ ]
require  "vendor" . DS . "autoload.php"; // Require Autoload Class

define('APP_URL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . DS);


/*** Admin Paths ***/
define('ADMIN_PATH', __DIR__ . DS . 'admin' . DS);      // Admin


/*** App Paths ***/
define('APP_PATH', __DIR__ . DS . 'app' . DS);        // Public
define('HELPERS_PATH', APP_PATH . 'Helpers' . DS);    // Helpers



/*** Public Paths ***/
define('PUBLIC_PATH', APP_URL  . 'public' . DS);  // Public
define('PUBLIC_DIR', __DIR__ . DS . 'public' . DS);  // Public
define('ASSETS_PATH', PUBLIC_DIR . 'assets' . DS);   // Assets
define('IMAGES_PATH', ASSETS_PATH . 'images' . DS);   // Images
define('JS_PATH', ASSETS_PATH . 'js' . DS);           // Js
define('CSS_PATH', ASSETS_PATH . 'css' . DS);         // Css
define('PLUGINS_PATH', ASSETS_PATH . 'plugins' . DS); // Plugins
/*** Resources Path ***/
define('RESOURCES', __DIR__ . DS . 'resources' . DS);  // Config
/*** Config Path ***/
define('CONFIG_PATH', __DIR__ . DS . 'config' . DS);  // Config
