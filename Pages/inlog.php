<?php
require '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Styling/style.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">


    <!--    W3 css-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Log in</title>
</head>

<body>

<!---->
<!--    <div class="Nav">-->
<!--        <ul class="navBar-nav" id="ToggleNav">-->
<!--            <li class="navItem Active">-->
<!--                <a href="http://">Home</a>-->
<!--            </li>-->
<!--            <li class="navItem">-->
<!--                <a href="http://">Profile</a>-->
<!--            </li>-->
<!--            <li class="navItem">-->
<!--                <a href="http://">Friends</a>-->
<!--            </li>-->
            <!-- <li class="navItem">
                <a href="http://">log in</a>
            </li>
            <li class="navItem">
                <a href="http://">log out</a>
            </li> -->
<!--        </ul>-->
<!--    </div>-->

<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>



    <div class="card">
        <h1>In loggen</h1>
        <form id="form" action="inlog.php" method="post">

            <input class="username" id="username" name="username" type="text" placeholder="              Username">
            <br>
            <input class="password" id="password" name="password" type="password" placeholder="              Password">
            <br>
            <!-- <input class="email" name="email" id="email" type="email" placeholder="                  email"> -->
            <br>
            <input type="submit" name="submit" id="submit" class="button" value="Create account">
        </form>

    </div>
    <?php

    if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = md5($_POST['password']);
        // $email = $_POST['email'];

        $query = "SELECT * FROM profiles WHERE Username = '$username' AND password = '$password'";

        $sqli = mysqli_query($mysqli, $query);

        if(mysqli_num_rows($sqli) > 0) {

            $loggedin = mysqli_fetch_array($sqli);


            $_SESSION['Username'] = $username;
            header("Location:home.php");
        } else{
           
           echo "Wachtwoord of username kloppen niet";
        }
    }

    ?>
</body>

</html>