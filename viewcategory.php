<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to Metaforums</h1>
    <a href="login.php">Login</a>
    <br><br>
    <a href="signUp.php">SignUp</a>
    <br><br>

    <?php
    include("function.php");
    $conn = setUpDBConnection();
    $cid = $_GET['cid'];
    $sql = "SELECT id FROM category WHERE id='".$cid."' LIMIT 1";
    $res = mysqli_query($conn,$sql);

    if($cid == 1) {
        echo "<h3>Game Category Posts : </h2>";
        echo "<br>";
    } else if($cid == 2){
        echo "<h3>Education Category Posts : </h3>";
        echo "<br>";
    } else {
        echo "<h3>Funfact Category Posts : </h3>";
        echo "<br>";
    }

    if(mysqli_num_rows($res)==1){
        $sql2 = "SELECT * FROM posts WHERE category='".$cid."' ORDER BY id DESC";
        $res2 = mysqli_query($conn,$sql2);

            while($row = mysqli_fetch_assoc($res2)) {
            $userid = $row['userid'];
            $sql3 = "SELECT username FROM account WHERE userid='$userid'";
            $res3 = mysqli_query($conn,$sql3);
            $row2 = mysqli_fetch_assoc($res3);
            
                include("view.php");
            }
    }
    ?>   
     
     <a href="homepage.php">Back</a>
</body>
</html>