<?php
require '../config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
<!--    Favicon-->
    <link rel="icon" href="../Images/Favicon.jpg" sizes="16x16" type="image/jpg">


    <link rel="stylesheet" href="../Styling/style.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!--    Bootstrap 4.0-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!--Catchpa-->
    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!--    W3 css-->
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Log in</title>
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
            <li class="nav-item active">
                <a class="nav-link" style="color: white;"  href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link style='color:white'" href="#">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link style='color:white'" href="#">Friends</a>
            </li>


        </ul>
<!--        <form class="form-inline my-2 my-lg-0">-->
<!--            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">-->
<!--            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>-->
<!--        </form>-->
    </div>
</nav>






<div class="container">
    <div class="row">
        <div class="col-sm">
        </div>
        <div class="inlog-form   col-sm">
            <div class="col-sm form-col">

            <h1 class="text-center" style="color: white">Inloggen</h1>
                <form class="justify-content-center" id="form" action="inlog.php" method="post">


                    <div class="form-group">
                        <label class="sr-only">Name</label>
                        <input type="text" name="username" id="username" class="form-control username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Password</label>
                        <input type="password" name="password" id="password" class="form-control password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Captcha</label>
                            <div class="captcha_wrapper ">
                            <div class="g-recaptcha" data-sitekey="6Le8JeIZAAAAAE6GR7hL5vNxz2vXYx2pqR41Amo9"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Account maken</label>
                       <a href="../config.php"><button class="form-control btn btn-primary button"  id="">Account maken</button></a>
                    </div>
                    <div class="form-group">
                        <label class="sr-only">Password vergeten?</label>

                        <a href="inlog_vergeten.php"><button class="form-control btn btn-primary">Password vergeten?</button></a>
                    </div>
                    <div class="form-group justify-content-center">
                        <label class="sr-only">Submit</label>
                        <input type="submit" name="submit" id="submit" class="form-control btn btn-primary" value="Login">
                    </div>

                    <div class="form-group" style="color: white">
                        <?php

                        if (isset($_POST['submit'])) {

                            $username = $_POST['username'];
                            $password = md5($_POST['password']);

                            //captcha
                            $response = $_POST["g-recaptcha-response"];

                            $url = 'https://www.google.com/recaptcha/api/siteverify';
                            $data = array(
                                'secret' => '6Le8JeIZAAAAAAYNkaE5qdnbIMHPu6DsVHGUWNEv',
                                'response' => $_POST["g-recaptcha-response"]
                            );

                            $options = array(
                                'http' => array (
                                    'method' => 'POST',
                                    'content' => http_build_query($data)
                                )
                            );

                            $context  = stream_context_create($options);
                            $verify = file_get_contents($url, false, $context);
                            $captcha_success=json_decode($verify);

                            $query = "SELECT * FROM profiles WHERE Username = '$username' AND password = '$password'";

                            $sqli = mysqli_query($mysqli, $query);

                            if(mysqli_num_rows($sqli) > 0 && $captcha_success->success==true) {

                                $loggedin = mysqli_fetch_array($sqli);


                                $_SESSION['Username'] = $username;
                                header("Location:home.php");
                            } else if($captcha_success->success==false){

                                echo "<h4 class='text-center'>Vul de controle in!</h4>";
                            }
                            else{
                                echo "<h4 class='text-center'>Naam en/of password zijn verkeerd!</h4>";

                            }
                        }

                        ?>

                    </div>
                </form>

            </div>
            </div>

        <div class="col-sm">
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>