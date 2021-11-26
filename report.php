<?php
session_start();
include("function.php");
include ("postclass.php");
include ("userclass.php");

$conn = setUpDBConnection();
$postid = $_GET['cid'];

$c = "SELECT * FROM posts WHERE id = '$postid'";
$i = mysqli_query($conn,$c);
$e = mysqli_fetch_assoc($i);

$userid = $e['userid'];

$r = "UPDATE account SET abuse = 1 WHERE userid='$userid'";
$q = mysqli_query($conn,$r);

$p = "SELECT * FROM account WHERE role = 2";
$o = mysqli_query($conn,$p);
$t = mysqli_fetch_assoc($o);


    $to = $t['email'];
    $subject = "Reporting Abuse Content";
    $message = "Dear Moderator, ";
    $message .= "There is an inappropriate content in the Metaforums discussion.";
    $message .= "Please handle it.";
    $message .= "Thankyou for your understanding";
    $headers = "From: harrissabastian@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


    mail($to,$subject,$message,$headers);


echo"You have reported this post";

echo "<br><a href='postdetail.php?cid=".$postid."''>Back";






?>