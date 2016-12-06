<?php
session_start(); 

$username=$_POST['username'];
$password=$_POST['password'];

$c_name=$_POST['c_name'];
$tel_num=$_POST['tel_num'];
$email=$_POST['email'];

$street=$_POST['street'];
$city=$_POST['city'];
$zip=$_POST['zip'];
$country=$_POST['country'];

$full_name=$_POST['full_name'];
$con_email=$_POST['con_email'];
$con_tel_num=$_POST['con_tel_num'];
$con_country=$_POST['con_country'];


$connection = new mysqli('mysql14.hostmaster.sk', 'ws506600', 'weplD45Qx_', 'ws506608db');
$sql = "INSERT INTO login_vyst(`username`, `password`) VALUES ('$username', '$password')";
if ($connection->query($sql) === TRUE) {
		$_SESSION['login_user']=$username; /
		$last_id = $connection->insert_id;

		$sql = "INSERT INTO address(`street`, `city`, `zip`, `country`) VALUES ('$street', '$city', '$zip', '$country')";	
		if ($connection->query($sql) === TRUE) {
			$adress_id = $connection->insert_id;
			$sql = "INSERT INTO vyst_info(`id`,`c_name`, `email`, `tel_num`, `full_name`, `con_email`, `con_tel_num`, `con_country`, `address_id`) VALUES ('$last_id', '$c_name', '$email', '$tel_num', '$full_name', '$con_email', '$con_tel_num', '$con_country', '$adress_id')";
			if ($connection->query($sql) === TRUE) {
				$sql = "INSERT INTO odvetvie(`id`) VALUES ('$last_id')";
				$connection->query($sql);
				header("location: vystavovatelPrihlaseny.php");			
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