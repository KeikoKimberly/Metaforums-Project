<?php 
    session_start();
    include("function.php");
    include ("postclass.php");
    include ("userclass.php");
    
    $conn = setUpDBConnection();
    $postid= $_GET['cid'];
    // $userid = $_SESSION["id"];
    
    if($_SERVER['REQUEST_METHOD']=="POST") {
        $moderate = $_POST['md'];
        $mdid = $_POST['userid'];

        $sql = "SELECT email FROM account WHERE userid='$mdid'";
        $sql1 = "SELECT username FROM account WHERE userid = '$mdid'";
        $res1 = mysqli_query($conn,$sql1);
        $name = mysqli_fetch_assoc($res1);
        $res = mysqli_query($conn,$sql);
        $email = mysqli_fetch_assoc($res);

        if($moderate == '1') {
        include("pardoning.php");

        } else if($moderate == '2') {
            $y = "SELECT category FROM posts WHERE id='$postid'";
            $m = mysqli_query($conn,$y);
            $lp = mysqli_fetch_assoc($m);

            $op = $lp['category'];

            include("silencing.php");
        } else if($moderate == '3') {
            include("banning.php");
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <form action="" method="POST">
        <input type="radio" id="md" name="md" value="1">
        <label for="pardoning">Pardoning</label><br>
        <input type="radio" id="md" name="md" value="2">
        <label for="silencing">Silencing</label><br>
        <input type="radio" id="md" name="md" value="3">
        <label for="banning">Banning</label><br>
        <label for="userid">UserID</label>
        <input type="text" name="userid"> <br>
        <input type="submit" id="moderatebutton" value="Submit">
    </form>

    <?php 
    $o = "SELECT * FROM account WHERE abuse = 1";
    $t = mysqli_query($conn,$o);
    
        while($k = mysqli_fetch_assoc($t)){
            $id = $k['userid'];
            $name = $k['username'];
            $time = $k['time'];

            $result = time_diff($time);
            if($result > '3'){
                $v = "UPDATE account SET status = '1', silent = '0' WHERE userid='$id'";
                $c = mysqli_query($conn,$v);
            }

                echo "<br>";
                echo $id; echo"&emsp;"; 
                echo $name; echo"&emsp;";
                echo $time;
                echo "<br>";

            }
    ?>

    <?php echo "<br>"; echo"<a href='postdetailmod.php?cid=".$postid."'>"; echo"Back"; echo"</a>" ?>
</body>
</html>