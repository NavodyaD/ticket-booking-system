<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
        
            $eventIdToEdit = $_POST["eventid"];
            $editColumn = $_POST["eventeditdropdown"];
            $newEditValue = $_POST["neweditvalue"];

            $newValue = mysqli_real_escape_string($con, $newEditValue);

            switch ($editColumn) {
                case 1:
                    $sql = "UPDATE eventtb SET eventName = '$newValue' WHERE eventID = $eventIdToEdit";
                    break;
                case 2:
                    $sql = "UPDATE eventtb SET eventPrice = '$newValue' WHERE eventID = $eventIdToEdit";
                    break;
                case 3:
                    $sql = "UPDATE eventtb SET eventTicketAmount = '$newValue' WHERE eventID = $eventIdToEdit";
                    break;
                case 4:
                    $sql = "UPDATE eventtb SET eventDateTime = '$newValue' WHERE eventID = $eventIdToEdit";
                    break;
                case 5:
                    $sql = "UPDATE eventtb SET eventLocation = '$newValue' WHERE eventID = $eventIdToEdit";
                    break;
                case 6:
                    $sql = "UPDATE eventtb SET bandID = '$newValue' WHERE eventID = $eventIdToEdit";
                    break;
                default:
                    echo "Something Went Wrong";
            }

            $result = $con->query($sql);
        
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
                            <img src='../assets/img/success_tick.png' alt=''>
                            <h3> Event Edited Successfully</h3>
                            <h4>Edits has beed saved.</h4>
                            
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

 