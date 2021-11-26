<?php

require 'function.php';

$conn = setUpDBConnection();



if(isset($_POST['reset'])) {
    $email = $_POST['email'];
    $resultset = $conn->query("SELECT * FROM account WHERE email = '$email' LIMIT 1");
    $f = mysqli_fetch_assoc($resultset);
    
    $verified = $f['verified'];
    if($resultset->num_rows != 0) {
        if($verified==1){
            $to = $email;
                $subject = "Reset Password";
                $message = "<a href='http://localhost/Project3Keiko/resetpass.php'>Reset Password</a>";
                $headers = "From: harrissabastian@gmail.com \r\n";
                $headers .= "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                mail($to,$subject,$message,$headers);

                header('Location: tes.php');
        }
    }
    else {
        echo "Please sign up first";
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
    <p>Please input your registered email so we can send the reset password link</p> <br><br>

    <form action="" method="POST">
        <label for="email">email</label>
        <input type="text" name="email">
        <input type="submit" name="reset" value="Reset">
    </form>
    <a href="login.php">Back</a>
</body>
</html>