<?php
// include("database.php");
if(isset($_POST['submit'])){
    if(isset($_FILES['imageup'])){
        $image_name = $_FILES['imageup']['name'];
        $image_tmp = $_FILES['imageup']['tmp_name'];
        move_uploaded_file($image_tmp,'images/'.$image_name);
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="imageup.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="imageup" >
    <input type="submit" value="submit" name="submit">
    </form>
    
</body>
</html>