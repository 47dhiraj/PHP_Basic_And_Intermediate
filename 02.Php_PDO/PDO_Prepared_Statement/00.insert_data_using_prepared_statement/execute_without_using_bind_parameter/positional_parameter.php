<?php 

$dsn = "mysql:host=localhost; dbname=test_db;";
$db_user = "root";
$db_password = "";

//Create Connection with exception Handling
try {         
	
	$conn = new PDO($dsn,$db_user ,$db_password);     //create Database connection using PDO

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Connected to Database !!!"."<hr><br>";
	}


catch (PDOException $e) 
	{
	
	echo "Connection to Database FAILED !!! " . $e->getMessage();
	}


try
{
		$sql = "INSERT INTO student (name, roll, address) VALUES(?, ?, ?)";

		//Prepared Statement
		$result = $conn->prepare($sql);
		

	   //Execute prepared statement
	   $result->execute(['basanti', 11, 'mahakali']);


	   echo $result->rowCount() . " row inserted into the Database ! <br>";


}

catch (PDOException $e) 
{
		echo  $e->getMessage();
}

//Close Prepared Statement
unset($result);

//Close Connection
$conn =null;



?>