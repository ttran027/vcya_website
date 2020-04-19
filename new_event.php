<?php /*  Name: Thinh Tran
          Date: Mar 30, 2020    
      */
        $comment = "True"?>
<?php
    session_start();
    if(!isset($_SESSION['userid']) || !isset($_SESSION['logged_in']) ){
        if($_SESSION['logged_in'] == TRUE){
            session_unset();
        }
        header("Location: login.php");
        exit();     
    }     
?>

<!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title >New Event</title>
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
        function checkForm() {
           
            //Store the password field objects into variables ...
            var dateformat  = document.getElementById('date').value;
            var message = document.getElementById('date-message');
            var today = new Date();
            var date = new Date(dateformat.toString());
            var content = null;;
            message.style.color           = "#ff6666";
            
            if(date.getTime() < today.getTime()){
                message.innerHTML = "Please only select a future date from today!";
                return false;
            }
          
            return true;
                      
        }
        
        </script>   
    </head>

    <body>
            <div id="container">
            <?php require 'header.php'; ?>
            <?php require 'menu.php';?>
            <div class="row">
                <div class="column">
                    <form method="POST" action="new_event_action.php" onsubmit="return checkForm()">
                        Event Name:<br>
                        <input type="text" name="name" id="name" size="100" required><br>
                        Sponsor:<br>
                        <input type="text" name="sponsor" id="sponsor" size="100" required><br>
                        Description:<br>
                        <textarea name="description" id="description" rows="10" cols="30"></textarea><br>
                        Date:<br>
                        <input type="date" name="date" id="date"><br>
                        <br><span id="date-message" class="date-message"></span><br>
                        Time:<br>
                        <input type="time" name="time" id="time"><br>
                        <button type="submit" name="addevent-submit" value="addevent">Submit</button>
                    </form>
                </div>
                <div class="column">
                    <?php
                        if(isset($_SESSION['message'])){
                            echo '<h3 style="color:red;">';
                            echo($_SESSION["message"]);
                            echo '</h3>';           
                            unset($_SESSION['message']);
                        }  
                    ?>
                </div>
            </div>
            <div id="footer"> Property of VCYA </div>

        </div>

    </body>

</hmtl>