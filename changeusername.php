<?php
    session_start();
    include("function.php");
    $conn = setUpDBConnection();
    $userid = $_SESSION["id"];

    $sql = "SELECT time FROM account WHERE userid=$userid";
    $res = mysqli_query($conn,$sql);
    $time = mysqli_fetch_assoc($res);

    function time_diff($time) {
        date_default_timezone_set("Asia/Jakarta");
        $time1 = date_create($time);
        $time2 = date_create();

        $diff = date_diff($time2,$time1);
        
        return $diff->d;
        
    }

    $result = time_diff($time['time']);

    if((isset($_POST['changeusername'])) && ($result > '30')) {
        $username = $_POST['username'];

        $sql = "UPDATE account SET username='$username' WHERE userid='$userid'";
        mysqli_query($conn,$sql);

        // echo"Username has changed successfully";
        
    } else {
        echo "You can't change username under 30 days";
    }
    
    
    echo"<br>";
    echo "<a href='management.php'>Back to profile</a>";

?>