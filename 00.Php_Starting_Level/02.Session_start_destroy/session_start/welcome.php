<h1 align="center">

<?php

session_start();

if (isset($_SESSION['uname'])) 

	echo "Welcome" .$_SESSION["uname"]. "!!";

else
	echo "You are not logged in";

?>

</h1>