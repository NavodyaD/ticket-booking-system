<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $userEmail = $_POST["useremail"];
            $userName2 = $_POST["username2"];
            $eventName = $_POST["eventname"];
            $eventDes = $_POST["eventdes"];
            $eventImgName = $_FILES['eventimage']['name'];
            $eventImgTempName = $_FILES['eventimage']['tmp_name'];
            $imgFileData = addslashes(file_get_contents($eventImgTempName));
            $eventPrice = $_POST["eventprice"];
            $eventTktAmount = $_POST["eventticketamount"];
            $eventDate = $_POST["eventdate"];
            $eventLoca = $_POST["eventloca"];
            $eventLocaUrl = $_POST["eventlocaurl"];
        
            $result = mysqli_query($con,"insert into eventdetails (userEmail, eventName, eventDes, eventImage, eventPrice, eventTicketAmount, eventDateTime, eventLocation, eventLocationURL) values('$userEmail','$eventName','$eventDes','$imgFileData','$eventPrice','$eventTktAmount','$eventDate','$eventLoca','$eventLocaUrl')");
        
            if($result) {
                //header("Location: index.php?signname=" . urlencode($signname) . "&signemail=" .urlencode($signemail));
                echo "
                    <!DOCTYPE html>
                    <head>
                        <style>
                            #event-add-success-pg {
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
                            <h4>Ticket Price: $eventPrice LKR | Tickets Amount: $eventTktAmount</h4>
                            <div class='goto-buttons'>
                            <a href='profile.php?username=<?php echo urlencode($userName2); ?>&useremail=<?php echo urlencode($userEmail); ?>'>Go to Profile</a>
                                <button>View Event Page</button>
                            </div>
                        </div>
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

 