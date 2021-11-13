<?php include('core/ini.php'); ?>

<?php

if (isset($_POST['seller_login'])) {
    if (!empty($_POST['user_name']) && !empty($_POST['password'])) {
        $account = new Account;
        $data = array();
        $seller = true;

        $data['user_name'] = trim($_POST['user_name']);
        $data['password'] = hash("sha256", $_POST['password']);
        if ($account->login($data, $seller)) {
            redirect('index.php', '', 'success');
        } else {
            redirect('seller_login.php', 'Incorrect Login Information.Plese Provide the correct login info for seller account', 'error');
        }
    } else {
        redirect('seller_login.php', "Please Fill all the fields", "error");
    }
}
// Get template and assign Vars
$template = new Template('templates/seller_login.php');

echo $template;
