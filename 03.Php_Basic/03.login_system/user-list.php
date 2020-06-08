<?php
    session_start();
    if(!$_SESSION['active'])     
    {
        header('Location: login.php');       
    }

    require_once 'database.php';
    include_once'function.php';       //yo function.php lai yaha kina include garai rakheko

    $database= new Database();

    $sql='select * from users';
    $rows= $database->fetchAll($sql);

    if(isset($_POST["logout"])) 
    {
        header("location: logout.php");  
    }

    
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>User List</title>
    <link rel="stylesheet" href="style.css">

    <style>
        table, th, td{
            border:1px solid-black;
            border-collapse: collapse;
            padding: 5px;
        }
        
    </style>
    
</head>

<body>
    <h1>User List</h1>
    <a class= 'button' href='user-new.php'>NEW USER</a> 
    <!-- NEW USER button ma click garyo vani user-new.php ma janxa-->

    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th colspan="2">Action</th>
        </tr>
        <?php foreach($rows as $row):?>
            <tr>
                <td> <?php echo $row['id'];?> </td>
                <td> <?php echo $row['username'];?> </td> 
                <td>
                    <a href="user-edit.php? id=<?php echo $row['id'];?>" class="button"> 
                        EDIT
                    </a> 
                    <!--user-edit.php ko link ma id value pani pathako xa to make EDIT on tha particular id record-->
                </td>

                <td>
                    <a href="user-delete.php?id=<?php echo $row['id']; ?>" class="button">
                        Delete
                    </a> 
                </td>

                

            </tr>

             <?php endforeach;?>

    </table>
            <form method= "POST" action="admin.php">
                <input type="submit" name="logout" value="Logout">
            </form>

    
</body>
</html>