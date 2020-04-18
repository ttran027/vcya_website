<?php /*  Name: Thinh Tran
          Date: Mar 30, 2020    
      */
        $comment = "True"?>
<?php
    session_start();    
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
            var date  = document.getElementById('date').value;
            var message = document.getElementById('date-message');
            var content = null;;
            message.style.color           = "#ff6666";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.open("GET", "events.txt", false);
            xmlhttp.send();
            content = xmlhttp.responseText;
            var str = content.toString();
            var lines = str.split("\n");            
            var txt = "";
            var check = true;
            lines.forEach(checkDate); 
            message.innerHTML = txt;
            
            return check;
            
            function checkDate(value){
                pos = value.indexOf("|");
                if(pos > -1){
                    if(date.toString() == value.substring(0,pos)){
                        check = false;
                        txt = "There is already an event on this date! Please choose another date.";
                    }
                }         
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
                        <input type="submit" value="Submit">
                    </form>
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
            <div id="footer"> Property of VCYA </div>

        </div>

    </body>

</hmtl>