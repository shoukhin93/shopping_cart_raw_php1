<?php
session_start();
include('connection.php');

//admin authentication
if (!isset($_SESSION['user']) || !isset($_SESSION['admin']))
    header('location:login.php');

elseif ($_SESSION['admin'] == 0) {
    header('location:login.php');
}

if (!isset($_GET['id'])) {
    header('location:index.php');
    exit();
}

$id = $_GET['id'];
$delete_query = "delete from products where id = '$id'";

$connection->query($delete_query);
echo "<script>alert('Deleted item Successfully')</script>";
echo '<script>window.location="index.php"</script>';