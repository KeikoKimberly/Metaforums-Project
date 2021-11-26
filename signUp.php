<?php

   require 'function.php';
   
   $conn = setUpDBConnection();

    $error = NULL;
    if(isset($_POST['signup'])){
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];

        $namesql = mysqli_query($conn, "SELECT username FROM account WHERE username = '$username'");
        $emailsql = mysqli_query($conn,"SELECT email FROM account WHERE email='$email'");

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "<p>Invalid email format</p>"; 
        }
        else if(strlen($username) < 6){
            $error .= "<p>Username must be between 6 and 20 characters long</p>";
        }
        else if(mysqli_fetch_assoc($namesql)) {
            $error .= "<p>Username is already taken</p>";
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
            if(insert($_POST)>0){
                $vkey = md5(time().$username);

                $to = $email;
                $subject = "Email verfication";
                $message = "<a href='http://localhost/Project3Keiko/verify.php?vkey=$vkey'>Register Account</a>";
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
<h1>Welcome To Metaforums</h1>
<form method="POST" action="">
        <table>
            <li>
                <label for="email">Email</label>
                <input type="text" name="email" id="email">
               
            </li>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="signup">Sign Up</button>
            </li>
        </table>
    </form>
    <br><br>
    <a href="homepage.php">Back</a>
    <?php 
        echo $error ;
    ?>
</body>
</html>