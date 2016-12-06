<?php 
$connection = new mysqli('mysql14.hostmaster.sk', 'ws506600', 'weplD45Qx_', 'ws506608db');

session_start();

$user_check=$_SESSION['login_user'];

$ses_sql="SELECT * FROM login_vyst INNER JOIN vyst_info ON login_vyst.id = vyst_info.id WHERE username='$user_check'";
$result=$connection->query($ses_sql);
$row = $result->fetch_assoc();
$login_session =$row['username'];
$c_name = $row['c_name'];
$email = $row['email'];
$tel_num = $row['tel_num'];
$full_name = $row['full_name'];
$con_email = $row['con_email'];
$con_tel_num = $row['con_tel_num'];
$con_country = $row['con_country'];
$user_id = $row['id'];
$adress_id= $row['address_id'];
$cor_adress_id= $row['address_coresp_id'];
$place_id = $row['placeID'];

$address_sql="SELECT * FROM address WHERE id=$adress_id";
$result= $connection->query($address_sql);
$row = $result->fetch_assoc();
$street = $row['street'];
$city = $row['city'];
$zip = $row['zip'];
$country = $row['country'];

$cor_street = '';
$cor_city = '';
$cor_zip = '';
$cor_country = '';
if($cor_adress_id != 0 ){
	$cor_address_sql="SELECT * FROM address WHERE id=$cor_adress_id";
	$result= $connection->query($cor_address_sql);
	$row = $result->fetch_assoc();
	$cor_street = $row['street'];
	$cor_city = $row['city'];
	$cor_zip = $row['zip'];
	$cor_country = $row['country'];
}

$odv_sql="SELECT * FROM odvetvie WHERE id=$user_id";
$result=$connection->query($odv_sql);
$row = $result->fetch_assoc();
$o_fin=($row['fin'] == 1 ? 'active' : '');
$o_hr=($row['hr'] == 1 ? 'active' : '');
$o_chem=($row['chem'] == 1 ? 'active' : '');
$o_it=($row['it'] == 1 ? 'active' : '');
$o_jaz=($row['jaz'] == 1 ? 'active' : '');
$o_obch=($row['obch'] == 1 ? 'active' : '');
$o_por=($row['por'] == 1 ? 'active' : '');
$o_prav=($row['prav'] == 1 ? 'active' : '');
$o_serv=($row['serv'] == 1 ? 'active' : '');
$o_stav=($row['stav'] == 1 ? 'active' : '');
$o_stro=($row['stro'] == 1 ? 'active' : '');
$o_tech=($row['tech'] == 1 ? 'active' : '');
$o_zem=($row['zem'] == 1 ? 'active' : '');


if(!isset($login_session)){
$connection->close(); 
header('Location: vystavovatel.html');
}

?>