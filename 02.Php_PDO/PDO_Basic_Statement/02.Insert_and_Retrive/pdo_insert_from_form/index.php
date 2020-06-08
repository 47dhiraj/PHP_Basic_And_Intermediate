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
	if(($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") ||          ($_REQUEST['address'] == ""))
	{
		echo "<small>Fill all Fields</small><hr>";
	}

	else
	{
		$name = $_REQUEST['name'];
		$roll = $_REQUEST['roll'];
		$address = $_REQUEST['address'];

		$sql = "INSERT INTO student(name, roll, address) VALUES('$name', '$roll', '$address')";

		$affected_row = $conn->exec($sql);
		echo $affected_row . "Row Inserted <br>";


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





















