<?php 

$dsn = "mysql:host=localhost; dbname=test_db;";
$db_user = "root";
$db_password = "";


try {         
	
	$conn = new PDO($dsn,$db_user ,$db_password);     //create Database connection using PDO

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Connected to Database !!!"."<hr><br>";

//Update Data
if(isset($_REQUEST['update']))
{
	//checking for Empty Field
	if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == ""))
	{
		echo "<small>Fill all Fields.</small><hr>";
	}
	else
	{

	$sql = "UPDATE student SET name = :name, roll = :roll, address = :address WHERE id = :id";

	$affected_row = $conn->prepare($sql);

	
	$affected_row->execute([':name' => $_REQUEST['name'], ':roll' => $_REQUEST['roll'], ':address' => $_REQUEST['address'], ':id' =>$_REQUEST['id']]);

	
		
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
	<title>Updating data using Button</title>
	<style>
		input[type=submit]
		{
		  background-color: #ff9933;
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
			if(isset($_REQUEST['edit']))
			{
				$sql = "SELECT * FROM student WHERE id= {$_REQUEST['id']}";

				$result = $conn->prepare($sql);

				$result->execute();

				$row = $result->fetch(PDO::FETCH_ASSOC);
			}
		?>
		<form action="" method="POST">
			<label for="name">Name:</label>
			
			<input type="text" name="name" id="name" value="<?php if(isset($row['name'])){ echo $row['name'];} ?>">

			<label for="name">Roll:</label>
			<input type="text" name="roll" id="roll" value="<?php if(isset($row['roll'])){ echo $row['roll'];} ?>">
			<label for="name">Address:</label>
			<input type="text" name="address" id="address" value="<?php if(isset($row['address'])){ echo $row['address'];} ?>">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<button  type="submit" name="update" style="background-color: #33ff33;">Update</button>

			
		</form>

		<?php


			$sql = "SELECT * FROM student";

			$result = $conn->prepare($sql);

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
						 	<input type="submit" name="edit" value="Edit"> 
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

<?php

unset($result);
unset($affected_row);

$conn = null;
 ?>








