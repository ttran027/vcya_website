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
    <title >Events</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="std.css">
</head>

<body>
<div id="container">
    <?php require 'header.php'; ?>
    <?php require 'menu.php';?>
    <?php
        if(isset($_SESSION['userid']) && isset($_SESSION['logged_in']) ){
            if($_SESSION['logged_in'] == TRUE){
                echo '<div>
                <h1><a href="new_event.php">Add New Event</a></h1>
                </div>';
            }else {
                session_unset();
            }      
        }    
    ?>
    <div id="content">
        <?php
            $db = new SQLite3('vcya.db');
            $stmt = $db->prepare('delete from events where eventDate < :date');
            $today = new DateTime();
            $stmt->bindValue(':date',$today->getTimestamp());
            $stmt->execute();
            $stmt = $db->prepare('select * from events order by eventDate ASC');
            $result= $stmt->execute();
            while ($event = $result->fetchArray(SQLITE3_ASSOC)) {
                $date = new DateTime();
                $date->setTimestamp($event['eventDate']);
                echo '<div id="event">
                      <h3>'.$event['eventName'].'</h3>
                      <p>Date: '.$date->format('Y-m-d').'</p>
                      <p>Time: '.$event['eventTime'].'</p>
                      <p>Sponsored by: '.$event['eventSponsor'].'</p>
                     <p>Description: '.$event['eventDescription'].'</p></div>';
                
            }
 
           
        ?>
    </div>
    <div id="footer"> Property of VCYA </div>

</div>
</body>
</hmtl>

