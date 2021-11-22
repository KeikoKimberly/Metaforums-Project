<?php
session_start();

    if( !isset($_SESSION["loginn"])) {
        header("Location: homepage.php");
        exit;
    }
    include("function.php");
    include ("postclass.php");
    include ("userclass.php");
    $conn = setUpDBConnection();

    $userid = $_SESSION["id"];
    $verr = $_SESSION["ver"];
    // echo ($userid);

    $q = "SELECT status FROM account WHERE userid='$userid'";
    $r = mysqli_query($conn,$q);
    $enable = mysqli_fetch_assoc($r);

    if(($_SERVER['REQUEST_METHOD']=="POST") && ($enable['status'] == 1) && ($verr == 1)) {
        $post = new Post();
        $result = $post->createpost($verr,$userid, $_POST);

        if($result == ""){
            header("Location: home.php");
            die;
        } else {
            echo "<br> Something errors occured <br>";
            echo $result;
        }
    } else if (($_SERVER['REQUEST_METHOD']=="POST") && ($enable['status'] == 2)){
        echo  "You are in pardoning mode";
    } else if(($_SERVER['REQUEST_METHOD']=="POST") && ($enable['status'] == 3)) {
        $si = "SELECT silent FROM account WHERE userid='$userid'";
        $yy = mysqli_query($conn,$si);
        $ss = mysqli_fetch_assoc($yy);

        $ctgy = $ss['silent'];
        if($_POST['ctg']==$ctgy) {
            echo "You're unable to post thread in this category for awhile";
        } else {
            $post = new Post();
        $result = $post->createpost($verr,$userid, $_POST);

        if($result == ""){
            header("Location: home.php");
            die;
        } else {
            echo "<br> Something errors occured <br>";
            echo $result;
        }
        }
    }

    $post1 = new Post();
    $post2 = $post1->get_allposts();

    //collect posts
    $userid = $_SESSION["id"];
    $post = new Post();
    $posts = $post->get_posts($userid);

    //collect friends
    $userid = $_SESSION["id"];
    $user = new User();
    $friends = $user->get_friends($userid);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
#logout, #create{
    background-color : grey;
    padding : 10px;
    color : black;
}
</style>
<body>
    <br><br><br><br>
    <a id="logout" href="logout.php">Logout</a>
    <h1>welcome to Metaforum homepage</h1>
    <!-- friends area -->
    <div id="friends_bar">
        <h2>Friends :</h2>
        <?php
        if($friends) {
            foreach($friends as $friend_row) {
                include ("user.php");
            }
        }

        ?>
    </div>

    <!-- Post bar -->
    <div id="postbar">
    <h2>All Recent Threads : </h2>
        <?php
        if($post2){
            foreach($post2 as $row){
                $post3 = new User();
                $row_post = $post3->get_alluser();
                $row_user = $post3->get_user($row['userid']);
                $row_account = $post3->get_data($row['userid']);
                
                $postid = $row['id'];
                include("post2.php");
            }
        }
        
        ?>

    <h3>Your Threads : </h3>
        <?php
        if($posts) {
            foreach($posts as $row){
                $user = new User();
                $row_user = $user->get_user($row['userid']);
                $row_account = $user->get_data($row['userid']);
                $row_category = $user->get_category($row['id']);
               

               include("post1.php");
            }
        }
        ?>
    <br>
    <a href="create.php" id="create">Create Post</a>
    <br><br><br>
    <a href="profile.php" id="create">Your Profile</a>
    <br><br><br>
    <a href="management.php" id="create">Account Management</a>
    </div>  

</body>
</html>