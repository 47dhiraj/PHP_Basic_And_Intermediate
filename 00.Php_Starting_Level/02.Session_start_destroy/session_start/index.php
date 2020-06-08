<?php

session_start();

if(isset($_SESSION['uname']))
{
	echo"<h1 align='center'> You are already loged in </h1>";

	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Example of $_session in more deatil</title>
</head>
<body>
	<form method="POST">
		<table align="center" style="margin-top: 200px;">
			<tr>
				<td>Username : </td>
				<td><input type="text" name="username"> </td>
			</tr>

			<tr>
				<td>Password : </td>
				<td><input type="Password" name="password"> </td>
			</tr>

			<tr>
			<td colspan="2" align="center"><input type="submit" name="submit"></td>
			</tr>


		</table>
		
	</form>

</body>
</html>


<?php

if(isset($_POST['submit']))
{
	$_SESSION["uname"]=$_POST['username'];
	header('location:welcome.php');
}


?>