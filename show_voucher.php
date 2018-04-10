<?php

include('connection.php');

if (!isset($_GET['id'])) {
    header('location:show_shipping_information.php');
    exit();
}
$id = $_GET['id'];
$voucher_query = "SELECT * FROM voucher_info where v_id = '$id'";
$result = $connection->query($voucher_query);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>


<table>
    <thead>
    <th>Voucher ID</th>
    <th>Product Name</th>
    <th>Ordered Quantity</th>
    <th>Unit Price</th>
    <th>Unit Total</th>
    </thead>
    <tbody>
    <?php while ($row = $result->fetch_assoc()) {


        echo "<tr><td>" . $row['v_id'] . "</td>";
        echo "<td>" . $row['item_name'] . "</td>";
        echo "<td>" . $row['ordered_quantity'] . "</td>";
        echo "<td>" . $row['unit_price'] . "</td>";
        echo "<td>" . $row['ordered_quantity'] * $row['unit_price'] . "</td>";
        echo "</tr>";

    }
    ?>
    </tbody>
</table>

</body>
</html>
