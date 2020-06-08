<?php

    session_start();
    include 'dbcon.php';

    if(!$_SESSION['uid'])     
    {
        header('Location: login.php');       
    }


	
    $sql = "Delete FROM student  WHERE id = {$_REQUEST['sid']}";

    if(mysqli_query($con, $sql))
    {
        ?>

        <script>
                alert('Student Added Successfully !!');
                window.open('deletestudent.php', '_self');

        </script>

        <?php
    }

    else
    {
        echo "Sorry, Unable to Delete Student !!!";
    }

?>	

