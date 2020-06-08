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

$sql = "INSERT INTO student (name, roll, address) VALUES ('ramesh', '3', 'ktm')";


if(mysqli_query($conn, $sql))
{
	echo "New Record Inserted Successfully !";
}

else
{
	echo "Unable to Insert Data !";
}

?>