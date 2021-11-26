<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    a {
        text-decoration: none;
    }
</style>
<body>

    <h4>Posted <?php echo"by ";echo $row_account['username'];?> : </h4>

    <section>
    <?php
    $conn = setUpDBConnection();
    if( $row['verified']==1) {
        $ver = "Verified";
    } else {
        $ver = "Not Verified";
    }
    $id = $row['id'];
    $sql = "SELECT view FROM posts WHERE id ='$id'";
    $res = mysqli_query($conn,$sql);
    $view = mysqli_fetch_assoc($res);
    echo "<a href='postdetailmod.php?cid=".$row['id']."'>"; echo "See this post : "; 
    echo "<section>";
    echo $row['post']; 
    echo "&emsp;";
    echo $row['postid'];
    echo "&emsp;";
    echo $ver;
    echo "&emsp;";
    echo"view by : ";
    echo $view['view'];
    echo "</section>";
    echo "</a>";
    ?>
    </section>

<br><br>
</body>
</html>