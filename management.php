<?php
session_start();
include("function.php");
include ("postclass.php");
include ("userclass.php");

$conn = setUpDBConnection();
// $postid = $_GET['cid'];
$userid = $_SESSION["id"];

if(isset($_POST['change'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $emailsql = mysqli_query($conn,"SELECT email FROM account WHERE email='$email'");
        
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "<p>Invalid email format</p>"; 
        }
        else if(mysqli_fetch_assoc($emailsql)) {
            $error .= "<p>Email is already taken</p>";
        }
        else if(strlen($password) < 8){
            $error .= "<p>Password must be at least 8 characters long";
        } 
        else if($password != $password2 ) {
            $error .= "<p>Please correctly confirm the password</p>";
        } else {

            //form is valid, connect to database
            if(updateInfo($_POST)>0){
                $vkey = md5(time().$username);

                $to = $email;
                $subject = "Email verfication";
                $message = "<a href='http://localhost/Project3Keiko/verify.php?vkey=$vkey'>Verified changed account information</a>";
                $headers = "From: harrissabastian@gmail.com \r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                mail($to,$subject,$message,$headers);
                

                header('location:tes.php');
            }
            else {
                echo "<script>
                alert('Gagal!');
            </script>";
            }
        }
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
    <form action="" method="POST">
        <table>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
               
            </li>
            <li>
                <label for="password">New Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Confirm New Password</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="change">Submit Changes</button>
            </li>
        </table>
    </form>
    <br><br><br>
    <form action="changeusername.php" method="POST">
            <li>
                <label for="username">Display Name : </label>
                <input type="text" name="username" id="username">
                <p>You can only change your display name once a month</p>
                <button type="submit" name="changeusername">Save</button>
            </li>
    </form>
    <br><br>
    <?php echo "<a href='deleteacc.php?cid=".$userid."' id='delete'>"; echo "Delete Your Account"; echo"</a>"; ?>
    <br><br>
    <a href="profile.php">Back to Profile</a>
</body>
</html>