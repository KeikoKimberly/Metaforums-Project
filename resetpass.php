<?php
session_start();

require 'function.php';

$conn = setUpDBConnection();

$error = NULL;

if(isset($_POST['reset'])) {
    $pass = mysqli_real_escape_string($conn,$_POST["pass"]);
    $pass2 = mysqli_real_escape_string($conn,$_POST["pass2"]);

    

    if(strlen($pass) < 8){
        $error .= "<p>Password must be at least 8 characters long";
    } 
    else if($pass != $pass2) {
        $error .= "<p>Please correctly confirm the password</p>";
    } else {
        $pass = md5($pass);
        $sql = "UPDATE account SET password='$pass'";
        $res = mysqli_query($conn,$sql);

        header('location: vpage.php');
    }
}
// else {
//     echo "error occured";
// }



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
        <label for="pass">New Password</label>
        <input type="text" name="pass">
        <label for="pass2">Confirm Password</label>
        <input type="text" name="pass2">
        <input type="submit" name="reset" value="Reset">
    </form>

    <?php
        echo $error;
    ?>
</body>
</html>