<?php
    session_start();
    if(isset($_SESSION['userid']) && isset($_SESSION['logged_in'])){
        if ($_SESSION['logged_in'] == TRUE) {
            session_unset();
            $_SESSION['message'] = "You have logged out!!";
            header("Location: index.php?loggedoutsuccess");
            exit();
        }else {
            session_unset();
            header("Location: index.php?notloggedin");
            exit();
        }
    }else {
        header("Location: index.php?alreadyloggedout");
        exit();
    }
?>