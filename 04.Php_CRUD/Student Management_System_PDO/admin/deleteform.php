<?php

    session_start();
    if(!$_SESSION['active'])     
    {
        header('Location: ../login.php');       
    }

    include '../database.php';
	include '../adminmodel.php';


	$id=$_REQUEST['sid'];

	$adminmodel = new AdminModel();

	
    if($adminmodel->delete($id)) 
        {
            header('Location: deletestudent.php');
        }

    else 
        {
            $error = 'User could not be deleted.';
        }

?>	