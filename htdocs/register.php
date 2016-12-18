<?php
session_start(); 

$username=$_POST['username'];
$password=$_POST['password'];
$f_name=$_POST['f_name'];
$l_name=$_POST['l_name'];
$email=$_POST['email'];
$studium=$_POST['studium'];
$univerzita=$_POST['univerzita'];
$fakulta=$_POST['fakulta'];
$rocnik=$_POST['rocnik'];

$connection = new mysqli('mysql14.hostmaster.sk', 'ws506600', 'weplD45Qx_', 'ws506608db');
$sql = "INSERT INTO login(`username`, `password`) VALUES ('$username', '$password')";
if ($connection->query($sql) === TRUE) {
		$_SESSION['login_user']=$username; 
		$last_id = $connection->insert_id;
		$sql = "INSERT INTO student_info(`id`,`first_name`, `last_name`, `email`, `studium`, `univerzita`, `fakulta`, `rocnik`) VALUES ('$last_id', '$f_name', '$l_name', '$email', '$studium', '$univerzita', '$fakulta', '$rocnik')";
		if ($connection->query($sql) === TRUE) {
			$sql = "INSERT INTO odvetvie(`id`) VALUES ('$last_id')";
			if ($connection->query($sql) === TRUE) {
				header("location: uchazecPrihlaseny.php");			
			}else{
				printf("DB insert 3 false\n");
			}		
		}else{
			printf("DB insert 2 false\n");
		}
	}else{
		printf("DB insert 1 false\n");
	}
$connection->close();
?>