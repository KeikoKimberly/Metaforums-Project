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

if($result < '5'){
    if(isset($_GET['cid'])) {
        $sql = "DELETE FROM posts WHERE id='$postid'";
        $res = mysqli_query($conn,$sql);

        echo mysqli_affected_rows($conn);
    }
} else {
    echo "You can't no longer delete this post";
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
    <h1>Post has been deleted</h1>
    
    <a href="homemoderator.php">Back to Home</a>
</body>
</html>