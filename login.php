<?php
require_once('Classes/Database.php');

if (isset($_POST['login'])) {
    $db = new Database("localhost", "root", "", "webdevlab");

    $con = $db->getConnection();
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id,password_hash FROM profile WHERE email='$email'";

    $result = mysqli_query($con, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password_hash'];
        if (password_verify($password, $hashed_password)) {
            header('location: profile.php');
            exit();
        } else {
            echo "<script>alert('Invalid password.')</script>";
        }
    } else {
        echo "<script>alert('Please register first.')</script>";
    }
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="container">
        <div class='inner-container'>
            <h1>Login Form</h3>
                <p>Enter your details to Login </p>
        </div>
        <form action="login.php" method="post">
            <!-- <input type="text" name="name" id="name" placeholder="Enter your name"> -->
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="password" name="password" id="password" placeholder="Enter your password">

            <button class="btn" name="login">Login</button>
        </form>
        <div class="container">Not Registered? <a href="registration.php" id="nregister">Register</a></div>

    </div>
</body>

</html>