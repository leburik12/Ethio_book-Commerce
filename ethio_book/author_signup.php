<?php require('core/ini.php'); ?>

<?php

$template = new Template('templates/author_signup.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['author_signup_submit']) && ($_POST['p1'] == $_POST['p2'])) {
        $place = "author";
        $data = array();
        $book = new Book();
        //$data['user_name'] = $_POST['user_name'];
        $result = $book->checkUserName($_POST['user_name']);
        if ($result) {
            var_dump($result);
            if (!empty($_FILES['book_profile']['name'])) {
                $data['pp'] = $_FILES['book_profile']['name'];
                $result = $book->image_validator($place);
                if (!$result) {
                    redirect('author_signup.php', 'Invalid Image Type.Please Use another', 'error');
                }
            } else {
                $data['pp'] = 'no_avatar.jpg';
            }

            $data['name'] = $_POST['name'];
            $data['user_name'] = $_POST['user_name'];
            $data['email'] = $_POST['email'];
            $data['p1'] = hash("sha256", $_POST['p1']);

            !empty($_POST['phone_number']) ? $data['phone_number'] = $_POST['phone_number'] : $data['phone_number'] = '';
            !empty($_POST['inside']) ? $data['inside'] = $_POST['inside'] : $data['inside'] = '';

            $result = $book->registerAuthor($data);

            if (!$result) {
                redirect('login.php', '', '');
            }
        } else {
            redirect("author_signup.php", "UserName already taken Please another", 'error');
        }
    } else {
        redirect('author_signup.php', "Password don't match", 'error');
    }
}
echo $template;
