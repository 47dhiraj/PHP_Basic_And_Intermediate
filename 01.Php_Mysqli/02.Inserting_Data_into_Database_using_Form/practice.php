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
	if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") ||  ($_REQUEST['address'] == ""))
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
	<title>Inserting data from form</title>
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

</body>
</html>

<?php $conn = null;?>