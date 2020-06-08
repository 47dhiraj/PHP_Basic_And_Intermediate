<?php
	
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "sms";

	$con= mysqli_connect($db_host, $db_user, $db_password, $db_name);

	if(!$con) 
	{
		echo"Connection is done to database!";
	}

	// echo "Connected Successfully <hr>";



?>

