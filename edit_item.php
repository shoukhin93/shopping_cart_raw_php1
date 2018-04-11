<?php
include('connection.php');
if (!isset($_POST['id']))
    header('location:exindex.php');
$id = $_POST['id'];
$item_search_query = "SELECT * FROM products where id = '$id'";
$item = $connection->query($item_search_query)->fetch_assoc();

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql_edit = "UPDATE  products SET p_name = '$product_name', price = '$price', quantity = '$quantity' WHERE ID = '$id'";
    $connection->query($sql_edit);

    //echo $product_name;
}


?>

<!doctype html>
<html lang="en">
<head>
    <title>Document</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id; ?>" name="id">
    <input type="text" name="product_name"
           value="<?= (isset($product_name)) ? $product_name : $item['p_name']; ?>">
    <input type="text" name="price" value="<?= (isset($price)) ? $price : $item['price']; ?>">
    <input type="text" name="quantity" value="<?= (isset($quantity)) ? $quantity : $item['quantity']; ?>">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" name="submit" value="Update">
</form>
</body>
</html>
