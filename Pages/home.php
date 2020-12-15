<?php
require '../config.php';

?>
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
    <a class="navbar-brand" style="color: white" href="../home.php">Ken je mij?</a>
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
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                         <?php  ?>
                    </div>
                    <div class="profile-usertitle-job">
                        Developer
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- SIDEBAR MENU -->
                <div class="profile-usermenu">
                    <ul class="nav">
                        <li class="active"><br/>
                            <a href="#">
                                <i class="glyphicon glyphicon-home"></i>
                                Overview </a>
                        </li>
                        <li><br/>
                            <a href="#">
                                <i class="glyphicon glyphicon-user"></i>
                                Account Settings </a>
                        </li>
                        <li><br/>
                            <a href="#" target="_blank">
                                <i class="glyphicon glyphicon-ok"></i>
                                Tasks </a>
                        </li>
                        <li><br/>
                            <a href="#">
                                <i class="glyphicon glyphicon-flag"></i>
                                Help </a>
                        </li>
                    </ul>
                </div>
                <!-- END MENU -->
            </div>
        </div>
        <!--        Classes om het midden uit te pakken-->
        <!--Begin class dat in het midden staat-->
        <div class="Feiten-Fabels  col-sm">
            <button type="button" id="toevoegmodal" class="btn btn-primary d-none" data-toggle="modal" data-target="#modalToevoeg">
                toevoegen
            </button>
            <div id="hierinfo"></div>
            <div id="verwijderinfo"></div>
            <div id="resultaat"></div>
            <!-- BEGIN MODEL TOEVOEGFORMULIER -->
            <div class="modal fade" id="modalToevoeg" tabindex="-1" role="dialog" aria-labelledby="modal1-label"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal1-label">voeg toe</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        <!-- in de modal-body komt de inhoud van de modal -->
                        <div class="modal-body">

                            <form id="makeForm" method="POST" action="">



                                <div class="form-group">
                                    <label for="first_name">Voornaam</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name"  required>
                                </div>
                                <div class="form-check form-check-inline">

                                    <label>
                                        <input type="radio" class="form-check-input" name="antwoord" id="antwoord_feit" value="FEIT">
                                        <br>
                                        Fabel
                                    </label>

                                    <label>
                                        <input type="radio" class="form-check-input" name="antwoord" id="antwoord_fabel" value="FABEL">
                                        <br>
                                        Feit
                                    </label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" datadismiss="modal">Sluiten</button>
                                    <button type="submit" class="btn btn-info">Opslaan</button>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
            <!-- EINDE MODAL TOEVOEGFORMULIER -->

            <!-- BEGIN MODEL AANPASMODEL -->
            <div class="modal fade" id="pasaanModal" tabindex="-1" role="dialog" aria-labelledby="pasaanModal-label"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pasaanModal-label">feit?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- in de modal-body komt de inhoud van de modal -->
                        <div class="modal-body">
                            <div id="aanpasInfo"></div>
                            <form id="aanpasForm" method="POST" action="">
                                <input type="text" name="ID_Profile" id="ID_Profile" hidden>
                                <!-- <div class="form-check form-check-inline"> -->
                                <!--
                                                            <label>
                                                                <input type="radio" class="form-check-input" name="feit" id="feit" value="feit">
                                                                <br>
                                                                feit
                                                            </label>

                                                            <label>
                                                                <input type="radio" class="form-check-input" name="fabel" id="fabel" value="fabel">
                                                                <br>
                                                                Fabel
                                                            </label>
                                                        </div> -->

                                <div class="form-group">
                                    <label for="vraag">vraag:</label>
                                    <input type="text" class="form-control" name="vraag" id="vraag" value="" required>
                                </div>

                                <p>Is het een feit of een fabel? Klik hieronder welke u denkt dat het is</p>
                                <div class="form-check form-check-inline">

                                    <label>
                                        <input type="radio" class="form-check-input" name="antwoord" id="feit" value= "feit">
                                        <br>
                                        feit
                                    </label>

                                    <label>
                                        <input type="radio" class="form-check-input" name="antwoord" id="fabel" value= "fabel">
                                        <br>
                                        Fabel
                                    </label>

                                </div>
                                <!-- <div class="form-group">
                                    <label for="last_name">Achternaam</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="birth_date">Geboortedatum</label>
                                    <input type="date" class="form-control" name="birth_date" id="birth_date" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="member_since">Lid sinds</label>
                                    <input type="date" class="form-control" name="member_since" id="member_since" value=""
                                        required>
                                </div> -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" datadismiss="modal">Sluiten</button>
                                    <button type="submit" class="btn btn-info" id="editSubmit">Opslaan</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!-- EINDE MODAL AANPASMODEL -->

            <div class="modal fade" id="verwijderModal" tabindex="-1" role="dialog"
                 aria-labelledby="verwijderModal-label" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="verwijderModal-label">Lid verwijderen</h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- in de modal-body komt de inhoud van de modal -->
                        <div class="modal-body">
                            <div id="verwijderInfo"></div><br>
                            <form id="verwijderForm" method="post" action="">
                                <input type="number" class="form-control" name="id" id="id" value="" hidden>
                                <h1 class="form-group text-center" id="name"></h1>
                                <h3 class="form-group text-center" id="member_since"></h3>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" datadismiss="modal" aria-label="Close" id="verwijder-close">Sluiten</button>
                                    <button type="submit" name="verwijderOpslaan" id="verwijderOpslaan" class="btn btn-danger">Verwijder</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="inlog-form col-sm">
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
