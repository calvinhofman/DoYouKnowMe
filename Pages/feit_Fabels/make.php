<?php

require 'config.php';

$info = array();
parse_str($_POST["info"],$info);

$ID_Profile = md5($info["ID_Profile"]);
$vraag = $info['vraag'];
$first_name = $info['first_name'];

$query = "INSERT INTO `back2_leden` (`gender`, `first_name`, `last_name`, `birth_date`, `member_since`) 
            VALUES ('$gender', '$first_name', '$last_name', '$birth_date', '$member_since')";  
if ($mysqli->query($query)) {
    echo 1;
    
} else{
    echo 0;
}
?>

