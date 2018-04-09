<?php

include('connection.php');


if (!isset($_POST['product_name']) || !isset($_POST['price']) ||
    !isset($_POST['quantity'])
) {
    header('location:item_add.php');
}

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    //adding an unique id to distinguish between images
    $image_path = $target_dir . $_FILES["fileToUpload"]["name"] . uniqid();

    echo $image_path;

    //query to insert into product table
    $insert_into_products = "insert into products (p_name,image,price,quantity) VALUES ('$product_name','$image_path','$price','$quantity')";
    $connection->query($insert_into_products);

    //saving image
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        header("location: item_add.php");
        exit();
    } else {
        echo "Sorry, there was an error inserting items";
    }
}
?>