<?php 

$dsn = "mysql:host=localhost; dbname=test_db;";
$db_user = "root";
$db_password = "";




try {         
	
	$conn = new PDO($dsn,$db_user ,$db_password);     //create Database connection using PDO

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	echo "Connected to Database !!!"."<hr><br>";
	
} 

catch (Exception $e) {
	
	echo "Connection to Database FAILED !!! " .$e->getMessage();
	
}


$sql = "SELECT * FROM student";
$result = $conn->query($sql);

foreach($result->fetchAll(PDO::FETCH_ASSOC) as $row)
 {
 	echo " ID: " . $row['id'] . " Name: " . $row['name'] . " Roll no: " . $row['roll'] . " Address: " .$row['address'] ."<br><br>";
 }





// echo "<pre>"; 
// print_r($row); 
// "</pre>";          




/* 
if ($result->rowCount() > 0)
{
	while ( $row = $result->fetch(PDO::FETCH_ASSOC))        
	 {
		echo " ID: " . $row['id'] . " Name: " . $row['name'] . " Roll no: " .    $row['roll'] . " Address: " .$row['address'] ."<br><br>";
	}
}
else
{
	echo "0 Results";
}
*/




//  $row = $result->fetchAll(PDO::FETCH_ASSOC);  
// echo "<pre>"; 
// print_r($row); 
// "</pre>";



?> 