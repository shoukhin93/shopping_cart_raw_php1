<?php

session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My Cart</title>
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

                <a href="index.php"> <span class="icon-home"></span> Home</a>
                <a href="#"><span class="icon-user"></span> My Account</a>
                <a href="register.html"><span class="icon-edit"></span> Free Register </a>
                <a href="contact.html"><span class="icon-envelope"></span> Contact us</a>
                <a class="active" href="cart.php"><span
                            class="icon-shopping-cart"></span>
                    <?php if (isset($_SESSION["cart"]))
                        echo count($_SESSION["cart"]); ?> Item(s) </a>
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
                    <a class="logo" href="index.php"><span>CART</span>
                        <img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
                    </a>
                </h1>
            </div>

            <div class="span8 alignR">
                <p><br> <strong> Support (24/7) : 0800 1234 678 </strong><br><br></p>
                <span class="btn btn-mini">[<?php if (isset($_SESSION["cart"]))
                        echo count($_SESSION["cart"]); ?>] <span
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
                <li class="active">Check Out</li>
            </ul>
            <div class="well well-small">
                <h1>Check Out
                    <small class="pull-right"> <?php if (isset($_SESSION["cart"]))
                            echo count($_SESSION["cart"]); ?> Item(s) in the cart
                    </small>
                </h1>
                <hr class="soften"/>

                <table class="table table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Avail.</th>
                        <th>Unit price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                    </thead>

                    <?php if (!empty($_SESSION["cart"]))
                    {

                    $total = 0;
                    foreach ($_SESSION["cart"] as $keys => $values) {
                    ?>
                    <tbody>
                    <tr>
                        <td><img width="100" src="<?php echo $values["product_image"]; ?>" alt=""></td>
                        <td><?php echo $values["item_name"]; ?></td>
                        <td><span class="shopBtn"><span class="icon-ok"></span></span></td>
                        <td><?php echo $values["product_price"]; ?></td>
                        <td><?php echo $values["item_quantity"] ?></td>
                        <td>$<?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
                        <td><a href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span
                                        class="text-danger">X</span></a></td>
                    </tr>
                    <?php
                    $total = $total + ($values["item_quantity"] * $values["product_price"]);
                    }
                    ?>

                    <tr>
                        <td colspan="5" class="alignR"><strong>Total :</strong></td>
                        <td colspan="2"> <?php echo number_format($total, 2); ?></td>

                    </tr>

                    <?php
                    }
                    ?>
                    </tbody>
                </table>
                <br/>
                <a href="index.php" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue
                    Shopping </a>

                <?php
                if (isset($_SESSION['user'])) {
                    ?>
                    <a href="confirm_shipping_info.php" class="shopBtn btn-large pull-right">Next <span
                                class="icon-arrow-right"></span></a>
                    <?php
                } elseif (isset($_SESSION["cart"])) {
                    ?>

                    <a href="login.php" class="shopBtn btn-large pull-right">Next <span
                                class="icon-arrow-right"></span></a>
                    <?php
                }
                ?>

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

        <span>Copyright &copy; 2018<br> e-commerce shopping Cart</span>
    </div>
</div>
<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.easing-1.3.min.js"></script>
<script src="assets/js/jquery.scrollTo-1.4.3.1-min.js"></script>
<script src="assets/js/shop.js"></script>
</body>
</html>
