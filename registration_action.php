<?php /*  Name: Thinh Tran
          Date: Mar 30, 2020    
      */
        $comment = "True"?>
<?php
session_start();
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
    $_SESSION["message"] = "Congratulations ".$firstname."! You have successfully registered. Your User ID is ".$userid;
    $fileout = fopen('/home/ttr/secure_html/cs312/project/registration.txt','a')
                or die("error: unable to open output file");
    $output = str_replace(',','-',$firstname).','.
              str_replace(',','-',$lastname).','.
              str_replace(',','-',$userid).','.
              str_replace(',','-',$password).','.
              str_replace(',','-',$email).','.
              str_replace(',','-',$how).','.
              str_replace(',','-',$fluency).','.
              str_replace(',','-',$update)."\n";
    fwrite($fileout, $output);
    fclose($fileout); 
    header("Location: index.php");          
}else
{
    $_SESSION["message"] = nl2br($messages);
    header("Location: registration.php");
}
?>