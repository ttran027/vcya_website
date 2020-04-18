<?php /*  Name: Thinh Tran
          Date: Feb 23, 2020    
      */
        $comment = "True"?>
<?php
    session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title >Home Page</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="std.css">
    <style>
        
        .column {
        float: left;
        padding: 10px;
        }

        .row:after {
        content: "";
        display: table;
        clear: both;
        }
        </style>
</head>

<body>
<div id="container">
    <?php require 'header.php'; ?>
    <?php require 'menu.php';?>
    <div>
    <h1><a href="registration.php">Register here!!!</a></h1>
    </div>
    <div id ="row">
        <div id="column">
            <div>
                <p>Welcome to the official website of Vietnamese Community Youth Association (VCYA)!!!</p>
                <p>VCYA is a non-profit association serving the Vietnamese and Buddhist community of the Hampton Roads. We are building an environment where Vietnamese American can learn about Vietnamse culture and language.</p>
                <p>We are taking in applications for the 2020-2021 Vietnamese classes. Please visit Vietnamese Classes page for more information.</p>
            </div>
            
        </div>
        <div class="column">
                    <?php
                        if(isset($_SESSION['message'])){
                            echo '<h3 style="color:red;">';
                            echo($_SESSION["message"]);
                            echo '</h3>';           
                            session_unset();
                        }   
                    ?>    
        </div>
    </div>
    <div id="poster"> <img src="img/welcome.jpg" width=500 height="300">  </div>
    <div id="footer"> Property of VCYA </div>

</div>

</body>

</hmtl>

