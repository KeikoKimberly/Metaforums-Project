
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    #edit{
        background-color: Yellow;
    }
    #delete {
        background-color : pink;
    }
    a{
        color : black;
    }
</style>
<body>
    <div id="post">
        <?php
        if($row_category['category']==1){
            $ctg = "Game";
        } else if($row_category['category']==2){
            $ctg = "Education";
        } else {
            $ctg = "Fun Fact";
        }
        echo "<a href='editpost.php?cid=".$row['id']."' id='edit'>"; echo "Edit"; echo"</a>"; echo " || "; 
        echo "<a href='deletepost.php?cid=".$row['id']."' id='delete'>"; echo "Delete this post"; echo"</a>"; 
        echo"&emsp;";
        echo $row['post']; 
        echo"&emsp;"; echo"by ";
        echo $row_account['username'];
        echo"&emsp;";
        echo $ctg;
        echo"&emsp;";
        echo $row['date'];
        ?>
        <br><br>
    </div>
</body>
</html>