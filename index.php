<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="icon" href="img/fa-icon.svg" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="asset/css/login.css">
    <title>Login</title>
</head>

<body>

    <?php

    if (!empty($_POST)) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "administrator" && $password == "Admin123") {
            header("location:pendapatanTahun2001.php");
        }
    }

    ?>

    <main>
        <div>
            <div class="img"></div>
        </div>
        <div>
            <div class="title">
                <h1>Welcome To</h1>
                <h2>OLAP Adventure Works</h2>
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" placeholder="Username" name="username" id="username">
                <input type="password" name="password" id="password" placeholder="Password">
                <button type="submit">Sign In</button>
            </form>
            <p>Copyright Kelompok Kita</p>
        </div>
    </main>

</body>

</html>