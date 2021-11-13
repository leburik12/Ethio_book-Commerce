<?php include('core/ini.php'); ?>

<?php

if (isset($_POST['sign_up'])) {
    // Get Vars
    if (
        !empty($_POST['user_name']) && !empty($_POST['email']) && !empty($_POST['phone_number'])
        && !empty($_POST['password']) && !empty($_POST['password2'])
    ) {
        $account  = new Account();
        if (!$account->isUsernameUnique($_POST['user_name'], 'user')) {
            if ($_POST['password'] == $_POST['password2']) {
                // Create new Account Object
                if (preg_match("/^\d+$/", $_POST['phone_number'])) {
                    $data = array();
                    $data['user_name'] = trim($_POST['user_name']);
                    $data['email'] = trim($_POST['email']);
                    $data['phone_number'] = trim($_POST['phone_number']);
                    $data['password'] = hash("sha256", $_POST['password']);

                    if (!$account->register($data)) {
                        redirect(
                            'login.php',
                            'Successfully Registered to EthioBooks',
                            'success'
                        );
                    } else {
                        redirect('seller_form.php', 'Please Try again', 'Error');
                    }
                } else {
                    redirect('signup.php', 'Invalid Phone number.Please Try again.', 'error');
                }
            } else {
                redirect('signup.php', "Passwords Don't Match.Please Try Again.", 'error');
            }
        } else {
            redirect('signup.php', 'User name ' . $_POST['user_name'] . ' is already Taken. Please Try another user name', 'error');
        }
    } else {
        redirect('signup.php', "Please Enter all the fields.", 'error');
    }
}

// Get template and assign vars
$template = new Template('templates/signup.php');

echo $template;
?>