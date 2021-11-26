<?php
session_start();
    include("function.php");
    include ("postclass.php");
    include ("userclass.php");
    
    $conn = setUpDBConnection();
    $postid = $_GET['cid'];
    $userid = $_SESSION["id"];
    $post = new Post();
    $posts = $post->get_postdetail($postid);
    
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $comment = $_POST['reply'];

        $sql = "INSERT INTO comment (comment,postsid,userid) VALUES ('$comment','$postid','$userid')";
        $res = mysqli_query($conn,$sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Post detail</h1>
    <h3>Thread : </h3>
    <?php 
        if($posts) {
            foreach($posts as $rows){
            $user = new User();
            $row_user = $user->get_userpostdetail($postid);

            include("thread.php");
            }
        }

    ?>

    <h3>Replies : </h3>
    <?php
        $sql1 = "SELECT comment FROM comment WHERE postsid='$postid'";
        $res1 = mysqli_query($conn,$sql1);
        while($row1 = mysqli_fetch_assoc($res1)){
        $reply = $row1['comment'];
        echo "<br>";
        echo $reply;
        }
    ?>
    <?php
    $threadid = $rows['userid'];
    $sql4 = "SELECT * FROM account WHERE userid='$threadid'";
    $res4 = mysqli_query($conn,$sql4);
    $row4 = mysqli_fetch_assoc($res4);
    ?>
    <br><br>
    <p>Creating Reply to <?php echo $row4['username']; ?> : </p>
    <form action="" method = "post">
    <textarea name="reply" id="reply" cols="80" rows="2"></textarea>
    <input id="submit" type="submit" value="Reply">
    <!-- <input type="submit" value="like" name="like"> -->
    </form>

        <?php
    echo "<a href='moderating.php?cid=".$rows['id']."'>"; echo "Moderating"; echo"</a>"; 
        ?>

    <!-- <?php
    echo "<a href='like.php?cid=".$rows['id']."' id='like'>"; echo "LIKE"; echo"</a>"; 
    ?> -->
    <br><br>
    <a href="homemoderator.php">Back</a>
</body>
</html>

