<?php require_once('config/config.php');

// Start session
session_start();

require_once('helpers/format_helper.php');
require_once('helpers/db_helper.php');
require_once('helpers/system_helper.php');

// Autoload Classes
function __autoload($class_name)
{
    require_once('libraries/' . $class_name . '.php');
}
