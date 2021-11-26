<?php
session_start();
include("function.php");
include ("postclass.php");
include ("userclass.php");

$conn = setUpDBConnection();
$postid = $_GET['cid'];
$userid = $_SESSION["id"];

$sql1 = "SELECT date FROM posts WHERE id=$postid";
$res1 = mysqli_query($conn,$sql1);
$time = mysqli_fetch_assoc($res1);

$result = time_diff($time['date']);

if($result < '5') {
if($_SERVER['REQUEST_METHOD']=="POST") {
    $update = $_POST['post'];
    
    $sql = "UPDATE posts SET post='$update' WHERE id='$postid'";
    $res = mysqli_query($conn,$sql);

    header("Location: home.php");
    } 
}else {
    echo "You can't edit your post after 5 minutes posted";
    echo "<br><br>";
    echo "<a href='homemoderator.php'>"; echo"Back to home"; echo"</a>";
    exit;

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
    <h3>Editing Post</h3>
    <form method = "post" action="">
        <textarea name="post" id="" cols="30" rows="10"></textarea>
        <input id="post_button" type="submit" value="post">
        
    </form>

    <a href="homemoderator.php">Back to home</a>
</body>
</html>