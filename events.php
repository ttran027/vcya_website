<?php /*  Name: Thinh Tran
          Date: Feb 23, 2020    
      */
        $comment = "True"?>   
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <title >Events</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="std.css">
</head>

<body>
<div id="container">
    <?php require 'header.php'; ?>
    <?php require 'menu.php';?>
    <div>
    <h1><a href="new_event.php">Add New Event</a></h1>
    </div>
    <div id="content">
        <?php
            $file = fopen("events.txt","r");
            while(! feof($file)){
                $line = fgets($file);
                if(strlen($line) > 1){
                $arr = preg_split ("/\|/", $line);
                $content = $arr;
                echo '<div id="event">
                      <h3>'.$arr[2].'</h3>
                      <p>Date: '.$arr[0].'</p>
                      <p>Time: '.$arr[1].'</p>
                      <p>Sponsored by: '.$arr[3].'</p>
                     <p>Description: '.$arr[4].'</p></div>';
                }
            }   
           
        ?>
    </div>
    <div id="footer"> Property of VCYA </div>

</div>
</body>
</hmtl>

