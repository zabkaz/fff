<?php 
    $place = trim($_POST['place']);
    $id = trim($_POST['id']);
    
    $connection = new mysqli('mysql14.hostmaster.sk', 'ws506600', 'weplD45Qx_', 'ws506608db');
	
    $sql2 = "UPDATE vyst_info SET placeID = $place WHERE id = $id";
    if ($connection->query($sql2) === TRUE) {
        echo 'success';
    }else{ 
        echo 'failed';
    }
    $connection->close();
?>