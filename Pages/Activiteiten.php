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

//maak loop voor activiteiten
    while ($row = mysqli_fetch_array($result)){
        
        $fabel = mysqli_query($mysqli, "SELECT stem_fabel FROM fabelsenfeiten");
        
        //laat info zien in een div
        echo "<div>";
            echo "<div class='fabel_feit'>";
            echo $row['vraag'] . "<br>";
            echo $row['datum'] . "<br>";
            echo $row['stem_feit'] . "<br>";
            echo $row['stem_fabel'] . "<br>";
            echo "</div>";
            

            
            //add feit
            function feit($ID_vraag) {
                $feit = mysqli_query($mysqli, "SELECT stem_feit FROM fabelsenfeiten WHERE ID_vraag = " . $ID_vraag);
                $feit ++;
                $query = "UPDATE `fabelsenfeiten` SET `stem_feit` = ' . $feit . ' WHERE `fabelsenfeiten`.`ID_vraag` = ". $ID_vraag;
                mysqli_query($mysqli, $query);
                echo "U denkt dat dit een feit is";
                var_dump($feit); 
            } 
            //add fabel
            function fabel() { 
                // mysqli_query($mysqli, "SELECT * FROM fabelsenfeiten");
                echo "U denkt dat dit een fabel is"; 
            } 
            if(array_key_exists('feit', $_POST)) { 
                feit($row['ID_vraag']); 
            } 
            else if(array_key_exists('fabel', $_POST)) { 
                fabel(); 
            } 
            

            //knoppen voor fiet of fabel
            echo   "<form method='post'>
                        <input type='submit' name='feit' class='button' value='feit'/>

                        <input type='submit' name='fabel' class='button' value='fabel'/>
                    </form>";
            
        echo "</div>";
    }

?>
</body>
</html>