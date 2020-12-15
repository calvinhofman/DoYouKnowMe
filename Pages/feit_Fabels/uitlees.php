<?php
require 'config.php';
session_start();
$username = $_POST['username'];

$_SESSION['username'] = $username;

//Maak de query
$query = "SELECT * FROM fabels_feiten";
//Voer de query uit
$result = mysqli_query($mysqli, $query);

//Maak een lege array
$leden = [];

//lees alle rijen uit
while ($row=mysqli_fetch_array($result))
{
    $leden[] = $row;
}
//omzetten naar JSON array
$JSONarray = json_encode($leden);
//JSON array op het scherm tonen
echo $JSONarray;

?>