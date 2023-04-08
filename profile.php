<?php
require_once("Classes/Session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #white;
            font-family: 'Roboto', sans-serif;
        }

        h1 {
            font-size: 2.5rem;
            text-align: center;
            margin-top: 3rem;
        }

        p {
            font-size: 1.5rem;
            text-align: center;
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <h1>You Have Successfully Logged In..!</h1>
    <p>Hello!<b style="color:red;"> <?php Session::init(); echo $_SESSION['name']; ?> </b></p>
</body>
</html>
