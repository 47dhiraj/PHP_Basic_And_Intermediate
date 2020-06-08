<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $username_length=strlen($username);
        $password_length=strlen($password);


        if($username == NULL && $password == NULL) {
            $error_message = "Enter  username or password";
        }
        else{
           
            if($username_length>=5 && $password_length >= 10 && preg_match('/[A-Z]/', $password)
             && preg_match('/[a-z]/', $password) && preg_match('/[0-9]/', $password) &&  
             preg_match('/[\'^!?$%&*()}{@#~?><>,|=_+?-]/', $password)){
               header('Location:admin.php');
             }

             else{
                 if($username_length < 5 ){
                   $user_error="Username must be atleast 5 characters ..";
                }
                if($password_length < 10){
                   $password_error="Password must be atleast 10 characters..";
                 }
                 elseif(!preg_match('/^[A-Z]/',$password) or !preg_match('/^[a-z]/',$password) or !preg_match('/[0-9]/', $password) or !preg_match('/^[\'^!�$%&*()}{@#~?><>,|=_+�-]/', $password) )
                 {

                 $upper_error="At least one uppercase ,one lowercase and one punctuation character required in password . ";
                }
                else
                {
                    echo "";
                }
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Login </title>
</head>

<body>
    
        <div >
            <form method="POST" action="login.php" style="margin:170px 0px 0px 530px;" onsubmit="return bingo();" >

                <label>
                    Username :
                    <input type="text" name="username" id="username" value="<?php if(isset($username)) echo $username ;?>" placeholder="username" autocomplete="off"> <br>
                    <span id="nameerror"/> 
                    <?php if(isset($user_error)): ?>
                <p><?php echo $user_error; ?></p>
                <?php endif; ?>
                </label><br><br>
        
                <!-- <label>
                    Email 
                    <input type="text" name="email" id="email" placeholder="abc@gmail.com" autocomplete="off"> 
                    <span id="emailerror"/>
                </label> -->

                <label>
                    Password :
                    <input type="text" name="password" id="password" placeholder="password" autocomplete="off"><br>
                    <span id="passworderror"/>
                    <?php if(isset($password_error)): ?>
                    <p><?php echo $password_error; ?></p>
                    <?php endif; ?>
                    <?php if(isset($upper_error)): ?>
                    <p><?php echo $upper_error; ?></p>
                    <?php endif; ?>
                </label><br><br>

                <input type="submit" name="login" value="Login" style="margin-left: 75px;"><br><br>

                

            </form>   
        </div>
       
        <script src="javascript.js"></script>   

            <?php if(isset($error_message)): ?>
                <p align="center";><?php echo $error_message; ?></p>
                <?php endif; ?> 

</body>
</html>