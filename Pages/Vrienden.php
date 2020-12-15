<html>
<head>
    <!--    Favicon-->
    <link rel="icon" href="../Images/Favicon.jpg" sizes="16x16" type="image/jpg">

    <!--CSS link-->
    <link rel="stylesheet" href="../Styling/style.css">
    <!--Meta links-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--    Bootstrap 4.0-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Catchpa-->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!--    W3 css-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>vrienden</title>
</head>
<body>
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light" style="  background-color: #18072C;">
    <a class="navbar-brand" style="color: white" href="#">Ken je mij?</a>
    <button class="navbar-toggler" type="button" style="background-color: white" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link style='color:white'" href="feit_Fabels/eindopdracht.php">Feiten/Fabels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link style='color:white'" href="inlog.php">uitloggen</a>
            </li>
        </ul>
    </div>
</nav>
<!--Einde Navbar-->

<div class="container">
    <div class="row">
        <!--        Classes om het midden uit te pakken-->
        <div class="col-sm">
        </div>
        <!--        Classes om het midden uit te pakken-->
        <!--Begin class dat in het midden staat-->
        <div class="inlog-form   col-sm">
            <div class="col-sm form-col">


                <!--                Begin Form-->


                    <div class="form-group" style="color: white">

                        <!--                        Check php inlog-->
                        <?php
                        session_start();

                        require '../config.php';

                        $query = "SELECT * FROM profiles";

                        $resultaat = mysqli_query($mysqli, $query);
                        $username = 0;



                        $_SESSION['Username'] = $username;




                        if (!isset($_SESSION['Username'])) {
                            header("location:login.php");
                        }







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

                                    <td><button id="accept_<?php echo $rij['ID_Profile'] ;?>" onclick="accept(<?php echo $rij['ID_Profile'] ;?>)">Vriend toevoegen</button> </td>
                                </tr>

                                <?php
                            }
                            echo "</table>";
                            }
                            ?>


                <!--Einde formulier-->
            </div>
        </div>
    </div>
        <div class="col-sm">
        </div>
</div>
</body>
</html>




<script>
    function accept(id) {
        const objXMLHttpRequest = new XMLHttpRequest();
        objXMLHttpRequest.onreadystatechange = function() {
            if(objXMLHttpRequest.readyState === 4) {
                if(objXMLHttpRequest.status === 200) {
                    const statusSpan = document.getElementById(id);
                    if(statusSpan){
                        statusSpan.innerHTML = 'added';

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


</script>
