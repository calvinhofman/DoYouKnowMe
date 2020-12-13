<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- EIGEN SCRIPT -->
    <script src="script.js"></script>
    <link href="../../Styling/style.css" type="text/css" rel="stylesheet">
</head>

<body>
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
</body>

</html>