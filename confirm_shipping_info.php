<?php

include('connection.php');

session_start();

//if session not empty
//echo "ok";
if (!empty($_SESSION["cart"])) {

    $total_price = 0;
    if (!empty($_SESSION['total_price']))
        $total_price = $_SESSION['total_price'];

    $username = 'a';
    $payment_status = 'pending';


    $insert_shipping_info = "INSERT INTO shipping_info (username,total_money,payment_status) VALUES ('$username','$total_price','$payment_status')";

    if ($connection->query($insert_shipping_info) === TRUE) {
        $last_id = $connection->insert_id;
        echo $last_id;
    }

    foreach ($_SESSION["cart"] as $keys => $values) {
        $v_id = $last_id;
        $item_id = $values['product_id'];
        $ordered_quantity = $values['item_quantity'];
        $unit_price = $values['product_price'];

        $voucher_insert = "INSERT INTO voucher_info (v_id,item_id,ordered_quantity,unit_price) VALUES ('$v_id','$item_id','$ordered_quantity','$unit_price')";

        $connection->query($voucher_insert);
    }

    //removing session values
    unset($_SESSION["cart"]);
    unset($_SESSION["total_price"]);

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
