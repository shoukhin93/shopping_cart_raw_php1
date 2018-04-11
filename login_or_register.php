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

        $query_user_information = "INSERT INTO user_information (username, password,first_name,last_name,contact_no,full_address,zipcode) VALUES ('$username','$password','$first_name','$last_name','$contact_no','$full_address','$zipcode') ";

        $connection->query($query_user_information);
        echo "<script>alert('Successfully registered!')</script>";
        echo '<script>window.location="index.php"</script>';
    } else {
        echo "<script>alert('Failed to register! Please fill the fields correctly!')</script>";
        echo '<script>window.location="login.php"</script>';
    }
} //for login
else if (isset($_POST['login'])) {
    //echo "ok";

    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        echo "<script>alert('Failed to login! Please fill the fields correctly!')</script>";
        echo '<script>window.location="login.php"</script>';
        //echo "alert";
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    //user is admin
    if ($username == 'admin' && $password == 'admin') {
        session_start();
        $_SESSION['user'] = 'admin';
        $_SESSION['admin'] = 1;
        echo "<script>alert('Welcome Admin!')</script>";
        echo '<script>window.location="admin_panel.php"</script>';
    }

    $login_query = "SELECT * FROM user_information WHERE username ='$username' AND password = '$password'";
    $user = $connection->query($login_query);


    if (mysqli_num_rows($user) == 1) {
        session_start();
        $name = $user->fetch_assoc();
        $_SESSION['user'] = $name['username'];
        $_SESSION['admin'] = 0;
        echo "<script>alert('Successfully logged in!')</script>";
        echo '<script>window.location="index.php"</script>';
    } else {
        echo "<script>alert('Invalid username or password!')</script>";
        echo '<script>window.location="login.php"</script>';
    }

} else {
    echo "<script>alert('Fill all fields correctly!!')</script>";
    echo '<script>window.location="login.php"</script>';
}


