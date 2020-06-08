<?php 

$dsn = "mysql:host=localhost; dbname=test_db;";
$db_user = "root";
$db_password = "";


try {         
	
	$conn = new PDO($dsn,$db_user ,$db_password);     //create Database connection using PDO

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Connected to Database !!!"."<hr><br>";

//Insert Data
if(isset($_REQUEST['submit']))
{
	//Checking For Empty Field
	if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == ""))
	{
		echo "<small>Fill all Fields</small><hr>";
	}

	else
	{
		
		$sql = "INSERT INTO student(name, roll, address) VALUES(:name, :roll, :address)";

		//Prepared Statement
		$result= $conn->prepare($sql);


		//Execute Prepared statement
		$result->execute([':name' => $_REQUEST['name'], ':roll' => $_REQUEST['roll'], ':address' => $_REQUEST['address']]);
		

		echo $result->rowCount() . " Row inserted ! <br>";

	}

}


} 

catch (PDOException $e) {
	
	echo "Connection to Database FAILED !!! " . $e->getMessage();
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Inserting data from form</title>

<style>

	table{
			text-align: center;
			width: 60%;
			margin: 0 0 0 280px;
			
		

		}

		table, tr, td, th{
			border: 1px solid green;
			border-collapse: collapse;
		}

</style>

</head>
<body>
	<div style="margin: 50px 0px 0px 500px;">
		<form action="" method="POST">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name"><br><br><br>
			<label for="roll">Roll  :</label>
			<input type="text" name="roll" id="roll"><br><br><br>
			<label for="address">Address:</label>
			<input type="text" name="address" id="address"><br><br><br><br>

			<button type="submit" name="submit">Submit</button><br><br>
			
		</form>
	</div>

	<?php
		$sql = "SELECT * FROM student";

		//Prepared Statement
		$result = $conn->prepare($sql);

		//Execute Prepared Statement
		$result->execute(); 

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

			while($row = $result->fetch(PDO::FETCH_ASSOC))
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

</body>

<?php

unset($result);

$conn = null;

?>

</html>








