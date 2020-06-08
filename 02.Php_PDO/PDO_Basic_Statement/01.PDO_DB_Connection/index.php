<?php 

//create Database connection using PDO

$dsn = "mysql:host=localhost; dbname=test_db;";
$db_user = "root";
$db_password = "";




$conn = new PDO($dsn,$db_user ,$db_password);

if($conn){
	echo "Connected to Database !!";
}

?> 