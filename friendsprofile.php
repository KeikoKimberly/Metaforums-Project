<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Friends Profile : </h1>
<?php
session_start();
include("function.php");
include ("postclass.php");
include ("userclass.php");

$conn = setUpDBConnection();
$userid = $_GET['pid'];

$sql = "SELECT * FROM account WHERE userid='$userid' LIMIT 1";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

$sql2 = "SELECT COUNT(id) AS 'count' FROM posts WHERE userid='$userid' ";
$result2 = mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);

$sql3 = "SELECT category, COUNT(category) as 'occ' FROM posts WHERE userid='$userid' GROUP BY 'category' ORDER BY 'occ' DESC LIMIT 1";
$result3 = mysqli_query($conn,$sql3);
$row3 = mysqli_fetch_assoc($result3);

$name = $row['username'];
$email = $row['email'];
$count = $row2['count'];
$activecategory = $row3['category'];

if($row['role']==1) {
    $role = 'User';
} if($row['role']==2) {
    $role = 'Moderator';
}

if($activecategory == 1) {
    $active = 'Game';
} else if($activecategory == 2){
    $active = 'Education';
} else if($activecategory == 3){
    $active = 'Funfact';
}


echo "Username : $name<br>";
echo "UserID : $userid<br>";
echo "Email : $email<br>";
echo "Role : $role<br>";
echo "Post : $count<br>";
echo "Active Category : $active";
?>
<br><br>
<a href="home.php">Back to Home</a>
</body>