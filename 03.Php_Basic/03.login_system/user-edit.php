<?php
    session_start();
    if(!$_SESSION['active'])     
    {
        header('Location: login.php');       
    }

    require_once 'user_model.php';

    $user_model= new UserModel();

    if(!isset($_POST['save_button']))
    {
        $id=$_GET['id'];                // value from url parameter
        $user= $user_model->get_by_id($id);
        $username= $user['username'];
    }

    else
    {
        $id= $_POST['id'];              // value from hidden field
        $username=$_POST['username'];
        $user_model->update($id, $username);
        header('location: user-list.php');
    }
    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form method="POST" action="user-edit.php" >
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label>
            Username: <input type="text" name="username" value="<?php if(isset($username)) echo $username;?>">
        </label>
        <input type="submit" value ="Save" name="save_button">
    </form>
</body>
</html>