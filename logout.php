<?php
session_start();

if (session_destroy()) {
    echo "<script>alert('Logged Out!')</script>";
    echo '<script>window.location="index.php"</script>';
} else
    echo "<script>alert('Something went wrong!')</script>";
echo '<script>window.location="index.php"</script>';

session_write_close();