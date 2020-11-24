<?php
require 'config.php';

$query = "SELECT * FROM friendlist";

$resultaat = mysqli_query($mysqli, $query);


if (mysqli_num_rows($resultaat) == 0){
    echo "<p>Er zijn geen resultaten gevonden! </p>";
}

else{ ?>

            <!--Begin tabel-->
            <!--Begin tabel-->

    <h1>Friendlist</h1>
    <table border='1'>

    <tr>
        <td>Friend id </td>
        <td>Naam</td>
    </tr>

        <?php while ($rij = mysqli_fetch_array($resultaat)){?>

        <tr>
        <?php echo "<td>" . $rij['Friend_ID'] . "</td>";?>
        <?php echo "<td>" . $rij['Naam'] . "</td>";?>
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