<?php include('core/ini.php'); ?>

<?php

if (isset($_POST['seller_sign_up'])) {
    if (
        !empty($_POST['first_name']) && !empty($_POST['last_name']) &&
        !empty($_POST['user_name']) && !empty($_POST['email']) &&
        !empty($_POST['phone_number']) && !empty($_POST['password']) && !empty($_POST['password2'])
    ) {

        if ($_POST['password'] == $_POST['password2']) {
            $account = new Account;
            if (!$account->isUsernameUnique($_POST['user_name'], 'seller')) {
                if (preg_match("/^\d+$/", $_POST['phone_number'])) {
                    $data = array();

                    $data['first_name'] = trim($_POST['first_name']);
                    $data['last_name'] = trim($_POST['last_name']);
                    $data['user_name'] = trim($_POST['user_name']);
                    $data['phone_number'] = trim($_POST['phone_number']);
                    $data['email'] = trim($_POST['email']);
                    $data['password'] = hash("sha256", $_POST['password']);

                    if ($account->create_seller($data)) {
                        redirect('login.php?s=t', 'You are now a seller in EthioBooks', 'success');
                    } else {
                        redirect('login.php?s=t', 'You are now a seller in EthioBooks', 'success');
                    }
                } else {
                    redirect('seller_form.php', "Invalid phone number.Please Try again.", 'error');
                }
            } else {
                redirect('seller_form.php', 'User name already taken.Please use another user name.', 'error');
            }
        } else {
            redirect('seller_form.php', "Passwords don't match.Please try again.", 'error');
        }
    }
}
// Get template and template vars
$template = new Template('templates/seller_form.php');


echo $template;
