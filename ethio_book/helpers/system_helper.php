<?php
/*
 * Display Message
 */
function displayMessage()
{
    if (!empty($_SESSION['message'])) {

        // Assign Message Var
        $message = $_SESSION['message'];

        if (!empty($_SESSION['message_type'])) {
            // Assign Type Var
            $message_type = $_SESSION['message_type'];
            // create Output
            if ($message_type == 'error') {
                echo '<div class="alert alert-danger" id="alert_message">' . $message . '</div>';
            } else {
                echo '<div class="alert alert-success" id="alert_message">' . $message . '</div>';
            }
        }

        // Unset Message
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } else {
        echo '';
    }
}
/*
 * Redirect to page
 */
function redirect($page = False, $message = NUll, $message_type = NULL)
{
    if (is_string($page)) {
        $location = $page;
    } else {
        $location = $_SERVER['SCRIPT_NAME'];
    }
    // Check for message
    if ($message != NULL) {
        // set message
        $_SESSION['message'] = $message;
        $_SESSION['message_type'] = $message_type;
    }
    // Redirect
    header("Location:" . $location);
    exit();
}
