<?php
	session_start();
	include 'dbcon.php';

	if(!$_SESSION['uid'])     
    {
        header('Location: login.php');       
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h4><a href="admindash.php" style="float:left; margin-left: 10px;  font-size: 20px;">Back</a></h4>	
<h4><a href="logout.php" style="float:right; margin-right: 10px; font-size: 20px;">Logout</a></h4>

<form method="POST" action="addstudent.php" enctype="multipart/form-data">

	<table align="center" border="1" style="width: 70%; margin-top: 40px;">

		<tr>
			<th>Roll No :</th>
			<td><input type="text" name="rollno" placeholder="Enter Rollno" required="required"></td>
		</tr>

		<tr>
			<th>Full Name :</th>
			<td><input type="text" name="name" placeholder="Enter Full Name" required="required"></td>
		</tr>

		<tr>
			<th>Enter Standerd:</th>
			<td><input type="number" name="standerd" placeholder="Enter Standerd" required="required"></td>
		</tr>

		<tr>
			<th>City :</th>
			<td><input type="text" name="city" placeholder="Enter City" required="required"></td>
		</tr>

		<tr>
			<th>Parents Contact No :</th>
			<td><input type="text" name="pcon" placeholder="Parent's Contact No" required="required"></td>
		</tr>

		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" required="required"></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>
		

	</table>
	
</form>

</body>
</html>

<?php

if(isset($_POST['submit']))
{
	

	$rollno = $_POST['rollno'];
	$name = $_POST['name'];
	$city = $_POST['city'];
	$pcon = $_POST['pcon'];
	$std = $_POST['standerd'];

	$imagename = $_FILES['simg']['name'];
	$tempname = $_FILES['simg']['tmp_name'];

	move_uploaded_file($tempname, "images/$imagename");
	
	$sql = "INSERT INTO student(rollno, name, city, pcont, standerd, image) VALUES('$rollno', '$name', '$city', '$pcon', '$std', '$imagename')";

    

	if(mysqli_query($con, $sql))
	{
	echo "New Student Inserted Successfully !";
	}

	else
	{
	echo "Unable to Insert  new student!";
	}

}

?>