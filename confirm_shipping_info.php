<?php

include('connection.php');

session_start();

//user authentication
if (!isset($_SESSION['user']) || !isset($_SESSION['admin'])) {
    echo "<script>alert('Please login to continue!')</script>";
    echo '<script>window.location="login.php"</script>';
}


//if session not empty
if (!empty($_SESSION["cart"])) {

    $total_price = 0;
    if (!empty($_SESSION['total_price']))
        $total_price = $_SESSION['total_price'];

    $username = $_SESSION['user'];
    $payment_status = 'pending';


    $insert_shipping_info = "INSERT INTO shipping_info (username,total_money,payment_status) VALUES ('$username','$total_price','$payment_status')";

    $last_id = 0;
    if ($connection->query($insert_shipping_info) === TRUE) {
        $last_id = $connection->insert_id;
        //echo $last_id;
    }

    foreach ($_SESSION["cart"] as $keys => $values) {
        $v_id = $last_id;
        $item_name = $values['item_name'];
        echo $item_name;
        $ordered_quantity = $values['item_quantity'];
        $unit_price = $values['product_price'];

        $voucher_insert = "INSERT INTO voucher_info (v_id,item_name,ordered_quantity,unit_price) VALUES ('$v_id','$item_name','$ordered_quantity','$unit_price')";

        $connection->query($voucher_insert);

        //decrease quantity of each item
        $temp_product_id = $values['product_id'];
        $temp_product_item_query = "SELECT quantity from products WHERE id='$temp_product_id'";
        $temp_product_item = $connection->query($temp_product_item_query)->fetch_assoc();

        $updated_quantity = $temp_product_item['quantity'] - $ordered_quantity;
        //echo $updated_quantity;

        $decrease_query = "update products SET quantity ='$updated_quantity' WHERE id='$temp_product_id'";
        $connection->query($decrease_query);
    }

    //removing session values
    unset($_SESSION["cart"]);
    unset($_SESSION["total_price"]);

    echo "<script>alert('Successfully order, please wait for our response')</script>";
    echo '<script>window.location="index.php"</script>';

} else {
    echo '<script>window.location="index.php"</script>';
}


