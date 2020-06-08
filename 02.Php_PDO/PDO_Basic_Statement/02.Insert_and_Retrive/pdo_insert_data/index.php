<?php 

$dsn = "mysql:host=localhost; dbname=test_db;";
$db_user = "root";
$db_password = "";


try {         
	
	$conn = new PDO($dsn,$db_user ,$db_password);     //create Database connection using PDO

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Connected to Database !!!"."<hr><br>";


	//Insert Data

$sql = "INSERT INTO student (name, roll, address) VALUES ('roli', '8', 'ktm')";
$affected_row = $conn->exec($sql);

echo $affected_row. "Row Inserted <br>";

} 

catch (Exception $e) {
	
	echo "Connection to Database FAILED !!! " .$e->getMessage();
}


?>