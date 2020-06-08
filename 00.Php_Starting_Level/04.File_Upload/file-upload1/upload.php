<?php
    require_once 'functions.php';
                                        //chown   ....   chmod   to change the file access authority
    if(isset($_POST['submit'])){
            //dd($_FILES); yo line code le vaneko chai debug and die ho
            $file = $_FILES['image'];
            // $fileName = $_FILES['image']['name'];
            // $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            // $fileError = $_FILES['image']['error'];
            // $fileType = $_FILES['image']['type'];

            if($fileSize > 5 * 1024 * 1024) // image ko size greater than 5MB vayo vani k garni check gareko
            {
                $error = "Your file is too large!"; 
            }

            else
            {
                move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$_FILES['image']['name']);
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
</head>
<body>
    <h1>File Upload</h1>
    <form method="POST" action="upload.php" enctype="multipart/form-data">   <!--yo enctype="multipart/form-data" ko kam vaneko kei kura upload garne ho  yo form batw-->
    <label>
        Image:
        <input type="file" name="image"/>
    </label>

    <div>
         <input type="submit" name="submit"/>
    </div>
    <?php if(isset($error)): ?>
        <div>
            <?php echo $error;  ?>
        </div>

    <?php endif;?>

    </form>
</body>
</html>