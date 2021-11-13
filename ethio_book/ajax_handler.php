<?php require('core/ini.php'); ?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $book = new Book();
    $result;
    if (isset($_GET['bid']) && isset($_GET['rt'])) {
        if (!empty($_GET['bid']) && !empty($_GET['rt'])) {
            if ($_GET['rt'] > 5 || $_GET['rt'] <= 0) {
                echo "Rating greated than five";
            } else {
                $rt = $_GET['rt'];
                $book_id = $_GET['bid'];
                $result = $book->book_rate($rt, $book_id);
                echo $result;
            }
        }
    }

    if (isset($_GET['obp'])  && $_GET['obp'] > 0.0 && isset($_GET['bid']))  # change the old book price
    {
        $t = $_GET['t'];
        $obp = $_GET['obp'];
        $bid = $_GET['bid'];
        $result = $book->change_obp($bid, $obp, $t);

        if ($result) {
            echo $odp;
        }
    }

    // search bar
    if (isset($_GET['ctg']) && isset($_GET['q'])) {
        $query = $_GET['q'];
        $ctg;
        if ($_GET['ctg'] != "") {
            $ctg = $_GET['ctg'];
            $result = $book->search_bar($ctg, $query);
            echo json_encode($result);
        } else {
            $qu = $_GET['ctg'];
        }
    }
}
// if ($_SERVER['REQUEST_METHOD'] == "POST") {
//     // if (isset($_POST['all_sellers']) && !empty($_POST['all_sellers'])) {
//     $admins = new AdminStuff();
//     $allSeller = $admins->getAllSeller();

//     echo $allSeller;
// } 
$account = new Account();
if (($_SERVER['REQUEST_METHOD'] == "POST") && (!empty($_POST['title']))) {
    $title = $_POST['title'];
    $body =  $_POST['body'];
    $id = $_POST['id'];

    $result = $account->blogPost($title, $body, $id);
    if ($result) {
        echo 'true';
    }
}

if (($_SERVER['REQUEST_METHOD'] == "POST") && (!empty($_POST['yes']))) {
    if ($_POST['yes'] == 't') {
        $result = $account->Reacted('y', $_POST['id_no']);
        echo $result;
    }
    echo 'tttttt';
}
if (($_SERVER['REQUEST_METHOD'] == "POST") && (!empty($_POST['no']))) {
    if ($_POST['no'] == 't') {
        $result = $account->Reacted('n', $_POST['id_no']);
        echo $result;
    }
}
if (($_SERVER['REQUEST_METHOD'] == "POST") && (!empty($_POST['message']))) {
    $book = new Book();
    $data = array();
    $data['user_name'] = $_POST['user_name'];
    $data['message'] = $_POST['message'];
    $data['book_id'] = $_POST['book_id'];
    $data['user_id'] = $_POST['user_id'];
    $result = $book->saveComment($data);
    echo $result;
}
