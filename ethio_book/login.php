<?php include('core/ini.php'); ?>

<?php

if (isset($_POST['login'])) {
    if (!empty($_POST['user_name']) && !empty($_POST['password'])) {
        $account = new Account;
        $data = array();
        $seller = false;
        $data['user_name'] = trim($_POST['user_name']);
        $data['password'] = hash("sha256", $_POST['password']);
        if ($account->login($data, $seller)) {
            redirect("index.php", "", "");
        } else {
            redirect("login.php", "Incorrect Login Information.Plese Provide the correct login info", "error");
        }
    } else {
        redirect('login.php', "Please Fill all the fields", 'error');
    }
}
// Get template and assign Vars
$template = new Template('templates/login.php');

echo $template;
