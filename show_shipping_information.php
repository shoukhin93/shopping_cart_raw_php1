<?php
include('connection.php');
$shipping_info_query = "SELECT * FROM shipping_info";
$result = $connection->query($shipping_info_query);



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <table>
        <thead>
        <th>Voucher No</th>
        <th>Username</th>
        <th>Shipping Address</th>
        <th>Zipcode</th>
        <th>Total price</th>
        <th>Payment Status</th>
        <th>DateTime</th>
        </thead>
        <tbody>
        <?php while($row=$result->fetch_assoc()){

            //getting user information
            $user_query = "SELECT * FROM user_information where username = 'aaa'";
            $user = $connection->query($user_query)->fetch_assoc();

            //echo $user;

            echo "<tr><td>" . $row['id']."</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $user['full_address']."</td>";
            echo "<td>" . $user['zipcode']."</td>";
            echo "<td>" . $row['total_money']."</td>";
            echo "<td>" . $row['payment_status']."</td>";
            echo "<td>" . $row['order_time']."</td>";
            echo "</tr>";

}
?>
        </tbody>
    </table>

</head>
<body>

</body>
</html>
