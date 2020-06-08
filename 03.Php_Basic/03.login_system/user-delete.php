<?php
    session_start();
    if(!$_SESSION['active'])     
        {
            header('Location: login.php');       
        }

    require_once 'user_model.php';

    if(!isset($_POST['submit_button'])) 
    {
        $id = $_GET['id']; // value from url parameter
    }
    else 
    {
        $id = $_POST['id']; // value from hidden field
        
        $user_model = new UserModel();

        if($user_model->delete($id)) 
        {
            header('location: user-list.php');
        }

        else 
        {
            $error = 'User could not be deleted.';
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Delete User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Delete User</h1>
    
    <?php if(isset($error)): ?>
        <p style="color: red"><?php echo $error; ?></p>
    <?php endif; ?>

    <p>Are you sure you want to delete this user?</p><br>

    <form method="POST" action="user-delete.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <input type="submit" value="Yes" name="submit_button"><br>

        <br><a href="user-list.php" class="button">No</a>
    </form> 
</body>
</html>