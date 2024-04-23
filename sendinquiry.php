<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $userEmail = $_POST["useremail"];
            $bandID = $_POST["bandid"];
            $inqUsername = $_POST["yourname"];
            $inqDate = $_POST["expdate"];
            $inqLocation = $_POST["location"];
            $inqSubject = $_POST["subject"];
            $inqDes = $_POST["description"];
            $inqPhone = $_POST["phonenum"];

            $inqDescription = mysqli_real_escape_string($con, $inqDes);
        
            $result = mysqli_query($con,"insert into bandinquirydetails (userEmail, userName, inqTitle, inqDes, inqDate, inqLocation, inqPhone, bandID) values('$userEmail','$inqUsername','$inqSubject','$inqDescription','$inqDate','$inqLocation','$inqPhone','$bandID')");
        
            if($result) {
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
                            <h3>$inqUsername, Your Inquiry has Been Sent Successfully!</h3>
                            <h4>Subject: $inqSubject</h4>
                            <h5>Expected Date: $inqDate | Location: $inqLocation </h5>
                            <h5> Your Phone Number: $inqPhone</h5>
                            <p>The band will contact you shortly.</p>
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

 