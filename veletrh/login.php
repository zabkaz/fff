<?php
session_start(); 
$error=''; 

if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{

$username=$_POST['username'];
$password=$_POST['password'];

$connection = new mysqli('mysql14.hostmaster.sk', 'ws506600', 'weplD45Qx_', 'ws506608db');

$sql = "select * from login where password='$password' AND username='$username'";
$result = $connection->query($sql);
$rows = $result->num_rows;
if ($rows == 1) {
$_SESSION['login_user']=$username; 
header("location: uchazecPrihlaseny.php"); 
} else {
$error = "Username or Password is invalid";
header("location: uchazec.php");
}
$connection->close(); 

}
?>