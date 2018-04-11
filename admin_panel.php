<?php
session_start();
include('connection.php');

if (!isset($_SESSION['user']) || !isset($_SESSION['admin']))
    header('location:login.php');

elseif ($_SESSION['admin'] == 0) {
    header('location:login.php');
}

$shipping_info_query = "SELECT * FROM shipping_info";
$result = $connection->query($shipping_info_query);


?>
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
                <div class="pull-left socialNw">
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-youtube"></span></a>
                    <a href="#"><span class="icon-tumblr"></span></a>
                </div>
                <a href="index.php"> <span class="icon-home"></span> Home</a>
                <a href="#"><span class="icon-user"></span> My Account</a>
                <a href="register.html"><span class="icon-edit"></span> Free Register </a>
                <a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
                <a href="cart.php"><span class="icon-shopping-cart"></span> <?php if (isset($_SESSION["cart"]))
                        echo count($_SESSION["cart"]); ?>
                    Item(s) - </a>
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
                    <form action="#" class="navbar-search pull-right">
                        <input type="text" placeholder="Search" class="search-query span2">
                    </form>
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span>
                                Login <b class="caret"></b></a>
                            <div class="dropdown-menu">
                                <form class="form-horizontal loginFrm">
                                    <div class="control-group">
                                        <input type="text" class="span2" id="inputEmail" placeholder="Email">
                                    </div>
                                    <div class="control-group">
                                        <input type="password" class="span2" id="inputPassword" placeholder="Password">
                                    </div>
                                    <div class="control-group">
                                        <label class="checkbox">
                                            <input type="checkbox"> Remember me
                                        </label>
                                        <button type="submit" class="shopBtn btn-block">Sign in</button>
                                    </div>
                                </form>
                            </div>
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
                <li class="active">Login</li>
            </ul>
            <h3> Shipping History</h3>
            <hr class="soft"/>

            <div class="row">
                <div class="span4"></div>
                <div class="span6">
                    <div class="well">
                        <h5>Add items</h5><br/>
                        Fill all the fields to add items<br/><br/><br/>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Product Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Price</label>
                                <div class="controls">
                                    <input type="text" name="price">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Quantity</label>
                                <div class="controls">
                                    <input type="text" name="quantity">
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Image</label>
                                <div class="controls">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                            </div>

                            <div class="controls">
                                <button type="submit" name="submit" class="btn block">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="span1"> &nbsp;</div>

            </div>

            <h3> Shipping information</h3>
            <hr class="soft"/>

            <div class="row">
                <div class="span12">

                    <table class="table table-bordered table-condensed">
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
                        <?php while ($row = $result->fetch_assoc()) {

                            $temp_user = $row['username'];
                            //getting user information
                            $user_query = "SELECT * FROM user_information where username = '$temp_user'";
                            $user = $connection->query($user_query)->fetch_assoc();

                            $id = $row['id'];
                            echo "<tr><td><a href='show_voucher_information.php?id=$id'>$id</a></td>";
                            echo "<td>" . $row['username'] . "</td>";
                            echo "<td>" . $user['full_address'] . "</td>";
                            echo "<td>" . $user['zipcode'] . "</td>";
                            echo "<td>" . $row['total_money'] . "</td>";
                            echo "<td>" . $row['payment_status'] . "</td>";
                            echo "<td>" . $row['order_time'] . "</td>";
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

<div class="copyright">
    <div class="container">

        <span>Copyright &copy; 2013<br> bootstrap e-commerce shopping template</span>
    </div>
</div>

</body>
</html>
