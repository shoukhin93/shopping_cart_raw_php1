<?php
include('connection.php');

if (!isset($_GET['id'])) {
    header('location:index.php');
    exit();
}

$id = $_GET['id'];
$delete_query = "delete from products where id = '$id'";

$connection->query($delete_query);
header('location:index.php');
exit();