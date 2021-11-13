<?php require('core/ini.php'); ?>

<?php

// Get template and assign vars
$template = new Template('templates/frontpage.php');
$book = new Book();

$template->best_rated = $book->best_rated();
$template->best_sellers = $book->best_sellers();
$template->hot_new_releases = $book->hot_new_releases();

$template->premium = $book->selectPremium();
//Assign vars


echo $template;
