<?php require('core/ini.php'); ?>

<?php
$template = new Template('templates/AdminControl.php');


if ($_SESSION['is_admin'] == 't') {

    echo $template;
} else {
    redirect("adminLogin.php", "", "success");
}
