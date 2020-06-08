<?php


    require_once 'adminmodel.php';
    

    session_start();

    if(isset($_POST['login']))       
    {     
        $username=$_POST['uname'];
        $password=$_POST['pass'];

        if($username !=NULL && $password != NULL)   
        
        {
            $adminmodel =new AdminModel();        

            if($adminmodel->login($username,$password))  
          
            {
                $_SESSION['username']=$username;
                $_SESSION['active'] = 1; 
               
                header('Location: admin/admindash.php'); 
            }
            else
            {
?>
                <script>
                    alert('Username or Password not match !! Probably not an admin.');
                    window.open('login.php', '_self');
                </script>

<?php
            }


        }

        else
        {
            $error_msg="Please Enter username and password !";
        }

    }      
?>



<!DOCTYPE html>
<html lang="en_us">
<head>
	<meta charset="utf-8">
	<title>Admin Login</title>
</head>
<body>

    <h4><a href="index.php" style="float:left; margin-left: 10px;  font-size: 20px;">Back</a></h4>

	<h1 align="center"> Admin Login </h1>

	<form action="login.php" method="POST">
		
		<table align="center">

			<tr>
				<td> Username</td><td><input type="text" name="uname" required></td>
			</tr>

			<tr>
				<td> Password</td><td><input type="Password" name="pass" required></td>
			</tr>

			<tr>
				<td colspan="2" align="center"> <input type="submit" name="login" value="Login"></td>
			</tr>
			
		</table>

	</form>

	<?php if(isset($error_msg)): ?>

        <p><?php echo $error_msg;?></p>

    <?php endif; ?>

</body>
</html>