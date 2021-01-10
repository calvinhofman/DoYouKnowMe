 <?php
require '../config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body background="./Images/background.jpg">
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
    </div>
<div>
<?php
$result = mysqli_query($mysqli, "SELECT * FROM fabelsenfeiten");

$fabel = mysqli_query($mysqli, "SELECT stem_fabel FROM fabelsenfeiten");
echo "<tabel>";
//maak loop voor activiteiten
    while ($row = mysqli_fetch_array($result)){
        
        
        
        //laat info uit de database zien in een div
        
            echo "<tr>";
            echo "<td>" . $row['vraag'] . "</td>";
            echo "<td>" . $row['datum'] . "</td>";
            echo "<td>" . $row['stem_feit'] . "</td>";
            echo "<td>" . $row['stem_fabel'] . "</td>";

            
            
            echo "</tr>";

            //knoppen voor fiet of fabel
            echo   "<form method='post'>
                        <input type='submit' name='feit' class='button' value='feit'/>

                        <input type='submit' name='fabel' class='button' value='fabel'/>
                    </form>";
            
        echo "</div>";
    }
echo "</tabel>";

?>
</body>
</html>