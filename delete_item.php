<?php
include('connection.php');

if (!isset($_GET['id'])) {
    header('location:exindex.php');
    exit();
}

$id = $_GET['id'];
$delete_query = "delete from products where id = '$id'";

$connection->query($delete_query);
header('location:exindex.php');
exit();