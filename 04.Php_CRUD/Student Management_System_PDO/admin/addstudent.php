<?php

    session_start();
    if(!$_SESSION['active'])     
    {
        header('Location: ../login.php');       
    }

    $username= $_SESSION['username'];


    if(isset($_POST['submit']))
    {

    	require_once '../adminmodel.php';
    	require_once '../database.php';


    	$rollno = $_POST['rollno'];
    	$name = $_POST['name'];
    	$city = $_POST['city'];
    	$pcon = $_POST['pcon'];
    	$std = $_POST['standerd'];

    	$imagename = $_FILES['simg']['name'];
    	$tempname = $_FILES['simg']['tmp_name'];

    	move_uploaded_file($tempname, "../images/$imagename");



    	$adminmodel = new AdminModel();

    	$rows_affected = $adminmodel->insert($rollno, $name, $city, $pcon, $std, $imagename);


    	if($rows_affected>0)
        {
?>
			<script>
				alert('Student Added Successfully !!');
			</script>



<?php    
	
			//header('Location: admindash.php');

        }

        




    }



?>


<h4><a href="admindash.php" style="float:left; margin-left: 10px;  font-size: 20px;">Back</a></h4>

<h4><a href="../logout.php" style="float:right; margin-right: 10px;  font-size: 20px;">Logout</a></h4>

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

