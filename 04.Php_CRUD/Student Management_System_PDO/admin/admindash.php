<?php

    session_start();
    if(!$_SESSION['active'])     
    {
        header('Location: ../login.php');       
    }

    $username= $_SESSION['username'];

?>






<div class="admintitle" align="center">
	<h4><a href="../index.php" style="float:left; margin-left: 10px;  font-size: 20px;">Home Page</a></h4>
    <h4><a href="../logout.php" style="float:right; margin-right: 10px;  font-size: 20px;">Logout</a></h4>

	<h1> Welcome To Admin Dashboard</h1>
	
</div>

<div class="dashboard">
	<table style="width: 35%;" align="center">
		
		<tr>
			<td>1.</td><td><a href="addstudent.php"> Add Student </a></td>
		</tr>

		<tr>
			<td>2.</td><td><a href="updatestudent.php"> Update Student Details</a></td>
		</tr>

		<tr>
			<td>3.</td><td><a href="deletestudent.php"> Delete Student </a></td>
		</tr>

		<tr>
			<td>4.</td><td><a href="cadmin.php"> Change Admin Login Password  </a></td>
		</tr>

		

	</table>
</div>	



</body>
</html>