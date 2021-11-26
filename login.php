<?php 
session_start();

if(isset($_SESSION["loginn"])) {
    header("Location: home.php");
    exit;
}

$error = NULL;

require 'function.php';

$conn = setUpDBConnection();
   
if( isset($_POST['login'])) {
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $resultset = $conn->query("SELECT * FROM account WHERE username = '$username' AND password='$password' LIMIT 1");

    if($resultset->num_rows != 0) {
        $row = $resultset->fetch_assoc();
        $role = $row['role'];
        $verified = $row['verified'];
        $email = $row['email'];

        if(($role == 1) && ($verified==1)){
            //set session
            $_SESSION["loginn"] = true;
            $_SESSION["id"] = $row['userid'];
            $_SESSION["ver"] = $verified;
            $error = "your account has been verified and login success";

            header("Location: home.php");
        } else if($role == 2 && ($verified==1)){
            $_SESSION["loginn"] = true;
            $_SESSION["id"] = $row['userid'];
            $_SESSION["ver"] = $verified;
            $error = "your account has been verified and login success";

            header("Location: homemoderator.php");
        }
        else {
            $error = "This account has not been yet verified";
        }

    } else {
        $error = "Username does not exist or Invalid password";
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
    <h1>Log In</h1>
    <form method="POST" action="">
        <table>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="login">Log In</button>
            </li>
        </table>
    </form>
    <a href="forgotpass.php">forgot password</a>
    <br><br>
    <a href="homepage.php">Back</a>
<?php 
    echo $error ;
?>
</body>
</html>