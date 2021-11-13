<?php require('core/ini.php') ?>

<?php

$template = new Template('templates/authors.php');
$data = array();
if (isset($_GET['un'])) {
    $data['un'] = $_GET['un'];
    $account = new Account();
    $template->author = $account->getAuthorInfo($data['un']);
}

// get all blogs post
$blog_post = $account->getBlogPost($_SESSION['user_id']);
if ($blog_post) {
    $template->blogs = $blog_post;
}
echo $template;
