<h1 align="center">

<?php

session_start();

if (isset($_SESSION['uname'])) 
{
	echo "Welcome" .$_SESSION["uname"]. "!!"; ?>

</h1>	<br><br><br><br><br>


<a href="logout.php">Log out</a>

<?php 
}  

else
	echo "You are not logged in";
?>






