<?php
require_once('Classes/Database.php');
require_once('Classes/Profile.php');

$insert = false;

if (isset($_POST['register'])) {

    $db = new Database("localhost", "root", "", "webdevlab");
    $con = $db->getConnection();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $employee = new Profile($name, $email, $password, $confirm_password);

    if (!$employee->validatePassword()) {
        echo "<p class='error'>Error: Passwords do not match.</p>";
    } else {
        if ($employee->saveToDatabase($con)) {
            $insert = true;
        }
    }

    $db->closeConnection();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="form.css">
</head>

<body>
    <div class="container">
        <div class="inner-container">
            <h1>Registration Form</h1>
            <p>Enter your details to Register</p>
            <?php
            if ($insert == true) {
                echo "<p class='submitMsg'>Thanks for Registering</p>";
            }
            ?>
        </div>
        <form action="registration.php" method="post">
            <!-- <input type="text" name="id" id="id" placeholder="Enter your ID"> -->
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="email" name="email" id="email" placeholder="Enter your email"><br>
            <input type="password" name="password" id="password" placeholder="Enter your password"><br>
            <input type="password" name="confirm_password" id="confirm_password"
                placeholder="Confirm your password"><br>
            <button class="btn" name='register'>Submit</button>
        </form>
        <br>
        <div class="container">Already Registered? <a href="login.php" id="alogin">Login</a></div>
    </div>
</body>

</html>