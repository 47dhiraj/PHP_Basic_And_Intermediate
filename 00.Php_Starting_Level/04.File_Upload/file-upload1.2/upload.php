<?php
    require_once 'functions.php';
                                        //chown   ....   chmod   to change the file access authority
    if(isset($_POST['submit'])){
            // dd($_FILES);
            $file = $_FILES['image'];
            // $fileName = $_FILES['image']['name'];
            // $fileTmpName = $_FILES['image']['tmp_name'];
            $fileSize = $_FILES['image']['size'];
            // $fileError = $_FILES['image']['error'];
            // $fileType = $_FILES['image']['type'];

            if($fileSize > 5 * 1024 * 1024) // 5 MB
            {
                $error = "Your file is too large!"; 
            }

            else
            {
                $exploded=explode(".", $_FILES['image']['name']); //explode keyword le image name ko . batw file name lai tukryauxa
                $extension=end($exploded); //end keyword le chai $exploded ko . paxi ko extension lai capture garna help garxa
                move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.md5($_FILES['image']['name']).".".$extension);//md5 ley image ko original nam change garne 
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
    <form method="POST" action="upload.php" enctype="multipart/form-data">
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