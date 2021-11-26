<?php
session_start();

    include("function.php");
    // $userid = $_SESSION["id"];
    $conn = setUpDBConnection();
    // include ("postclass.php");
    // include ("userclass.php");
    // require 'post2.php'

    // $page = $_SERVER['PHP_SELF'];
    // $sec = "10";

// mysqli_query($conn,"INSERT INTO posts(userid, postid, post) VALUES('555','3773','halloo keiko')");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'"> -->
</head>
<body>
    
    <?php 
    
        // date_default_timezone_set("Asia/Jakarta");
        // echo "The time is ".date("h:i:s");

        echo "Your account has been verified, you may now log in"; echo"<br><br>";
        echo "<a href='login.php'>LoginHere</a>";
        // $s = "INSERT INTO pardoning(userid) VALUES ('$userid')";
        // $r = mysqli_query($conn,$s);
       


        // $sql1 = "SELECT time FROM pardoning WHERE userid='$userid'";
        // $res1 = mysqli_query($conn,$sql1);
        // $time = mysqli_fetch_assoc($res1);
        
        // function time_diff($time) {
        //     date_default_timezone_set("Asia/Jakarta");
        //     $time1 = date_create($time);
        //     $time2 = date_create();
        
        //     $diff = date_diff($time2,$time1);
            
        //     return $diff->i;
        // }
        
        // $result = time_diff($time['time']);

        // echo "<br><br>";
        // echo $result;
        // echo "<br><br>";

        // include("comment.php");
        // if($result < '5'){
        //     echo "yey jadi";
        // }
        
        ?>
            <!-- <section>
        <h2>Article title</h2>
        
        <p>Short description</p>
            </section>
    </a> -->
        
    

    <?php
    // $time =  date_create('06:47:26');
    // $result = time_diff(date_create('06:47:26'));
    // $conn = setUpDBConnection();
    // $sql = "SELECT time FROM account WHERE userid=$userid";
    // $res = mysqli_query($conn,$sql);
    // // $time = '2021-11-06 09:15:35';
    // $time = mysqli_fetch_assoc($res);
    // $result = time_diff($time['time']);
    // echo $result;
    // // 2021-11-17 06:47:26

    ?>
        <br><br>
    
</body>
</html>