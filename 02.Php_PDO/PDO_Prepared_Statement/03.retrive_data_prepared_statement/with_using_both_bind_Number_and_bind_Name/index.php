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
		$sql = "SELECT * FROM student";

		//Prepared Statement
		$result = $conn->prepare($sql);

		//Execute prepared statement
		$result->execute();
/*
        ONE WAY

		//Bind by Column Number
		$result->bindColumn(1, $id);
		$result->bindColumn(2, $name);
		$result->bindColumn(3, $roll);
		$result->bindColumn(4, $address);

		//Fetch Data
	while ($row = $result->fetch(PDO::FETCH_BOUND)) 
	{
		echo "ID: " . $id ." Name: " . $name . " Roll: " . $roll . " Address: " . $address ."<br><br>";
	}

*/
	  //NEXT WAY    Bind by Column Name
		$result->bindColumn('id', $id);
		$result->bindColumn('name', $name);
		$result->bindColumn('roll', $roll);
		$result->bindColumn('address', $address);

		//Fetch Data
	while ($row = $result->fetch(PDO::FETCH_BOUND)) 
	{
		echo "ID: " . $id ." Name: " . $name . " Roll: " . $roll . " Address: " . $address ."<br><br>";
	}


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