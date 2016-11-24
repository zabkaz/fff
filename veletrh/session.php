<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli('mysql14.hostmaster.sk', 'ws506600', 'weplD45Qx_', 'ws506608db');
// Selecting Database
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql="select username from login where username='$user_check'";
$result=$connection->query($ses_sql);
$row = $result->fetch_assoc();
$login_session =$row['username'];
if(!isset($login_session)){
$connection->close(); // Closing Connection
header('Location: uchazec.php'); // Redirecting To Home Page
}
?>