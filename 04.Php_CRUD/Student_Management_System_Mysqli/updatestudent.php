<?php

    session_start();
	include 'dbcon.php';

	if(!$_SESSION['uid'])     
    {
        header('Location: login.php');       
    }

?>


<h4><a href="admindash.php" style="float:left; margin-left: 10px;  font-size: 20px;">Back</a></h4>

<h4><a href="logout.php" style="float:right; margin-right: 10px;  font-size: 20px;">Logout</a></h4>

<table align="center">
	
	<form action="updatestudent.php" method="POST">
		<br><br>
		<tr>
			<th>Enter Standerd: </th>
			<td><input type="number" name="standerd" placeholder="Enter Standerd" required="required"></td>

			<th>Enter Rollno: </th>
			<td><input type="text" name="rollno" placeholder="Enter Rollno" required="required"></td>

			<td colspan="2"><input type="submit" name="submit" value="Search"></td>
		</tr>
	</form>

</table><hr><br>

<table align="center" width="70%" border="1" style="margin-top: 10px;">
	<tr style="background-color: #000; color: #fff;">
		<th>No.</th>
		<th>Image</th>
		<th>Name</th>
		<th>Rollno</th>
		<th>Edit</th>
		
	</tr>
<?php

	if(isset($_POST['submit']))
	{	

	$standerd = $_POST['standerd'];
	$rollno = $_POST['rollno'];

    $sql = "SELECT * FROM student WHERE rollno='$rollno' AND standerd='$standerd' ";
    $result = mysqli_query($con, $sql);
    

    if(mysqli_num_rows($result) < 1)
	{
    	echo "<tr ><td align='center' colspan='12'> No Records Found !!</td></tr>";
    }

    else 
	{
		
		$count = 0;
		while ($row = mysqli_fetch_assoc($result))
		{
		$count++;
?>
		<tr>
	    <td> <?php echo $count;?> </td>
	    
	    <td align="center"><img src="images/<?php echo $row['image']; ?>" style="max-width: 100px;  max-height: 100px;"></td>

	    <td> <?php echo $row['name'];?> </td>

	    <td> <?php echo $row['rollno'];?> </td>

	    <td><a href="updateform.php? sid=<?php echo $row['id'];?>"> Edit</a></td>

	    
		</tr>

	<?php 
	}
	?>


	
	</table>


<?php
    }


	}


	else
	{

	$sql='select * from student';
    $result = mysqli_query($con, $sql);


   	$count = 0;
	while ($row = mysqli_fetch_assoc($result))
	{
	$count++;
?>

		<tr>
	    <td> <?php echo $count;?> </td>
	    
	    <td align="center"><img src="images/<?php echo $row['image']; ?>" style="max-width: 100px;  max-height: 100px;"></td>

	    <td> <?php echo $row['name'];?> </td>

	    <td> <?php echo $row['rollno'];?> </td>

	    <td><a href="updateform.php? sid=<?php echo $row['id'];?>"> Edit</a></td>

	    
		</tr>
	<?php
	}
	?>


	
	</table>
<?php	

	}
	

?>





	

	