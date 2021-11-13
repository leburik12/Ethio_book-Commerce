<?php require('core/ini.php'); ?>


<?php

$template = new Template('templates/mybook.php');

if (!empty($_GET['id'])) {
    $book = new Book();
    $book_id = $_GET['id'];

    $result = $book->single_book($book_id);
    $reviews = $book->book_reviews($book_id);

    if ($result) {
        $template->book = $result;
    }
    $template->reviews = $reviews;
}



// $template = new Template('templates/frontpage.php');

echo $template;
