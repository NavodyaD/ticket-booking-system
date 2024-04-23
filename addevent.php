<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $userEmail = $_POST["useremail"];
            $currentUserName = $_POST["username"];
            $eventName = $_POST["eventname"];
            $eventDes = $_POST["eventdes"];
        // Event Poster
            $eventPosterName = $_FILES['eventposter']['name'];
            $eventPosterTempName = $_FILES['eventposter']['tmp_name'];
            $imgPosterFileData = addslashes(file_get_contents($eventPosterTempName));
        // Event Banner
            $eventImgName = $_FILES['eventimage']['name'];
            $eventImgTempName = $_FILES['eventimage']['tmp_name'];
            $imgFileData = addslashes(file_get_contents($eventImgTempName));

            $eventPrice = $_POST["eventprice"];
            $eventTktAmount = $_POST["eventticketamount"];
            $eventDate = $_POST["eventdate"];
            $eventLoca = $_POST["eventloca"];
            $eventLocaUrl = $_POST["eventlocaurl"];
            $bandID = $_POST["bandid"];

            $event_description = mysqli_real_escape_string($con, $eventDes);
        
            $result = mysqli_query($con,"insert into eventdetails (userEmail, eventName, eventDes, eventPoster, eventImage, eventPrice, eventTicketAmount, eventDateTime, eventLocation, eventLocationURL, bandID) values('$userEmail','$eventName','$event_description','$imgPosterFileData','$imgFileData','$eventPrice','$eventTktAmount','$eventDate','$eventLoca','$eventLocaUrl','$bandID')");
        
            if($result) {
                echo "
                <!DOCTYPE html>
                <head>
                    <style>
                        #event-add-success-pg {
                            font-family:Arial, Helvetica, sans-serif;
                            display: flex;
                            justify-content: center; 
                            align-items: center;
                            align-content: center;
                            height: 100vh;
                            margin: 0;
                        }
                        
                        .event-added-details {
                            text-align: center;
                        }
                        
                        .event-added-details img {
                            display: inline-block;
                            
                            width: 100px;
                            height: 100px;
                        }
                        
                        .event-added-details h4{
                            font-weight: 300;
                            color: grey;
                        }
                        
                        .goto-buttons {
                            display: flex;
                            justify-content: center;
                        }
                        
                        .event-added-details button {
                            font-size: 15px;
                            color: rgb(0, 0, 0);
                            width: 165px;
                            padding: 10px 10px 10px 10px;
                            background-color: transparent;
                            border-radius: 10px;
                            border-width: 2px;
                            margin: 10px 15px;
                            border-color: rgb(0, 0, 0);
                            transition: 0.3s ease;
                        }
                        
                        .event-added-details button:hover {
                            color: white;
                            background-color: rgb(39, 39, 39);
                        }
                    </style>
                </head>
                <body id='event-add-success-pg'>
                    <div class='event-added-details'>
                        <img src='assets/img/success_tick.png' alt=''>
                        <h3>$eventName Event Added Successfully</h3>
                        <h4>Event Ticket Price: $eventPrice LKR | Number of Tickets: $eventTktAmount</h4>
                        <h4>Event Location: $eventLoca LKR | Event Date: $eventDate</h4>
                        <div class='goto-buttons'>
                            <button onclick='goBack()'>Done</button>
                        </div>

                        <script>
                            function goBack() {
                                window.history.back(); // Simulate clicking the browser\'s back button
                            }
                        </script>
                        
                </body>
                </html>
                ";
                
            }
            else
            {
                echo "Error";
            }
        
    }
    else
    {
        echo "Connection failed";
    }
}

?>

 