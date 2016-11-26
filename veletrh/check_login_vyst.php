<?php 
    $login = trim($_POST['login']);
    
    $connection = new mysqli('mysql14.hostmaster.sk', 'ws506600', 'weplD45Qx_', 'ws506608db');

    $sql = "SELECT username FROM login WHERE username='$login'";
    $result = $connection->query($sql);
    $rows = $result->num_rows;
    if ($rows == 0) {
        echo 'success';
    } else {
        echo 'failed';
    }
    $connection->close();
?>