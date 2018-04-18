<?php
session_start();
include('connection.php');

//admin authentication
if (!isset($_SESSION['user']) || !isset($_SESSION['admin'])) {
    echo "<script>alert('Please login to continue!')</script>";
    echo '<script>window.location="login.php"</script>';
} else if ($_SESSION['admin'] == 0) {
    echo "<script>alert('Please login to continue')</script>";
    echo '<script>window.location="login.php"</script>';
}

if (!isset($_GET['id'])) {
    echo "<script>alert('Please Provide correct data')</script>";
    echo '<script>window.location="admin_panel.php"</script>';
}

$id = $_GET['id'];
$voucher_query = "SELECT * FROM voucher_info where v_id = '$id'";
$result = $connection->query($voucher_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="assets/css/style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--[if IE 7]>
    <link href="css/font-awesome-ie7.min.css" rel="stylesheet">
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
</head>
<body>
<!--
	Upper Header Section
-->
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="topNav">
        <div class="container">
            <div class="alignR">
                <!-- <div class="pull-left socialNw">
                     <a href="#"><span class="icon-twitter"></span></a>
                     <a href="#"><span class="icon-facebook"></span></a>
                     <a href="#"><span class="icon-youtube"></span></a>
                     <a href="#"><span class="icon-tumblr"></span></a>
                 </div>-->
                <a href="index.php"> <span class="icon-home"></span> Home</a>
                <a href="login.php"><span class="icon-edit"></span> Free Register </a>
                <a href="logout.php"><?php if (isset($_SESSION['user'])) echo "Logout"; ?></a>
                <a href="cart.php"><span class="icon-shopping-cart"></span> <?php if (isset($_SESSION["cart"]))
                        echo count($_SESSION["cart"]); ?> Item(s)</a>
            </div>
        </div>
    </div>
</div>

<!--
Lower Header Section
-->
<div class="container">
    <div id="gototop"></div>
    <header id="header">
        <div class="row">
            <div class="span4">
                <h1>
                    <a class="logo" href="index.php"><span>Twitter Bootstrap ecommerce template</span>
                        <img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
                    </a>
                </h1>
            </div>

            <div class="span8 alignR">
                <p><br> <strong> Support (24/7) : 0800 1234 678 </strong><br><br></p>
                <span class="btn btn-mini">[ <?php if (isset($_SESSION["cart"]))
                        echo count($_SESSION["cart"]); ?> ] <span
                            class="icon-shopping-cart"></span></span>
                <span class="btn btn-warning btn-mini">$</span>
            </div>
        </div>
    </header>

    <!--
    Navigation Bar Section
    -->
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="nav-collapse">
                    <ul class="nav">
                        <li class=""><a href="index.php">Home </a></li>
                    </ul>
                    <form action="search.php" method="post" class="navbar-search pull-right">
                        <input type="text" name="search_name" placeholder="Search" class="search-query span2">
                    </form>
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="login.php"> Login </a>

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--
    Body Section
    -->
    <div class="row">

        <div class="span12">
            <ul class="breadcrumb">
                <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                <li class="active">Voucher information</li>
            </ul>
            <h3> Voucher information</h3>
            <hr class="soft"/>

            <div class="row">
                <div class="span12">

                    <table class="table table-bordered table-condensed">
                        <thead>
                        <th>Product Name</th>
                        <th>Ordered Quantity</th>
                        <th>Unit Price</th>
                        <th>Unit Total</th>
                        </thead>
                        <tbody>
                        <?php while ($row = $result->fetch_assoc()) {


                            //echo "<tr><td>" . $row['v_id'] . "</td>";
                            echo "<tr><td>" . $row['item_name'] . "</td>";
                            echo "<td>" . $row['ordered_quantity'] . "</td>";
                            echo "<td>" . $row['unit_price'] . "</td>";
                            echo "<td>" . $row['ordered_quantity'] * $row['unit_price'] . "</td>";
                            echo "</tr>";

                        }
                        ?>
                        </tbody>
                    </table>

                </div>
                <div class="span1"> &nbsp;</div>

            </div>
            <div class="span12">


            </div>
        </div>
    </div>
    <!--
    Clients
    -->


    <!--
    Footer
    -->

</div><!-- /container -->



</body>
</html>
