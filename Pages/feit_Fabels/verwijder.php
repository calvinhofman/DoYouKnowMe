<?php

require 'config.php';

$info = array();
parse_str($_POST["info"],$info);

$id = $info['id'];

$query = "DELETE FROM back2_leden WHERE id='{$id}'";
if ($mysqli->query($query)) {
    echo 1;
    
} else{
  echo "hi";
    echo 0;
}
?>