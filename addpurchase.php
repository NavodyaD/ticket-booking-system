<?php
      

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $userEmail = mysqli_real_escape_string($con, $_POST["useremail"]);
            $eventID = mysqli_real_escape_string($con, $_POST["eventID"]);
            $ticketCount = mysqli_real_escape_string($con, $_POST["ticketcountdropdown"]);
            $currentusername = mysqli_real_escape_string($con, $_POST["username"]);
            $cvv = mysqli_real_escape_string($con, $_POST["cvv"]);
            $eventName = mysqli_real_escape_string($con, $_POST["eventname"]);
            $ticketPrice = mysqli_real_escape_string($con, $_POST["ticketprice"]);

            $totalTicketPrice = $ticketCount*$ticketPrice;

            if ($cvv === '233') 
            {
                $sql = "insert into ticketpurchase (purchDate, ticketCount, ticketPrice, userEmail, eventID) values(NOW(),'{$ticketCount}','{$ticketPrice}','{$userEmail}','{$eventID}')";
                $result = mysqli_query($con, $sql);

                $to         =  '';
                $sender     = 'iamhirusha@gmail.com';
                $mail_subject = 'Your StagePass Tickets Purchase Successful';
                $email_body = '<p>Dear ' . $currentusername . '</p>';
                $email_body .= '<h3>You have purchased your tickets successfully!</h3>';
                $email_body .= '<p>Number of Tickets: ' . $ticketCount . ' | Single Ticket Price: ' . $ticketPrice . ' LKR</p>';
                $email_body .= '<h4>Total Price: ' . $totalTicketPrice . ' LKR</h4>';
                $email_body .= '<p>Thank you for purchasing tickets from StagePass. You can use this email as the event entrance ticket. Our StagePass team members will be there.</p>';
                $email_body .= '<p>At the entrance, original StagePass Email is needed. Screenshots are not allowed.</p>';
                $email_body .= '<p>StagePass Team.</p>';

                $header = "From: {$sender}\r\nContent-Type: text/html;";

                $send_mail_result = mail($to, $mail_subject, $email_body, $header);


                if($result) {
                    $totalPrice = $ticketPrice*$ticketCount;
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

                            .event-added-details .animation {
                                display: inline-block;
                                
                                width: 100px;
                                height: 100px;
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
                        <script src='https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.9/lottie.min.js'></script>
                    </head>
                    <body id='event-add-success-pg'>
                        <div class='event-added-details'>
                        <div id='animationContainer' class='animation' style='width: 250px; height: 250px;'></div>
                            <script>
                                var animation = bodymovin.loadAnimation({
                                    container: document.getElementById('animationContainer'),
                                    renderer: 'svg',
                                    loop: false,
                                    autoplay: true,
                                    path: 'assets/json/blue_success.json'
                                });
                            </script>
                            <h2>Your $ticketCount Tickets Purchase For $eventName is Successfull. </h2>
                            <h4>Ticket Amount: $ticketCount | Single Ticket Price: $ticketPrice LKR</h4>
                            
                            <h3>Total Amount: $totalPrice LKR</h3>
                            <h4>You'll Recieve the Confimation Email Shortly! If not, Please Contact the StagePass Team.</h4>
                            
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
                    
            }

                /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Check if the dropdown value is set and not empty
                    if (isset($_POST["dropdown"]) && !empty($_POST["dropdown"])) {
                        // Get the selected value from the dropdown
                        $ticketCount = $_POST["ticketcountdropdown"];

                        // Output the selected value
                        echo "Selected value: " . $selectedValue;
                    } else {
                        // If dropdown value is not set or empty, handle the error
                        echo "Dropdown value is not selected.";
                    }*/
            }


            
        
    }
    else
    {
        echo "Connection failed";
    }

?>

 