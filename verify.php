<?php
session_start();
    require 'function.php';
   
   $conn = setUpDBConnection();

    if(isset($_GET['vkey'])){
        $vkey = $_GET['vkey'];

        $resultset = $conn->query("SELECT verified,vkey FROM account WHERE verified = 0 AND vkey='$vkey' LIMIT 1");

        if($resultset->num_rows == 1){
            //validate the email
            $update = $conn->query("UPDATE ACCOUNT SET verified = 1 WHERE vkey = '$vkey' LIMIT 1");

            if($update) {
                echo "Your account has been verified, you may now log in";
                echo "<a href='login.php'>LoginHere</a>";
            } else {
                echo $conn->error;
            }

        } else {
            echo "This account invalid or already verified";
        }

    } else {
        die("Something went wrong");
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
    
</body>
</html>