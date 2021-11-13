<?php require('core/ini.php'); ?>

<?php
$template = new Template('templates/adminLogin.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $data = array();
    $admins = new AdminStuff();
    $data['user_name'] = $_POST['user_name'];
    $data['password'] = hash("sha256", $_POST['password']);
    $passMatch = $admins->adminLogin($data);
    if ($passMatch == true) {
        //redirect("login.php", "Incorrect Login Information.Plese Provide the correct login info", "error");
        redirect("admin.php", "", "success");
    }
} else {
    echo $template;
}
