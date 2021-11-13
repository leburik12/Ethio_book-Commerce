<?php require('core/ini.php'); ?>

<?php
$template = new Template('templates/admin.php');


if ($_SESSION['is_admin'] == 't') {
    $admins = new AdminStuff();
    $data_1 = $admins->getRateSold();
    $data_1 = json_encode($data_1);
    $template->data_1 = $data_1;
    $template->allSeller = $admins->getAllSeller();
    echo $template;
} else {
    redirect("adminLogin.php", "", "success");
    // $template = new Template("templates/adminLogin.php");
    // echo $template;
}
