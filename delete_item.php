<?php
include('connection.php');

if (!isset($_GET['id'])) {
    header('location:exindex.php');
    exit();
}

$id = $_GET['id'];
$delete_query = "delete from products where id = '$id'";

$connection->query($delete_query);
echo "<script>alert('Deleted item Successfully')</script>";
echo '<script>window.location="index.php"</script>';