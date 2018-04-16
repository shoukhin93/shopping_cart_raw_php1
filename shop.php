<?php
include('connection.php');
session_start();


if (isset($_POST["add"])) {
    $id = $_GET['id'];
    $item_query = "SELECT * FROM products where id = '$id'";
    $item = $connection->query($item_query)->fetch_assoc();

    if (isset($_SESSION["cart"])) {

        if($_POST["quantity"] < 0)
        {
            echo "<script>alert('Quantity can not be negative')</script>";
            echo '<script>window.location="index.php"</script>';
            exit();
        }

        $item_array_id = array_column($_SESSION["cart"], "product_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                'product_id' => $_GET["id"],
                'product_image' => $_POST["hidden_image_path"],
                'item_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );

            if ($item_array['item_quantity'] > $item['quantity']) {
                $product_name = $item_array['item_name'];
                echo "<script>alert('not enough product in our store')</script>";
                echo '<script>window.location="index.php"</script>';
            } else {
                $_SESSION["cart"][$count] = $item_array;
                echo "<script>alert('Product added to cart')</script>";
                echo '<script>window.location="index.php"</script>';
            }
        } else {
            echo '<script>alert("Products already added to cart")</script>';
            echo '<script>window.location="index.php"</script>';

        }
    } else {
        $item_array = array(
            'product_id' => $_GET["id"],
            'product_image' => $_POST["hidden_image_path"],
            'item_name' => $_POST["hidden_name"],
            'product_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["cart"][0] = $item_array;

        echo '<script>alert("Product added to cart")</script>';
        echo '<script>window.location="cart.php"</script>';
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $values) {
            if ($values["product_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Product has been removed")</script>';
                echo '<script>window.location="cart.php"</script>';
            }
        }
    }
}
?>