<?php 

$dsn = "mysql:host=localhost; dbname=test_db;";
$db_user = "root";
$db_password = "";


try {         
	
	$conn = new PDO($dsn,$db_user ,$db_password);     //create Database connection using PDO

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Connected to Database !!!"."<hr><br>";

//Insert Data
if(isset($_REQUEST['delete']))
{

		$sql = "DELETE FROM student WHERE id = {$_REQUEST['id']}";

		$affected_row = $conn->exec($sql);
		echo $affected_row . "Row Deleted Successfully ! <br>";

}

} 

catch (PDOException $e) {
	
	echo "Connection to Database FAILED !!! " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Data Deletion Using Button</title>

	<style>
		input[type=submit]
		{
		  background-color: #4CAF50;
		  border: none;
		  color: white;
		  padding: 16px 32px;
		  text-decoration: none;
		  margin: 4px 2px;
		  cursor: pointer;
	}
		
		table{
			text-align: center;
			margin-top: 30px;
			margin-left: 220px;
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
		$result = $conn->query($sql);

		if ($result->rowCount() > 0)
		{
			echo "<table>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>ID</th>";
			echo "<th>Name</th>";
			echo "<th>Roll</th>";
			echo "<th>Address</th>";
			echo "<th>Action</th>";
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
				echo '<td> <form action="" method="POST">
						 	<input type="hidden" name="id" value='. $row["id"] .'> 
						 	<input type="submit" name="delete" value="Delete"> 
						 </form> 
					 </td>';

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

<?php $conn = null; ?>


































