<?php 
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);

   $connection = new mysqli('mysql14.hostmaster.sk', 'ws506600', 'weplD45Qx_', 'ws506608db');

    $sql = "SELECT * FROM login WHERE username='$login' AND password='$pass'";
    $result = $connection->query($sql);
    $rows = $result->num_rows;
    if ($rows == 1) {
        echo 'success';
    } else {
        echo 'failed';
    }
    $connection->close();
?>