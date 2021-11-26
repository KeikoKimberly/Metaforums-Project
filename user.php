<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="friends">
        <?php
            echo "<a href='friendsprofile.php?pid=".$friend_row['userid']."'>";
            echo $friend_row['username'];
            echo "</a>";
        ?>
    </div>
</body>
</html>