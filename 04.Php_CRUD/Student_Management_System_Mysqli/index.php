<!DOCTYPE html>
<html lang="en_us">
<head>
	<meta charset="utf-8">
	<title> Student Management System </title>
</head>
<body>
	<h3 align="right" style="margin-right: 20px;"><a href="login.php"> Admin Login</a> </h3>

	<h1 align="center"> Welcome to student Management System </h1>

	<form method="POST" action="index.php">

		<table style="width: 30%;" align="center" border="1">

			<tr>
				<td colspan="2" align="center">Student Information
					
				</td>
			</tr>

			<tr>
				<td align="left"> Choose Standerd </td>

				<td>
					<select name="std" required>

						<option value="1"> 1st Grade </option>
						<option value="2"> 2nd Grade </option>
						<option value="3"> 3rd Grade </option>
						<option value="4"> 4th Grade </option>
						<option value="5"> 5th Grade </option>
						<option value="6"> 6th Grade </option>
						<option value="7"> 7th Grade </option>
						<option value="8"> 8th Grade </option>
						<option value="9"> 9th Grade </option>
						<option value="10">10th Grade</option>
						

					</select>
				</td>
			</tr>

			<tr>
				<td align="left">Enter Rollno</td>
				<td><input type="text" name="rollno" required></td>
			</tr>

			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Show Info."></td>
			</tr>
			
		</table>
		
	</form>

</body>
</html>




<?php

	if(isset($_POST['submit']))
	{

	include 'dbcon.php';

	$standerd=$_POST['std'];
	$rollno=$_POST['rollno'];




    $sql = "SELECT * FROM student WHERE rollno='$rollno' AND standerd='$standerd' ";
    $result = mysqli_query($con, $sql);



    if(mysqli_num_rows($result) >0)
	{
	

	$row = mysqli_fetch_assoc($result);
	?>

    <table border="1" style="width:50%; margin-top: 20px;" align="center">

	<tr>
		<th colspan="3"> Student Details </th>
	</tr>

	<tr>
		<td rowspan="5"><img src="images/<?php echo $row['image']; ?>" style="max-height: 150px; max-width: 120px; padding-left: 10px; padding-right: 10px;"></td>

		<th>Roll No</th>
		<td><?php echo $row['rollno']; ?></td>
	</tr>


	<tr>
		<th>Name</th>
		<td><?php echo $row['name']; ?></td>
	</tr>

	<tr>
		<th>Standerd</th>
		<td><?php echo $row['standerd']; ?></td>
	</tr>

	<tr>
		<th>Parents Contact NO.</th>
		<td><?php echo $row['pcont']; ?></td>
	</tr>


	<tr>
		<th>City</th>
		<td><?php echo $row['city']; ?></td>
	</tr>
	

	</table>
	
	<?php

	}

	else
	{
		echo "<script> alert('No student Found'); </script>";
	}


	}


?>