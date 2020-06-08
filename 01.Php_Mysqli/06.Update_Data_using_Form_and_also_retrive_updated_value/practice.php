<?php
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "practice";


// Create Connection
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);


//Checking Connection
if(!$conn) 
{
	die("Connection Failed");
}
echo "Connected Successfully <hr>";

//Insert Data
if(isset($_REQUEST['update']))
{
	//Checking For Empty Field
	if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['address'] == ""))
	{
		echo "<small>Please first fill all Fields....</small><hr>";
	}

	else
	{
		$name = $_REQUEST['name'];
		$roll = $_REQUEST['roll'];
		$address = $_REQUEST['address'];

		$sql = "UPDATE student SET name = '$name', roll = '$roll', address = '$address' WHERE id = {$_REQUEST['id']}";

		if(mysqli_query($conn, $sql))
		{
			echo "New Record Updated Successfully !";
		}

		else
		{
			echo "Unable to Update Data !";
		}


	}

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Updating data using Button</title>
	<style>
		input[type=submit]
		{
		  background-color: #ff0000;
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
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
				
			}
		?>

		<form action="" method="POST">
			<label for="name">Name</label>
			
			<input type="text" name="name" id="name" value="<?php if(isset($row['name'])){ echo $row['name'];} ?>">
			<input type="text" name="roll" id="roll" value="<?php if(isset($row['roll'])){ echo $row['roll'];} ?>">
			<input type="text" name="address" id="address" value="<?php if(isset($row['address'])){ echo $row['address'];} ?>">
			<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
			<button type="submit" name="update">Update</button>

			
		</form>
	</div>

	<div>

		<?php

			

		$sql = "SELECT * FROM student";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0)
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

			while ($row = mysqli_fetch_assoc($result))
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

<?php $conn = null;?>