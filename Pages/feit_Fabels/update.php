<?php

require 'config.php';

$info = array();
parse_str($_POST["info"],$info);

$id = $info['ID_Profile'];
$antwoord = $info['antwoord'];

$query = "UPDATE fabels_feiten SET antwoord='{$antwoord}' WHERE ID_Profile='{$id}'";
if ($mysqli->query($query)) {
    echo 1;

} else{
    echo 0;
    
}
?>