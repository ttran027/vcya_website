<?php /*  Name: Thinh Tran
          Date: Mar 30, 2020    
      */
        $comment = "True"?>
<?php
    session_start();
    if(isset($_SESSION['userid']) && isset($_SESSION['logged_in'])){
        if ($_SESSION['logged_in'] == TRUE) {
            $_SESSION['message'] = "You are currently logged in. Please log out then register again!";
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
        <title >Registration</title>
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
         <script type="text/javascript">
        function checkPass()
        {
            //Store the password field objects into variables ...
            var password = document.getElementById('password');
            var confirm  = document.getElementById('confirm');
            //Store the Confirmation Message Object ...
            var message = document.getElementById('confirm-message');
            //Set the colors we will be using ...
            var good_color = "#66cc66";
            var bad_color  = "#ff6666";
            //Compare the values in the password field 
            //and the confirmation field
            if(password.value == confirm.value){
                //The passwords match. 
                //Set the color to the good color and inform
                //the user that they have entered the correct password 
                confirm.style.backgroundColor = good_color;
                message.style.color           = good_color;
                message.innerHTML             = '<p>Passwords Match</p>';
            }else{
                //The passwords do not match.
                //Set the color to the bad color and
                //notify the user.
                confirm.style.backgroundColor = bad_color;
                message.style.color           = bad_color;
                message.innerHTML             = '<p>Passwords Do Not Match!</p>';
            }
        }  

        function checkForm() {
            //Store the password field objects into variables ...
            var password = document.getElementById('password');
            var confirm  = document.getElementById('confirm');
            var message = document.getElementById('confirm-message');
            var bad_color  = "#ff6666";
            //Compare the values in the password field 
            //and the confirmation field
            if(password.value == confirm.value){
               return true;
            }else{
                message.style.color           = bad_color;
                message.innerHTML             = '<p>Please match your passwords!!</p>';
                return false;
            }

        }
        </script>   
    </head>

    <body>
            <div id="container">
            <?php require 'header.php'; ?>
            <?php require 'menu.php';?>
            <div class="row">
                <div class="column">
                    <form method="POST" action="registration_action.php" onsubmit="return checkForm()">
                        First name:<br>
                        <input type="text" name="firstname" size="15" required><br>
                        Last name:<br>
                        <input type="text" name="lastname" size="15" required><br>
                        Email:<br>
                        <input type="email" name="email" size="30" pattern=".*[@].*" placeholder="abc@gmail.com" required><br>
                        User ID<br>
                        <input type="text" name="userid" size="15" pattern=".{3,}" title="Three or more characters" required><br>
                        Password<br>
                        <input type="password" name="password" id="password" size="15" pattern=".{5,}" title="Five or more characters" required><br>
                        Confirm password<br>
                        <input type="password" name="confirm" id="confirm" size="15" pattern=".{5,}" title="Five or more characters" onkeyup="checkPass();" required><br>
                        <br><span id="confirm-message" class="confirm-message"></span><br>
                        How did you find out about us?<br>
                        <input type="hidden" name="how" value="0">
                        <input type="radio" id="friends" name="how" value="friends and family">
                        <label for="friends">Friends and Family</label><br>
                        <input type="radio" id="social" name="how" value="social network">
                        <label for="social">Social network</label><br>
                        <input type="radio" id="temple" name="how" value="Buddhist temple">
                        <label for="temple">Buddhist Temple</label><br> 
                        Do you speeak Vietnamese? If yes, what is your fluency?<br>
                        <input type="hidden" name="fluency" value="0">
                        <input type="radio" id="fluently" name="fluency" value="as mother tounge">
                        <label for="fluently">Mother tounge</label><br>
                        <input type="radio" id="second" name="fluency" value="as second language">
                        <label for="second">Second language</label><br>
                        <input type="radio" id="little" name="fluency" value="very little">
                        <label for="little">Very little</label><br>    
                        <label for="update">Do you want to recieve email updates from us?</label>
                        <select id="update" name="update">
                            <option value="do" selected>Yes</option>
                            <option value="don't">No</option>
                        </select>
                        <br>
                        <button type="submit" name="register-submit" value="register">Submit</button>
                    </form>
                </div>
                <div class="column">
                    <?php
                        if(isset($_SESSION['message'])){
                            echo '<h3 style="color:red;">';
                            echo($_SESSION["message"]);
                            echo '<h3>';           
                            session_unset();
                        }                       
                    ?>
                </div>
            </div>
            <div id="footer"> Property of VCYA </div>

        </div>

    </body>

</hmtl>