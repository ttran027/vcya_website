<?php /*  Name: Thinh Tran
          Date: Mar 30, 2020    
      */
        $comment = "True"?>
<?php
session_start();
session_unset();
$name = $_POST['name'];
$sponsor = $_POST['sponsor'];
$description = $_POST['description'];
$date = $_POST['date'];
$time = $_POST['time'];
$error = FALSE;
$messages= "";

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

if ($password != $confirm) {
    $error = TRUE;
    $messages .= "Passwords do not match.\n";
}

if( empty($date)){
    $error = TRUE;
    $messages .= "The date is invalid.\n";
}

if(empty($time)){
    $error = TRUE;
    $messages .= "The time is invalid.?\n";
}

if(!$error){
    $_SESSION["message"] = "New event ".$name." sponsored by ".$sponsor." on ".$date." at ".$time." have been successfully added!";
    $fileout = fopen('/home/ttr/secure_html/cs312/project/events.txt','a')
                or die("error: unable to open output file");
    $output = str_replace(',','-',$date).'|'.
              str_replace(',','-',$time).'|'.
              str_replace(',','-',$name).'|'.
              str_replace(',','-',$sponsor).'|'.
              str_replace(',','-',$description)."\n";
    fwrite($fileout, $output);
    fclose($fileout); 
    header("Location: index.php");          
}else
{
    $_SESSION["message"] = nl2br($messages);
    header("Location: new_event.php");
}
?>