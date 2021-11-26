<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="home.php" style="text-decoration:none"><h1>Metaforums</h1></a>
<h3>Your Profile : </h3>
<?php
session_start();
include("function.php");
include ("postclass.php");
include ("userclass.php");

$conn = setUpDBConnection();

$userid = $_SESSION["id"];

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
} else if($row['role']==2){
    $role = 'Moderator';
}

if($activecategory == 0){
    $active='You still have 0 post';
} else if($activecategory == 1) {
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


<div id="postbar">
<h3>All Recent Threads : </h3>
    <?php
    $post1 = new Post();
    $post2 = $post1->get_allposts();
    if($post2){
        foreach($post2 as $row){
            $post3 = new User();
            $row_post = $post3->get_alluser();
            $row_user = $post3->get_user($row['userid']);
            $row_account = $post3->get_data($row['userid']);
            
            echo "<a href='postdetail.php?cid=".$row['id']."'>"; echo "See this post : "; 
            echo "<section>";
            echo $row['post'];
            echo "&emsp;"; echo"by : ";
            echo $row_account['username'];
            echo "<br><br>";
            echo "</section>";
            echo "</a>";
        }
    }
    
    ?>
<br><br>
<a href="homemoderator.php">Back to Home</a>

</body>
</html>
