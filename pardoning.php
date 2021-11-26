<?php

            $r = mysqli_query($conn,$s);

            $to = $email['email'];
            $subject = "Pardoning to post Thread in Metaforums";
            $message = "Dear Metaforums user, ";
            $message .= "We're sorry to put you in pardoning mode due to some of your posts for 30 minutes.";
            $message .= "You can post a thread again after 30 minutes over.";
            $message .= "Thankyou for your understanding";
            $headers = "From: harrissabastian@gmail.com \r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        mail($to,$subject,$message,$headers);

        $l = "SELECT time FROM account WHERE userid='$mdid'";
        $r = mysqli_query($conn,$l);
        $time = mysqli_fetch_assoc($r);
        $result = time_diff($time['time']);

        $t = "UPDATE account SET status = '2' WHERE userid='$mdid'";
        $c = mysqli_query($conn,$t);


?>

