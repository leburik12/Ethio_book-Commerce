<?php include('core/ini.php'); ?>

<?php

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];
    $book = new Book();
    $result = $book->single_book($book_id);
}

if (isset($_POST['edit_book'])) {

    $book = new Book;
    $data = array();
    $data['book_id'] = $_POST['book_id'];
    $data['seller_id'] = $_POST['seller_id'];

    $place = 'book';
    if (!empty($_FILES['book_profile']['name'])) {
        $data['book_image'] = $_FILES['book_profile']['name'];
        $result = $book->image_validator($place, 'book_profile');

        if ($result) {
            $data['book_image'] = $_FILES['book_profile']['name'];
        } else {
            redirect("edit_book.php?id=$data[book_id]", "Please fill in the image field correctly", "error");
        }
    } else {
        $data['book_image'] = 'no_image.jpeg';
    }

    if (empty($_POST['book_catg'])) {
        $data['book_catg'] = $_POST['book_c'];
    } else {
        $data['book_catg'] = $_POST['book_catg'];
    }
    $data['coupon'] = $_POST['coupon'];
    !empty($_POST['discount']) ? $data['discount'] = $_POST['discount'] : $data['discount'] = 0;
    $data['book_title'] = $_POST['book_title'];
    $data['author'] = $_POST['author'];
    $data['book_page'] = $_POST['book_page'];
    $data['old_book_qty'] = $_POST['old_book_qty'];
    $data['old_book_price'] = $_POST['old_book_price'];
    $data['new_book_qty'] = $_POST['new_book_qty'];
    $data['new_book_price'] = $_POST['new_book_price'];
    $data['book_id'] = $_POST['id'];
    $data['des'] = $_POST['des'];

    if ($book->edit_book($data)) {
        redirect("edit_book.php?id=$data[book_id]", "Error on editing the book", "error");
    } else {
        redirect('dashboard.php', "Successfully edited", 'success');
    }




    // // save the book 
    // if ($book->book_register($data)) {
    //     redirect('dashboard.php', "Successfully Uploaded a Book to our Store", 'success');
    // }

}
$template = new Template('templates/edit_book.php');

$template->book = $result;
echo $template;
