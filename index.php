<?php
session_start();

if( $_SESSION["tes"]) {
        header("Location: login.php");
        exit;
    }

?>