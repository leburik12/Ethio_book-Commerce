<?php require('core/ini.php'); ?>


<?php
$template = new Template('templates/checkout.php');
$template->no_more = 't';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit_checkout'])) {
        if (
            !empty($_POST['first_name']) && !empty($_POST['last_name'])
            && !empty($_POST['address']) && !empty($_POST['postal_code']) &&
            !empty($_POST['phone_number']) && !empty($_POST['city'])
        ) {
            $_SESSION['order']['first_name'] = $_POST['first_name'];
            $_SESSION['order']['last_name'] = $_POST['last_name'];
            $_SESSION['order']['address'] = $_POST['postal_code'];
            $_SESSION['order']['phone_number'] = $_POST['phone_number'];
            $_SESSION['order']['city'] = $_POST['city'];
            $_SESSION['order']['postal_code'] = $_POST['postal_code'];
            $_SESSION['order']['user_id'] = $_POST['user_id'];
            $_SESSION['order']['total_price'] = $_POST['checkout_total_price'];
            !empty($_POST['email']) ?
                $_SESSION['order']['email'] = $_POST['email'] :
                $_SESSION['order']['email'] = "";
            // !empty($_POST['email']) ? $data_checkout['email'] = $_POST['email'] : $data_checkout['email'] = "";
            redirect('asiv_pay.php', 'Please fill the payment information to finsih your payment', 'success');
        } else {
            redirect('checkout.php', 'Please enter the appropriate information', 'error');
        }
    } else if (isset($_POST['card_process'])) {
        $card_number = $_POST['card_number'];
        $cvv = $_POST['cvv'];
        $pd = $_POST['pd'];
        // Make a POST request 
        $url = "http://127.0.0.1:8000/pay/payment_integration/";
        // $data = [
        //     "card_number" => $card_number,
        //     "cvv" => $cvv,
        //     "total_price" => $_SESSION['total_price']
        // ];
        // $data = ["card_number" => $card_number, "cvv" => $cvv, "total_price" => $_SESSION['total_price']];
        $data = "card_number=$card_number,cvv=$cvv,total_price=$_SESSION[total_price],pd=$pd";
        $context = stream_context_create([
            'http' => [
                'method' => 'POST',
                'header' => [
                    // 'Accept: application/json',
                    // 'Content-Type: application/json;charset=utf-8;\r\n'
                    'Content-Type: text/plain'
                ],
                'content' => $data
            ]
        ]);
        $result = file_get_contents($url, false, $context);
        if ($result) {
            $result =  json_decode($result);
            $result = $result->result;


            $book = new Book();
            $datdata_checkout = array();
            $data_checkout['first_name'] = $_SESSION['order']['first_name'];
            $data_checkout['last_name'] = $_SESSION['order']['last_name'];
            $data_checkout['email'] = $_SESSION['order']['email'];
            $data_checkout['address'] = $_SESSION['order']['address'];
            $data_checkout['postal_code'] = $_SESSION['order']['postal_code'];
            $data_checkout['phone_number'] = $_SESSION['order']['phone_number'];
            $data_checkout['user_id'] = $_SESSION['order']['user_id'];
            $data_checkout['total_cash'] = $_SESSION['order']['total_price'];
            $data_checkout['city'] = $_SESSION['order']['city'];

            $template->total_price = $data_checkout['total_cash'];

            $_SESSION['order'] = array();                // save customer order

            $order_result = $book->customerOrderCreate($data_checkout, $_SESSION['cart']);
            // if ($order_result) {
            $template->carts = $_SESSION['cart'];
            $template->no_more = null;
            $_SESSION['cart'] = array();
            $_SESSION['total_qty'] = null;
            $_SESSION['total_price'] = '';
            // }
        }
    }
}

echo  $template;
