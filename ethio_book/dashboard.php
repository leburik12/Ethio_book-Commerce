<?php include('core/ini.php'); ?>

<?php

$bk = new Book();

$template = new Template('templates/dashboard.php');

isset($_SESSION['is_admin'])  ? $id = 1 : $id = $_SESSION['user_id'];
$template->books = $bk->seller_books($id);

echo $template;
