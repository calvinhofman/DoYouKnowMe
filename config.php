<?php
// Dit zijn de MYSQL inloggegevens.
// Zorg dat deze gegevens overeenkomen met de gegevens van de MYSQL server.
define('SERVER', 'localhost');
define('USERNAME', 'vincent');
define('PASSWORD', '#1Geheim');
define('NAME', '85113_back');

$mysqli = mysqli_connect(SERVER, USERNAME, PASSWORD, NAME);

if ($mysqli === false) die('ERROR: Could not connect. ' . mysqli_connect_error());

?>