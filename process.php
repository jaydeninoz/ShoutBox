<?php
include 'database.php';

// check if form submitted
if(isset($_POST['submit'])){
    $user = mysqli_real_escape_string($con, $_POST['user']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // set timezone
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // http://php.net/manual/en/timezones.asia.php

    $time = date('h:i:s a', time());

    // Validate input
    if(!isset($user) || $user == '' || !isset($message) || $message == ''){
        $error = "Please fill in your name and send a message";
        header("Location: index.php?error=".urlencode($error));
        exit();
    } else {
        $query = "INSERT INTO shouts (user, message, time)
                VALUES ('$user', '$message', '$time')";
        
        if(!mysqli_query($con, $query)){
            die('Error: '.mysqli_error($con));
        } else {
            header("Location: index.php");
            exit();
        }

    }

}

?>