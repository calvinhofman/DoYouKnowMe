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


var_dump($resultaat);
//var_dump($username);




if (mysqli_num_rows($resultaat) == 0){
    echo "<p>Er zijn geen resultaten gevonden! </p>";
}

else{ ?>

    <h1>Friendlist</h1>
    <table border='1'>

        <tr>
            <td>ID</td>
            <td>Naam</td>
            <td>Status</td>
        </tr>

        <?php while ($rij = mysqli_fetch_array($resultaat)){?>

            <tr>
                <?php echo "<td>" . $rij['ID_Profile'] . "</td>";?>
                <?php echo "<td>" . $rij['Username'] . "</td>";?>
                <td>
                    <span id="<?php echo $rij['ID_Profile'] ;?>">


                    <?php
                    if($rij['Status'] === 'accepted'){
                        echo 'Accepted';
                    } else if($rij['Status'] === 'declined'){
                        echo 'Declined';
                    } else {
                        echo 'Pending';
                    }
                    ?>
                    </span>
                </td>

                <td><button id="accept_<?php echo $rij['ID_Profile'] ;?>" onclick="accept(<?php echo $rij['ID_Profile'] ;?>)">accept</button> </td>
                <td><button id="decline_<?php echo $rij['ID_Profile'] ;?>" onclick="decline(<?php echo $rij['ID_Profile'] ;?>)">decline</button> </td>
            </tr>

<?php
    }
    echo "</table>";
}
?>

        <script>
            function accept(id) {
                const objXMLHttpRequest = new XMLHttpRequest();
                objXMLHttpRequest.onreadystatechange = function() {
                    if(objXMLHttpRequest.readyState === 4) {
                        if(objXMLHttpRequest.status === 200) {
                            const statusSpan = document.getElementById(id);
                            if(statusSpan){
                                statusSpan.innerHTML = 'Accepted';
                                var remove = document.getElementById("decline_" + id);
                                remove.remove();

                                var remove1 = document.getElementById("accept_" + id);
                                remove1.remove();
                            }   

                        } else {
                            alert('Error Code: ' +  objXMLHttpRequest.status);
                            alert('Error Message: ' + objXMLHttpRequest.statusText);
                        }
                    }
                }
                objXMLHttpRequest.open('POST', 'accept.php');
                objXMLHttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                objXMLHttpRequest.send('id=' + id );

            }

            function decline(id) {
                const objXMLHttpRequest = new XMLHttpRequest();
                objXMLHttpRequest.onreadystatechange = function() {
                    if(objXMLHttpRequest.readyState === 4) {
                        if(objXMLHttpRequest.status === 200) {
                            const statusSpan = document.getElementById(id);
                            if(statusSpan){
                                statusSpan.innerHTML = 'Declined';
                                var remove = document.getElementById("decline_" + id);
                                remove.remove();

                                    var remove1 = document.getElementById("accept_" + id);
                                remove1.remove();


                            }
                        } else {
                            alert('Error Code: ' +  objXMLHttpRequest.status);
                            alert('Error Message: ' + objXMLHttpRequest.statusText);
                        }
                    }
                }
                objXMLHttpRequest.open('POST', 'decline.php');
                objXMLHttpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                objXMLHttpRequest.send('id=' + id );
            }

        </script>

