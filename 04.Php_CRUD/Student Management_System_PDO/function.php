<?php
 	
 	function showdetails($standerd, $rollno)
 	{
 	
 	include 'adminmodel.php';
		

	$parameters=[               
        'rollno'=>$rollno
        ];

    $adminmodel = new AdminModel();

    $row =$adminmodel->get_by_rollno($rollno);



    if($row== true)
    {

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

















