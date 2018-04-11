<?php

include('connection.php');

if (isset($_POST['register'])) {

    if (isset($_POST['register']) && isset($_POST['username']) && isset($_POST['password']) &&
        isset($_POST['first_name']) && isset($_POST['last_name']) &&
        isset($_POST['contact_no']) && isset($_POST['full_address']) && isset($_POST['zipcode'])
    ) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $contact_no = $_POST['contact_no'];
        $full_address = $_POST['full_address'];
        $zipcode = $_POST['zipcode'];

        $query_user_information = "INSERT INTO user_information (username, password,first_name,
last_name,contact_no,full_address,zipcode) VALUES ('$username','$password','$first_name',
'$last_name','$contact_no','$full_address','$zipcode') ";

        $connection->query($query_user_information);
        header('location:index.php');
        exit();
    }
}

//for login
if (isset($_POST['login'])) {
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        header('location:login_or_register.php');
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    //user is admin
    if ($username == 'admin' && $password == 'admin') {
        session_start();
        $_SESSION['admin'] = 1;
        header('location:item_add.php');
        exit();
    }

    $login_query = "SELECT * FROM user_information WHERE username ='$username' AND password = '$password'";
    $user = $connection->query($login_query);

    //echo $username . " " . $password;

    if (mysqli_num_rows($user) == 1) {
        session_start();
        $_SESSION['user'] = $user;
        $_SESSION['admin'] = 0;
    } else {
        echo "Invalid username or password";
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <title>Login or register</title>
</head>
<body>

<form method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="text" name="first_name" placeholder="First Name">
    <input type="text" name="last_name" placeholder="Last Name">
    <input type="text" name="contact_no" placeholder="Contact Number">
    <input type="text" name="full_address" placeholder="Full Address">
    <input type="text" name="zipcode" placeholder="Zipcode">

    <input type="submit" name="register" value="Add">

</form>

<form method="post">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">

    <input type="submit" name="login" value="Add">

</form>

</body>
</html>
