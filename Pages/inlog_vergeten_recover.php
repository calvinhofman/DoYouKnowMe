<?php
require '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Styling/style.css">
    <title>Log in</title>
</head>

<body>


    <div class="Nav">
        <ul class="navBar-nav" id="ToggleNav">
            <li class="navItem Active">
                <a href="http://">Home</a>
            </li>
            <li class="navItem">
                <a href="http://">Profile</a>
            </li>
            <li class="navItem">
                <a href="http://">Friends</a>
            </li>
            <!-- <li class="navItem">
                <a href="http://">log in</a>
            </li>
            <li class="navItem">
                <a href="http://">log out</a>
            </li> -->
        </ul>
    </div>


    <div class="card">
        <h1>In loggen</h1>
        <form id="form" action="inlog_vergeten_recover.php" method="post">

            <!-- <input class="username" id="username" name="username" type="text" placeholder="              Username">
            <br> -->
            <input class="password" id="password" name="password" type="password" placeholder="              Password">
            <br>
            <input class="email" name="email" id="email" type="email" placeholder="                  email">
            <br>
            <input type="submit" name="submit" id="submit" class="button" value="Recover account">
        </form>

    </div>
    <?php

    if (isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);


        $query = "UPDATE Password SET Password= '$password' WHERE email = '$email'";

        $sqli = mysqli_query($mysqli, $query);

        if(mysqli_num_rows($sqli) > 0) {

            $loggedin = mysqli_fetch_array($sqli);

            $_SESSION['email'] = $email;
            $_SESSION['Username'] = $username;
            header("Location:home.php");
        } else{
           var_dump($query);
           var_dump($sqli);
           echo "Fout in het systeem.";
        }
    }

    ?>
</body>

</html>