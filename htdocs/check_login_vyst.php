<?php 
    $login = trim($_POST['login']);
    
    $connection = new mysqli('127.0.0.1', 'root', '', 'company');

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