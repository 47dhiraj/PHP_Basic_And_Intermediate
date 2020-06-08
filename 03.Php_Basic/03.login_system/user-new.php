<?php 
    session_start();
    if(!$_SESSION['active'])     
    {
        header('Location: login.php');       
    }

    require_once'user_model.php';
    
    if(isset($_POST['save_button']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
        $retyped_password =$_POST['retyped_password'];

        if($password ==  $retyped_password)
        {
            $user_model = new UserModel();
            $rows_affected = $user_model->insert($username, $password);

            if($rows_affected>0)
            {
                header('Location: user-list.php');
            }

        }
        else
        {
            $error= "Password does not match";
        }
    }

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>NEW USER </h1>
    
    <form method="POST" action="user-new.php">
        <label>
            Username: <input type="text" name="username">

        </label>
        <label>
            Password: <input type="password" name="password">
        </label>
        <label >
            Retype Password: <input type="password" name="retyped_password">
            <?php if (isset($error)):?>
                <span><?php echo $error;?></span>
            <?php endif;?>
        </label>
        <input type="submit" value="Save" name="save_button">
    </form>
</body>
</html>