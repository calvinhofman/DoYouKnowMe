<?php
session_start();

require '../config.php';


//    $username = 0;
if (isset($_POST["id"])){
    $id = $_POST['id'];

    $query = "UPDATE profiles set status = 'decline' where ID_Profile = $id";

   $resultaat = mysqli_query($mysqli, $query);

}else{

    echo "Error, no id specified";
    http_response_code(400);
}




?>