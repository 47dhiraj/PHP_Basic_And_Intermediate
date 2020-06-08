<?php

    session_start();
    if(!$_SESSION['active'])     //yedi session active chaina vane vaneko
    {
        header('Location: login.php');       //session active navaye, login.php mai redirect gardine 
    }

    $username= $_SESSION['username'];

    if(isset($_POST["logout"])) // yedi logout button press gareko xa vani 
    {
        header("location: logout.php");  //logout button press gareko xa vani, logout.php ma redirect gardine
    }

    if(isset($_POST["userlist"])) // yedi logout button press gareko xa vani 
    {
        header("location: user-list.php");  //logout button press gareko xa vani, logout.php ma redirect gardine
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADMIN</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <div>
            Welcome to the Admin page !
        </div>
        
        <form method= "POST" action="admin.php"> <!--form ko action pani yehi same page ma gareko-->

            <input type="submit" name="userlist" value="userlist">

            <input type="submit" name="logout" value="Logout">

        </form>
       
   
</body>
</html>
