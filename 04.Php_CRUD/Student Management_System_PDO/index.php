
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
					<select name="std" type="number" required="required">

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
				<td><input type="text" name="rollno" required="required"></td>
			</tr>

			<tr>
				<td colspan="2" align="center"><input type="submit" name="submit" value="Show Info."></td>
			</tr>
			
		</table>
		
	</form>

</body>
</html>

<?php
		include 'function.php';

	if(isset($_POST['submit']))
	{
		$standerd=$_POST['std'];
		$rollno=$_POST['rollno'];



		showdetails($standerd, $rollno);


	}


?>