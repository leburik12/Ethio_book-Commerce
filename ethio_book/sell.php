<?php include('core/ini.php'); ?>


<?php

if (isset($_POST['sell'])) {
    // if (
    //     !empty($_POST['book_title']) && !empty($_POST['book_catg']) && !empty($_POST['book_author']) && !empty($_POST['user_id']) &&
    //     (!empty($_POST['old_book_qty']) || !empty($_POST['new_book_qty'])) &&
    //     (!empty($_POST['old_book_price']) || !empty($_POST['new_book_price']))
    // ) {
    $book = new Book;
    $data = array();
    $fl = '';
    $place = 'book';
    if (!empty($_FILES['book_profile']['name'])) {
        $fl = $_FILES['book_profile']['name'];
        $data['book_image'] = $_FILES['book_profile']['name'];
        $result = $book->image_validator($place, 'book_profile');
        if (!$result) {
            redirect('sell.php', 'Invalid Image Type.Please Use another', 'error');
        }
    } else {
        $data['book_image'] = 'no_image.jpeg';
    }

    if (!empty($_FILES['book_file']['name'])) {   // if the book submitted is e-book
        $data['book_file_name'] = $_FILES['book_file']['name'];
        $result =  $book->book_file_validator();

        if (!$result) {
            redirect('sell.php', 'Invalid File Type.Please try again', 'error');
        }
    } else {
        $data['book_file_name'] = "";
    }

    $data['seller_id'] = $_POST['seller_id'];

    $data['book_title'] = $_POST['book_title'];
    $data['book_catg'] = $_POST['book_catg'];
    $data['book_author'] = $_POST['book_author'];
    $data['book_page'] = $_POST['book_page'];
    $data['language'] = $_POST['language'];
    $data['format'] = $_POST['format'];

    // setting old book qty
    (!empty($_POST['old_book_qty'])) ? $data['old_book_qty'] = $_POST['old_book_qty'] : $data['old_book_qty'] = 0;
    (!empty($_POST['premium'])) ? $data['premium'] = $_POST['premium'] : $data['premium'] = 0;
    // setting new book qty
    (!empty($_POST['new_book_qty'])) ?  $data['new_book_qty'] = $_POST['new_book_qty'] : $data['new_book_qty'] = 0;
    // setting new book price
    (!empty($_POST['new_book_price'])) ? $data['new_book_price'] = $_POST['new_book_price'] : $data['new_book_price'] = 0;
    // setting old book price
    (!empty($_POST['old_book_price'])) ? $data['old_book_price'] = $_POST['old_book_price'] :  $data['old_book_price'] = 0;
    (!empty($_POST['e_book_price'])) ? $data['e_book_price'] = $_POST['e_book_price'] :  $data['e_book_price'] = 0;
    (!empty($_POST['ebook_qty'])) ? $data['e_book_qty'] = $_POST['ebook_qty'] :  $data['e_book_qty'] = 0;
    // setting book description
    (!empty($_POST['book_des'])) ? $data['book_des'] = $_POST['book_des'] :  $data['book_des'] = '';
    !empty($_POST['coupon']) ? $data['coupon'] = $_POST['coupon'] : $data['coupon'] = '';
    (isset($_POST['bs'])) ? $data['bs'] = 't' : $data['bs'] = '';
    // save the book 
    if (!$book->book_register($data)) {
        // save image if it exists
        // if (!empty($fl)) {
        //     $book_id = $book->getlastInsertId();
        //     if ($book->book_image_register($fl, $book_id, $data['seller_id'])) {
        //         redirect('login.php', 'Successfully Uploaded a Book to our Store', 'success');
        //     }
        // }

        redirect('dashboard.php', "", 'success');
    }
}
// }
$template = new Template('templates/sell.php');

echo $template;
