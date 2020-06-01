<?php
// Turn on/off error reporting
error_reporting(-1);

// Start session
if (!isset($_SESSION)) {
    session_start();
}

define('ROOT_PATH', '..' . __DIR__ . '/'); // path to 'this web'
define('SRC_PATH',  __DIR__ . '/'); // path to 'this SRC folder'


include('dbconnect.php');
// Include functions and classes
require_once(SRC_PATH . 'app/common_functions.php');
require_once(SRC_PATH . 'app/user_DbHandler.php');
$userDbHandler = new userDbHandlerClass();

require('app/product_DbHandler.php');
$productDbHandler = new productDbHandlerClass();

require('app/adminusers_DbHandler.php');
$adminuserDbHandler = new adminuserDbHandlerClass();