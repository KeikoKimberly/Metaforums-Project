<?php
    session_start();
    include("function.php");
    include ("postclass.php");
    include ("userclass.php");

    $conn = setUpDBConnection();
    $postid = $_GET['cid'];
    $userid = $_SESSION["id"];

    if(isset($_GET['cid'])) {
        $sql = "DELETE FROM account WHERE userid='$userid'";
        $sql1 = "DELETE FROM posts WHERE userid='$userid'";
        $res = mysqli_query($conn,$sql);
        $res1 = mysqli_query($conn,$sql1);
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
    <h1>Your Account has been deleted</h1>
    <br><br>
    <a href="homepage.php">Go to Homepage</a>
</body>
</html>