<?php
/* SQL INJECTION ' or 1=1 -- (space)*/

    require_once 'user_model.php';
    //When u use rquire_once, user_model.php file vetayne vane tala ko code run hudaina, but include_once ma run huncha

    session_start();
   
    if(isset($_POST['login_button']))       //If LOGIN button is pressed yo if vitra ko code run garni vaneko
    {     
        $username=$_POST['username'];
        $password=$_POST['password'];

        if($username !=NULL && $password != NULL)   
        //user and password valdation check gareko i.e khali chaina vane matra if vitra ko code run gareko
        {
            $user_model=new UserModel();        //UserModel class ko object $user_model garayeko

            if($user_model->login($username,$password))  
            //$user_model object le UserModel class vitra ko login vanni function call gareko 
            // safal login vayo vani chai yo if vitra ko code run hunxa    
            {
                $_SESSION['username']=$username;
                $_SESSION['active'] = 1; 
                //Log in vayera admin.php ma jada,active session xa vanera janauna ko lagi $_SESSION['active']=1 gareko 

                header('Location: admin.php'); //admin.php ma redirect gareko
            }
            else
            {
                $error_msg= "Wrong attempt! probably not an Admin.";
            }
        }

        else
        {
            $error_msg="Please Enter username and password !";
        }

    }      
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <fieldset>
    <legend>LOGIN</legend>
    <div class="login_form">
        
        <form method="POST" action="login.php">
            <!-- aciton="login.php" vanna le yehi same page ma yo form ko action xa vaneko -->

            <label>
                Username: <input type="text" name="username" value="<?php if(isset($username)) echo $username ;?>"> 
            </label>
            <label>
                Password: <input type="text" name="password"> 
            </label>
            <input type="submit" name="login_button" value="Login">

        </form>
    </div>

    </fieldset>

    <?php if(isset($error_msg)): ?>

        <p><?php echo $error_msg;?></p>

    <?php endif; ?>

</body>
</html>