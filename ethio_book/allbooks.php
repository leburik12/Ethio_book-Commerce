<?php require('core/ini.php'); ?>

<?php
$book = new Book();
$template = new Template('templates/allbooks.php');
if (isset($_GET['ct']))  // filter using category
{
    if (!empty($_GET['ct'])) {
        $category = $_GET['ct'];
        $result = $book->filter_by_category($category);

        (!empty($result)) ? $template->ctg_book = $result : $template->ctg_book = "empty";
    }
}

if (isset($_GET['con']))  // filter using condition
{
    if (!empty($_GET['con'])) {
        $con = $_GET['con'];
        $result = $book->filter_by_condition($con);
        (!empty($result)) ? $template->ctg_book = $result : $template->ctg_book = "empty";
    }
}

echo $template;
