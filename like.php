<?php

session_start();
    include("function.php");
    include ("postclass.php");
    include ("userclass.php");
    
    $conn = setUpDBConnection();
    $postid = $_GET['cid'];
    $userid = $_SESSION["id"];
   
   if(isset($_GET['cid'])) {
       $sql = "UPDATE posts SET likes=likes+1 WHERE id='$postid' ";
       $res = mysqli_query($conn,$sql);

    //    echo mysqli_affected_rows($conn);
    //    header("Location: postdetail.php");
   }
//    header("Location: postdetail.php");
?>
