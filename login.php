<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login or register</title>
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
                <a href="cart.html"><span class="icon-shopping-cart"></span> <?php echo count($_SESSION["cart"]); ?>
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
                <span class="btn btn-mini">[ <?php echo count($_SESSION["cart"]); ?> ] <span
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
            <h3> Login</h3>
            <hr class="soft"/>

            <div class="row">
                <div class="span4">
                    <div class="well">
                        <h5>CREATE YOUR ACCOUNT</h5><br/>
                        Fill all the fields to register.<br/><br/><br/>
                        <form action="login_or_register.php" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Username</label>
                                <div class="controls">
                                    <input type="text" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">First Name</label>
                                <div class="controls">
                                    <input type="text" name="first_name" placeholder="First Name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Last Name</label>
                                <div class="controls">
                                    <input type="text" name="last_name" placeholder="Last Name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Contact Number</label>
                                <div class="controls">
                                    <input type="text" name="contact_no" placeholder="Contact Number">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Full Address</label>
                                <div class="controls">
                                    <input type="text" name="full_address" placeholder="Full Address">
                                </div>
                            </div>
                            <div class="controls">
                                <button type="submit" name="register" class="btn block">Create Your Account</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="span1"> &nbsp;</div>
                <div class="span4">
                    <div class="well">
                        <h5>ALREADY REGISTERED ?</h5>
                        <form action="login_or_register.php" method="post">
                            <div class="control-group">
                                <label class="control-label" for="inputEmail">Username</label>
                                <div class="controls">
                                    <input type="text" name="username" placeholder="Username">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputPassword">Password</label>
                                <div class="controls">
                                    <input type="password" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <button type="submit" name="login" class="defaultBtn">Sign in</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

        <span>Copyright &copy; 2013<br> bootstrap ecommerce shopping template</span>
    </div>
</div>

</body>
</html>
