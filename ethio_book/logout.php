<?php include('core/ini.php'); ?>

<?php

// Get the templates and assign the vars

unset($_SESSION['logged_in']);
unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
unset($_SESSION['admin']);
unset($_SESSION['is_seller']);

$_SESSION = array();

$template = new Template('templates/logout.php');

echo $template;
