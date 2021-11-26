<?php
    // $r = mysqli_query($conn,$s);

    $to = $email['email'];
    $subject = "Silencing to post Thread in Metaforums";
    $message = "Dear Metaforums user, ";
    $message .= "We're sorry to put you in silence mode due to some of your posts for 30 minutes.";
    $message .= "You can post a thread again after 30 minutes over.";
    $message .= "Thankyou for your understanding";
    $headers = "From: harrissabastian@gmail.com \r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    mail($to,$subject,$message,$headers);


    $t = "UPDATE account SET status = '3', silent='$op' WHERE userid='$mdid'";
    $r = mysqli_query($conn,$t);

    $l = "SELECT time FROM account WHERE userid='$mdid'";
    $rr = mysqli_query($conn,$l);
    $time = mysqli_fetch_assoc($rr);
    $result = time_diff($time['time']);


?>