<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     $q = "UPDATE posts SET view=view+1 WHERE id='$postid'";
     $upd = mysqli_query($conn,$q);
     $qu = "SELECT view FROM posts WHERE id='$postid'";
     $view = mysqli_query($conn,$qu);
     $view1 = mysqli_fetch_assoc($view);
    echo $row_user['post']; echo"&emsp;";
    echo"view by : ";
    echo $view1['view'];
    ?>
</body>
</html>