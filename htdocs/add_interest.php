<?php 
    $name = trim($_POST['name']);
    $id = trim($_POST['id']);
    
   $connection = new mysqli('127.0.0.1', 'root', '', 'company');

    $sql = "UPDATE odvetvie SET $name = NOT $name WHERE id = $id";
    if ($connection->query($sql) === TRUE) {
        echo 'success';
    }else{ 
        echo 'failed';
    }
    $connection->close();
?>