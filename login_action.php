<?php
    session_start();
    if(!isset($_POST['login-submit'])){
        header("Location: index.php");
        exit(); 
    }else {
        $userid = $_POST['username'];
        $pass = $_POST['password'];
        $db = new SQLite3('vcya.db');
        $stmt = $db->prepare('select * from users where userID = :id');
        $stmt->bindValue(':id',$userid);
        $result = $stmt->execute();
        while ($user = $result->fetchArray(SQLITE3_ASSOC)) {
            if($user['userId'] == $userid){
                 if(password_verify($pass, $user['userPassword'])){
                    session_unset();
                    $_SESSION['userid'] = $userid; 
                    $_SESSION['logged_in'] = TRUE;
                    $_SESSION['message'] = "You have successfully logged in!!"; 
                    header("Location: index.php?loginsucess");
                    exit();    
                 }else {
                    $_SESSION['message'] = "Wrong password!!";
                    header("Location: login.php?wrongpassword");
                    exit();
                 }
            }else {
                $_SESSION['message'] = "Wrong UserID!!";
                header("Location: login.php?wronguserid");
                exit();
            }
            break;
        }
        $_SESSION['message'] = "Wrong UserID!!";
        header("Location: login.php?wronguserid");
        exit();
    }
?>