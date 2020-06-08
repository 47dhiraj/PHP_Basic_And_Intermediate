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

<?php
	$sql = "SELECT * FROM student";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0)
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
	echo "No Results Found !";
	}
?>

</body>
</html>

