<?php

    session_start();
    include 'dbcon.php';

	if(!$_SESSION['uid'])     
    {
        header('Location: login.php');       
    }


	if(!isset($_POST['submit']))
    {

        $id=$_GET['sid'];    

        $sql = "SELECT * FROM student WHERE id='$id' ";
    	$result = mysqli_query($con, $sql);

    	$row = mysqli_fetch_assoc($result);

        $rollno= $row['rollno'];
        $name=$row['name'];
        $city=$row['city'];
        $pcon=$row['pcont'];
        $std=$row['standerd'];
        $image=$row['image'];

    }

    else
    {
    	
    $id= $_POST['sid'];              
     
    $rollno = $_POST['rollno'];
	$name = $_POST['name'];
	$city = $_POST['city'];
	$pcon = $_POST['pcon'];
	$std = $_POST['standerd'];

	$imagename = $_FILES['simg']['name'];
	$tempname = $_FILES['simg']['tmp_name'];

	move_uploaded_file($tempname, "images/$imagename");

	$sql = "UPDATE student SET  rollno = '$rollno', name = '$name', city = '$city', pcont = '$pcon', standerd = '$std', image = '$imagename' WHERE id = '$id' ";


	if(mysqli_query($con, $sql))
        {
?>
			<script>
				alert('Student Updated Successfully !!');
			</script>

<?php

    	}

	}
   



?>


<h4><a href="updatestudent.php" style="float:left; margin-left: 10px;  font-size: 20px;">Back</a></h4>

<h4><a href="logout.php" style="float:right; margin-right: 10px;  font-size: 20px;">Logout</a></h4>

<form method="POST" action="updateform.php" enctype="multipart/form-data">

	<table align="center" border="1" style="width: 70%; margin-top: 40px;">

		<tr>
			<th>Roll No</th>
			<td><input type="text" name="rollno" value="<?php if(isset($rollno)) echo $rollno;?>" ></td>
		</tr>

		<tr>
			<th>Full Name</th>
			<td><input type="text" name="name" value="<?php if(isset($name)) echo $name;?>" ></td>
		</tr>

		<tr>
			<th>City</th>
			<td><input type="text" name="city" value="<?php if(isset($city)) echo $city;?>" ></td>
		</tr>

		<tr>
			<th>Parents Contact No</th>
			<td><input type="text" name="pcon" value="<?php if(isset($pcon)) echo $pcon;?>" ></td>
		</tr>

		<tr>
			<th>Enter Standerd:</th>
			<td><input type="number" name="standerd" value="<?php if(isset($std)) echo $std;?>"></td>
		</tr>


		<tr>
			<th>Image</th>
			<td><input type="file" name="simg" value=""></td>
		</tr>


		<tr>
			
			<td colspan="2" align="center"><input type="hidden" name="sid" value="<?php if(isset($id)) echo $id;?>" >

			<input type="submit" name="submit" value="Submit"></td>

		</tr>

	</table>
	

</form>

</body>
</html>

