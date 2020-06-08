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
if(isset($_REQUEST['submit']))
{
	//Checking For Empty Field
	if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") ||          ($_REQUEST['address'] == ""))
	{
		echo "<small>Please first fill all Fields....</small><hr>";
	}

	else
	{
		$name = $_REQUEST['name'];
		$roll = $_REQUEST['roll'];
		$address = $_REQUEST['address'];

		$sql = "INSERT INTO student(name, roll, address) VALUES('$name', '$roll', '$address')";

		if(mysqli_query($conn, $sql))
		{
			echo "New Record Inserted Successfully !";
		}

		else
		{
			echo "Unable to Insert Data !";
		}


	}

}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Inserting & retriving data </title>

	<style>
		
		table{
			text-align: center;
			width: 40%;
			margin: 0px 20px 0px 0px;
			
		

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