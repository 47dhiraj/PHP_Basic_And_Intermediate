<?php 

$dsn = "mysql:host=localhost; dbname=test_db;";
$db_user = "root";
$db_password = "";


try {         
	
	$conn = new PDO($dsn,$db_user ,$db_password);     //create Database connection using PDO

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Connected to Database !!!"."<hr><br>";
} 

catch (Exception $e) {
	
	echo "Connection to Database FAILED !!! " .$e->getMessage();
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Data Retivation & showing in table</title>

	<style>
		
		table{
			text-align: center;
			margin-top: 30px;
			margin-left: 250px;
			width: 60%;
		}

		table, tr, td, th{
			border: 1px solid green;
			border-collapse: collapse;
		}


	</style>

</head>
<body>

<div>
	
	<?php
		$sql = "SELECT * FROM student";

		//prepared statement
		$result = $conn->prepare($sql);

		//Execute Prepared statement
		$result->execute();

		/*
		$sql = "SELECT * FROM student WHERE name = ? && address =?";

			//prepared statement
			$result = $conn->prepare($sql);

			//Execute Prepared statement
			$result->execute(['hari', 'palpa']);
		*/

		if ($result->rowCount() > 0)
		{
			echo "<table>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>Name</th>";
			echo "<th>Roll</th>";
			echo "<th>Address</th>";
			echo "</tr>";
			echo "</thead>";

			echo "<tbody>";

			while ( $row = $result->fetch(PDO::FETCH_ASSOC))
			{

				echo "<tr>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["roll"] . "</td>";
				echo "<td>" . $row["address"] . "</td>";
				echo "</tr>";

			}

			echo "</tbody>";
			echo "</table>";

		}
		else
		{

			echo "0 Results";
		}

?>

</div>



</body>
</html>

