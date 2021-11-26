<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="post">
        <?php
        
        echo $row['post']; 
        echo "&emsp; by : ";
        echo $row2['username'];
        echo "&emsp;";
        echo $row['date'];
        echo "<br><br>";

    ?>
    </div>
</body>
</html>