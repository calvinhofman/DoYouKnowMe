<?php
session_start();

require '../config.php';

$query = "SELECT * FROM profiles";

$resultaat = mysqli_query($mysqli, $query);
    $username = 0;



$_SESSION['Gebruikersnaam'] = $username;

echo $username;


if (!isset($_SESSION['Gebruikersnaam'])) {
    header("location:login.php");
}

else{

    echo "<p>Welkom," . $_SESSION['Gebruikersnaam'] . "</p>";
    echo "<p>ID," . $_SESSION['ID_Profile'] . "</p>";

}

//
//var_dump($resultaat);
//var_dump($username);




if (mysqli_num_rows($resultaat) == 0){
    echo "<p>Er zijn geen resultaten gevonden! </p>";
}

else{ ?>

            <!--Begin tabel-->
            <!--Begin tabel-->

    <h1>Friendlist</h1>
    <table border='1'>

    <tr>
        <td>Vrienden</td>
        <td>Naam</td>
    </tr>

        <?php while ($rij = mysqli_fetch_array($resultaat)){?>

        <tr>
        <?php echo "<td>" . $rij['Vrienden'] . "</td>";?>
        <?php echo "<td>" . $rij['Gebruikersnaam'] . "</td>";?>
        <td><button onclick="accept()">accept</button> </td>
        <td><button onclick="decline()">decline</button> </td>
        </tr>


            <!--Begin script -->
            <!--Begin script -->

<script>
    function accept() {
    console.log('hallo')
    }

    function decline() {
    console.log('hoi')
    }

</script>


<?php
    }
    echo "</table>";
}
?>