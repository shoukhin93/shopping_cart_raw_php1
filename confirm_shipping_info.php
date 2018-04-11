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
        $item_id = $values['product_name'];
        $ordered_quantity = $values['item_quantity'];
        $unit_price = $values['product_price'];

        $voucher_insert = "INSERT INTO voucher_info (v_id,item_name,ordered_quantity,unit_price) VALUES ('$v_id','$item_id','$ordered_quantity','$unit_price')";

        $connection->query($voucher_insert);
    }

    //removing session values
    unset($_SESSION["cart"]);
    unset($_SESSION["total_price"]);

    echo "<script>alert('Successfully order, please wait for our response')</script>";
    echo '<script>window.location="index.php"</script>';

} else {
    echo '<script>window.location="index.php"</script>';
}


