<?php include('core/ini.php'); ?>
<?php header("Access-Control-Allow-Origin: *"); ?>


<?php

$book_id = $_GET['id'];
$book = new Book();

if (!empty($GET['d'])) {
    return $book->delete_book_image($book_id) ? true : false;
}
if (!empty($book_id)) {
    return $book->delete_book($book_id) ?  true :  false;
}
