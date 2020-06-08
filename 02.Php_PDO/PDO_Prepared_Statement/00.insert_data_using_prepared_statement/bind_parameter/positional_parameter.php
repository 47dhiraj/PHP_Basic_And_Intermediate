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
		
		//Bind Parameter to Prepared Statement
		$result->bindParam(1, $name, PDO::PARAM_STR);
		$result->bindParam(2, $roll, PDO::PARAM_INT);
		$result->bindParam(3, $address, PDO::PARAM_STR);

		//Variables and Values
		$name = "sudip";
		$roll = 10;
		$address = "baglung";



		//Execute prepared statement
	   $result->execute();


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