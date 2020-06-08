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

$sql = "SELECT * FROM student";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0)
{
	while ($row = mysqli_fetch_assoc($result)) 
	{
		echo "ID: " .$row['id']. "Name: " .$row['name'] . "Roll: " .$row['roll'] . "Address: " .$row['address'] . "<br>";
	}
}

else
{
	echo "No Results Found !";
}

?>