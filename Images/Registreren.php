<?php
require 'config.php';
?>

    <!DOCTYPE html>
    <html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styling/style.css">
    <title>Make a account</title>
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
    <h1>Registreren</h1>
    <form id="form" action="index.php" method="post">

        <input class="username" id="username" name="username" type="text" placeholder="              Username">
        <br>
        <input class="password" id="password" name="password" type="password" placeholder="              Password">
        <br>
        <input class="email" name="email" id="email" type="email" placeholder="                  email">
        <br>
        <input type="submit" name="submit" id="submit" class="button" value="Create account">
    </form>

</div>
<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];

    $query = "INSERT INTO profiles values (NULL, '$username', '$password', '$email')";

    if (empty($username)) {
        echo "<p>Vul eerst je username in</p>";
    } elseif (empty($password)) {
        echo "<p>Vul eerst je wachtwoord in</p>";
    } elseif (empty($email)) {
        echo "<p>Vul je email in</p>";
    } else {
        if (mysqli_query($mysqli, $query)) {
            echo "<p><b>$username</b> is toegevoegd.</p>";
            echo "<a href = 'config.php'>Test</a>";
        } else {
            echo "<p>Er is wat mis gegaan</p>";
            echo "<a href = 'config.php'>test1</a>";

        }
    }
}

?>
</body>

    </html><?php
