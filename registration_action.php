<?php /*  Name: Thinh Tran
          Date: Mar 30, 2020    
      */
        $comment = "True"?>
<?php
session_start();
if(!isset($_POST['register-submit'])){
    header("Location: registration.php");
    exit();
}
session_unset();
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$userid = $_POST['userid'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$how = $_POST['how'];
$fluency = $_POST['fluency'];
$update = $_POST['update'];
$error = FALSE;
$messages= "";
$db = new SQLite3('vcya.db');

if(empty($firstname) || empty($lastname) || preg_match('/[0-9]{1}$/',$firstname) || preg_match('/[0-9]{1}$/',$lastname)){
    $error =TRUE;
    $messages .= "The first and last name are missing or invalid.\n";
}

if(empty($email) || !preg_match('/^.+@.+$/', $email)){
    $error = TRUE;
    $messages .= "An email address is missing or invalid\n.";
}

if(empty($userid) || preg_match('/\s/',$userid) || strlen($userid) < 3){
    $error = TRUE;
    $messages .= "User ID is missing or invalid. It must not contain whitespaces and must be at least 3 characters.\n";
}else {
    $stmt = $db->prepare('select * from users where userID=:id');
    $stmt->bindValue(':id', $userid, SQLITE3_TEXT);
    $result= $stmt->execute();
    $rows = 0 ;
    while ($result->fetchArray(SQLITE3_ASSOC)) {
        $rows++;
    }
    if($rows > 0){
        $error = TRUE;
        $messages .= "User ID is already used.\n";
    }
}

if ($password != $confirm) {
    $error = TRUE;
    $messages .= "Passwords do not match.\n";
}

if( empty($password) || preg_match('/\s/',$password) || strlen($password) < 5){
    $error = TRUE;
    $messages .= "Password is missing or invalid. It must not contain whitespaces and must be at least 5 characters.\n";
}

if($how == "0"){
    $error = TRUE;
    $messages .= "Invalid choice of How did you find out about us.?\n";
}

if($fluency == "0"){
    $error = TRUE;
    $messages .= "Invalid choice of fluency.\n";
}

if(empty($update)){
    $error = TRUE;
    $messages .= "Invalid update choice.";
}



if(!$error){
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $_SESSION["message"] = "Congratulations ".$firstname."! You have successfully registered. Your User ID is ".$userid;
    $stmt = $db->prepare('insert into users(userId,firstname,lastname,email,userPassword,referral,vietFluency,emailSubscription) values(:id,:fn,:ln,:email,:pass,:refer,:viet,:sub)');
    $stmt->bindValue(':id', $userid, SQLITE3_TEXT);
    $stmt->bindValue(':fn', $firstname, SQLITE3_TEXT);
    $stmt->bindValue(':ln', $lastname, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':pass', $hash, SQLITE3_TEXT);
    $stmt->bindValue(':refer', $how, SQLITE3_TEXT);
    $stmt->bindValue(':viet', $fluency, SQLITE3_TEXT);
    $stmt->bindValue(':sub', $update);
    $stmt->execute();
    header("Location: index.php");          
}else
{
    $_SESSION["message"] = nl2br($messages);
    header("Location: registration.php");
}
?>