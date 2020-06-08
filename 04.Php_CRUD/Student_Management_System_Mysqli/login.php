<?php
	   session_start();

   if(isset($_SESSION['uid']))     
    {
        header('Location: admindash.php');       
    }
?>



<!DOCTYPE html>
<html lang="en_us">
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
</head>
<body>

<h4><a href="index.php" style="float:left; margin-left: 10px;  font-size: 20px;">Back</a></h4>
	<h1 align="center"> Admin Login </h1>

	<form action="login.php" method="POST">
		
		<table align="center">

			<tr>
				<td> Username</td><td><input type="text" name="uname" required></td>
			</tr>

			<tr>
				<td> Password</td><td><input type="Password" name="pass" required></td>
			</tr>

			<tr>
				<td colspan="2" align="center"> <input type="submit" name="login" value="Login"></td>
			</tr>
			
		</table>

	</form>

</body>
</html>

<?php

	

	if(isset($_POST['login']))
	{
		include 'dbcon.php';

		$username = $_POST['uname'];
		$password = $_POST['pass'];

		$sql = "SELECT * FROM admin WHERE username='$username' AND password='$password' ";

		$result = mysqli_query($con, $sql);

		if(mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_assoc($result);
			$id= $row['id'];

			$_SESSION['uid']= $id;

			header('location: admindash.php');
		}

		else
		{
		?>
			<script>
				alert('Username or Password not match !!');
				window.open('login.php', '_self');
			</script>

		<?php

		}

	}



?>