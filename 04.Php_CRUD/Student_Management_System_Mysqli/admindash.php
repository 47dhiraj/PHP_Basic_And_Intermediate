<?php
	
	session_start();
    if(!$_SESSION['uid'])     
    {
        header('Location: login.php');       
    }

?>






<div class="admintitle" align="center">

<h4><a href="index.php" style="float:left; margin-left: 10px;  font-size: 20px;">Home</a></h4>	
<h4><a href="logout.php" style="float:right; margin-right: 10px; font-size: 20px;">Logout</a></h4>

<h1> Welcome To Admin Dashboard</h1>
	
</div>

<div class="dashboard">
	<table style="width: 35%;" align="center">
		
		<tr>
			<td>1.</td><td><a href="addstudent.php"> Insert Student Details</a></td>
		</tr>

		<tr>
			<td>2.</td><td><a href="updatestudent.php"> Update Student Details</a></td>
		</tr>

		<tr>
			<td>3.</td><td><a href="deletestudent.php"> Delete Student Details</a></td>
		</tr>

	</table>
</div>	



</body>
</html>