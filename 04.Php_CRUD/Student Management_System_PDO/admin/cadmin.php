<?php

    session_start();
    if(!$_SESSION['active'])     
    {
        header('Location: ../login.php');       
    }

  		include '../adminmodel.php';
	

	if(isset($_POST['submit']))
	{
		
		

    	$cpass = $_POST['cpass'];
    	

    

	


	}
    
?>






<h4><a href="admindash.php" style="float:left; margin-left: 10px;  font-size: 20px;">Back</a></h4>

<h4><a href="../logout.php" style="float:right; margin-right: 10px;  font-size: 20px;">Logout</a></h4>


<form method="POST" action="cadmin.php">
	<table align="center" border="1" style="width: 40%; margin-top: 30px;">

		<tr>
			<th>Current Password :</th>
			<td><input type="text" name="cpass" placeholder="Enter Current Password " required="required"></td>
		</tr>

		<tr>
			<th>New Password :</th>
			<td><input type="text" name="npass" placeholder="Enter Full Name" required="required"></td>
		</tr>

		<tr>
			<th>Confirm New Password:</th>
			<td><input type="text" name="npass" placeholder="Confirm New Password" required="required"></td>
		</tr>

		<tr>
			<td colspan="6" align="center"><input type="submit" name="submit" value="Submit"></td>
		</tr>

		

	</table>

	
</form>