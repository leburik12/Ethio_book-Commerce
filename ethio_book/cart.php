<?php require('core/ini.php'); ?>

<?php

$template = new Template('templates/cart.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart']) || isset($_POST['add_buy_now'])) {
        $book_id = $_POST['book_id'];

        if (
            !empty($_POST['book_format_choice']) && ((isset($_POST['new_book_qty'])
                || isset($_POST['used_book_qty']) || isset($_POST['e_book_qty'])))
        ) {
            $data = array();
            $data['format'] = $_POST['book_format_choice'];
            $data['nbp'] = $_POST['nbp'];
            $data['obp'] = $_POST['obp'];
            $data['ebp'] = $_POST['ebp'];
            $data['book_image'] = $_POST['book_image'];
            $data['book_id'] = $_POST['book_id'];
            $data['book_title'] = $_POST['book_title'];


            if (!empty($_POST['coupon'])) {
                $data['coupon'] = $_POST['coupon'];
            } else {
                $data['coupon'] = "";
            }

            if (!empty($_POST['new_book_qty'])) {
                $data['new_book_qty'] = $_POST['new_book_qty'];
            } else {
                $data['new_book_qty'] = 0;
            }

            if (!empty($_POST['used_book_qty'])) {
                $data['used_book_qty'] = $_POST['used_book_qty'];
            } else {
                $data['used_book_qty'] = 0;
            }
            if (!empty($_POST['file_name'])) {
                $data['file_name'] = $_POST['file_name'];
            } else {
                $data['file_name'] = '';
            }

            if (!empty($_POST['e_book_qty'])) {
                $data['e_book_qty'] = $_POST['e_book_qty'];
            } else {
                $data['e_book_qty'] = 0;
            }

            $book_id = $_POST['book_id'];
            //$_SESSION = array();
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] =  array();
                $_SESSION['total_qty'] = $data['new_book_qty'] + $data['used_book_qty'] + $data['e_book_qty'];
                $_SESSION['total_price'] = ($data['obp'] * $data['used_book_qty']) + ($data['nbp'] * $data['new_book_qty']) + ($data['ebp'] * $data['e_book_qty']);

                $_SESSION['cart']["$book_id"]['file_name'] = $data['file_name'];
                $_SESSION['cart']["$book_id"]['book_image'] = $data['book_image'];
                $_SESSION['cart']["$book_id"]['book_title'] = $data['book_title'];
                $_SESSION['cart']["$book_id"]['obq'] = $data['used_book_qty'];
                $_SESSION['cart']["$book_id"]['nbq'] = $data['new_book_qty'];
                $_SESSION['cart']["$book_id"]['ebq'] = $data['e_book_qty'];
                $_SESSION['cart']["$book_id"]['obp'] = $data['obp'];
                $_SESSION['cart']["$book_id"]['nbp'] = $data['nbp'];
                $_SESSION['cart']["$book_id"]['ebp'] = $data['ebp'];
                $_SESSION['cart']["$book_id"]['total_qty'] = $data['new_book_qty'] + $data['used_book_qty'] + $data['e_book_qty'];
                $_SESSION['cart']["$book_id"]['total_price'] = ($data['obp'] * $data['used_book_qty']) + ($data['nbp'] * $data['new_book_qty']) + ($data['ebp'] * $data['e_book_qty']);
            } else {
                $_SESSION['total_qty'] += $data['new_book_qty'] + $data['used_book_qty'] + $data['e_book_qty'];
                $_SESSION['total_price'] = $_SESSION['total_price'] + ($data['obp'] * $data['used_book_qty']) + ($data['nbp'] * $data['new_book_qty']) + ($data['ebp'] * $data['e_book_qty']);
                if (isset($_SESSION['cart']["$book_id"])) {
                    $_SESSION['cart']["$book_id"]['total_price'] += ($data['obp'] * $data['used_book_qty']) + ($data['nbp'] * $data['new_book_qty']) + ($data['ebp'] * $data['e_book_qty']);
                    $_SESSION['cart']["$book_id"]['total_qty'] += $data['new_book_qty'] + $data['used_book_qty'] +  $data['e_book_qty'];
                } else {
                    $_SESSION['cart']["$book_id"]['total_qty'] = $data['new_book_qty'] + $data['used_book_qty'] + $data['e_book_qty'];
                    $_SESSION['cart']["$book_id"]['total_price'] = ($data['obp'] * $data['used_book_qty']) + ($data['nbp'] * $data['new_book_qty']) + ($data['ebp'] * $data['e_book_qty']);

                    $_SESSION['cart']["$book_id"]['file_name'] = $data['file_name'];
                    $_SESSION['cart']["$book_id"]['book_image'] = $data['book_image'];
                    $_SESSION['cart']["$book_id"]['book_title'] = $data['book_title'];
                    $_SESSION['cart']["$book_id"]['obq'] = $data['used_book_qty'];
                    $_SESSION['cart']["$book_id"]['nbq'] = $data['new_book_qty'];
                    $_SESSION['cart']["$book_id"]['ebq'] = $data['e_book_qty'];
                    $_SESSION['cart']["$book_id"]['obp'] = $data['obp'];
                    $_SESSION['cart']["$book_id"]['nbp'] = $data['nbp'];
                    $_SESSION['cart']["$book_id"]['ebp'] = $data['ebp'];
                }
            }
            $_SESSION['cart']["$book_id"]['file_name'] = $data['file_name'];
            $_SESSION['cart']["$book_id"]['id'] = $book_id;
            $_SESSION['cart']["$book_id"]['book_image'] = $data['book_image'];
            $_SESSION['cart']["$book_id"]['book_title'] = $data['book_title'];
            $_SESSION['cart']["$book_id"]['obq'] = $data['used_book_qty'];
            $_SESSION['cart']["$book_id"]['nbq'] = $data['new_book_qty'];
            $_SESSION['cart']["$book_id"]['ebq'] = $data['e_book_qty'];
            $_SESSION['cart']["$book_id"]['obp'] = $data['obp'];
            $_SESSION['cart']["$book_id"]['nbp'] = $data['nbp'];
            $_SESSION['cart']["$book_id"]['ebp'] = $data['ebp'];

            $template->book_id = $book_id;
        } else {

            redirect("mybook.php?id=$book_id", 'Fill the appropriate Book Information', 'error');
        }
    }
}


echo $template;
