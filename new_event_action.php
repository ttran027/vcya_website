<?php /*  Name: Thinh Tran
          Date: Mar 30, 2020    
      */
        $comment = "True"?>
<?php
session_start();
if(!isset($_POST['addevent-submit'])){
    header("Location: new_event.php");
    exit();
}
$name = $_POST['name'];
$sponsor = $_POST['sponsor'];
$description = $_POST['description'];
$dateformat = $_POST['date'];
$datetime = new DateTime($dateformat);
$date = $datetime->getTimestamp();
$time = $_POST['time'];
$error = FALSE;
$messages= "";
$db = new SQLite3('vcya.db');
if(empty($name)){
    $error =TRUE;
    $messages .= "The name of the event must not be empty.\n";
}

if(empty($sponsor)){
    $error = TRUE;
    $messages .= "The sponsor of the event must not be empty\n.";
}

if(empty($description)){
    $error = TRUE;
    $messages .= "The description of the event must not be empty.\n";
}

if( empty($date)){
    $error = TRUE;
    $messages .= "The date is invalid.\n";
}else {
    $stmt = $db->prepare('select * from events where eventDate=:date');
    $stmt->bindValue(':date', $date);
    $result= $stmt->execute();
    $rows = 0 ;
    while ($result->fetchArray(SQLITE3_ASSOC)) {
        $rows++;
    }
    if($rows > 0){
        $error = TRUE;
        $messages .= "There is already an event on ".$dateformat.". Please select a different date!\n";
    }
}

if(empty($time)){
    $error = TRUE;
    $messages .= "The time is invalid.?\n";
}

if(!$error){
    $stmt = $db->prepare('insert into events(eventName,eventSponsor,eventDate,eventTime,eventDescription) values(:name,:sponsor,:date,:time,:des)');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':sponsor', $sponsor, SQLITE3_TEXT);
    $stmt->bindValue(':date', $date);
    $stmt->bindValue(':time', $time);
    $stmt->bindValue(':des', $description, SQLITE3_TEXT);
    $stmt->execute();
    $_SESSION["message"] = "New event ".$name." sponsored by ".$sponsor." on ".$dateformat." at ".$time." have been successfully added!";
    header("Location: index.php");          
}else
{
    $_SESSION["message"] = nl2br($messages);
    header("Location: new_event.php");
}
?>