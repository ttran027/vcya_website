<?php
    /*  Name: Thinh Tran
          Date: Feb 23, 2020    
    */

    if(isset($_SESSION['userid']) && isset($_SESSION['logged_in']) ){
        if($_SESSION['logged_in'] == TRUE){
            echo '<div id = "menu">
            <a href="index.php">Home Page</a>
            <a href="about.php" >About Us</a>
            <a href="events.php">Events</a>
            <a href="classes.php">Vietnamese Classes</a>
            <a href="volunteer.php">Volunteer</a>
            <a href="logout_action.php">Log out</a>
            <a style="color:red">UserID: '.$_SESSION['userid'].'</a>
            </div>';
        }else {
            session_unset();
            echo '<div id = "menu">
            <a href="index.php">Home Page</a>
            <a href="about.php" >About Us</a>
            <a href="events.php">Events</a>
            <a href="classes.php">Vietnamese Classes</a>
            <a href="volunteer.php">Volunteer</a>
            <a href="login.php">Log in</a>
            <a href="registration.php" style="color:red">Register</a>
            </div>';
        }      
    }
    else {
        echo '<div id = "menu">
        <a href="index.php">Home Page</a>
        <a href="about.php" >About Us</a>
        <a href="events.php">Events</a>
        <a href="classes.php">Vietnamese Classes</a>
        <a href="volunteer.php">Volunteer</a>
        <a href="login.php">Log in</a>
        <a href="registration.php" style="color:red">Register</a>
        </div>';
    }    
?>