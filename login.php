<?php /*  Name: Thinh Tran
          Date: Feb 23, 2020    
      */
        $comment = "True"?>

<?php
    session_start();
    if(isset($_SESSION['userid']) && isset($_SESSION['logged_in'])){
        if($_SESSION['logged_in'] == TRUE){
            $_SESSION['message'] = "You are already logged in!!";
            header("Location: index.php?alreadyloggedin");
            exit();
        }else {
            session_unset();
        }      
    }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title >Log in</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="std.css">
</head>

<body>
<div id="container">
    <?php require 'header.php'; ?>
    <?php require 'menu.php';?>
    
    <div id="content">
        <form method="post" action="login_action.php">
            <br><div class="form-element">
                <label>Username</label>
                <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
            </div><br>
            <div class="form-element">
                <label>Password</label>
                <input type="password" name="password" required />
            </div><br>
        <button type="submit" name="login-submit" value="login">Log In</button>
        </form>
    </div><br>
    <?php
        if(isset($_SESSION['message'])){
            echo '<div>';
            echo '<h3 style="color:red;">';
            echo($_SESSION["message"]);
            echo '</h3>';           
            unset($_SESSION["message"]);
            echo '</div>';
            }                   
        ?> 
    <div id="footer"> Property of VCYA </div>

</div>
</body>
</hmtl>