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
            $bandID = $_POST["bandID"];
            $feedbackText = $_POST["feedbacktext"];
            $starCount = $_POST["rating"];

            $feedback_text = mysqli_real_escape_string($con, $feedbackText);
        
            $result = mysqli_query($con,"insert into bandfeedback (bandID, feedbackText, starCount, userEmail, userName) values('$bandID','$feedback_text','$starCount','$userEmail','$currentUserName')");
        
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
                    <script src='https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.9/lottie.min.js'></script>
                </head>
                <body id='event-add-success-pg'>
                    <div class='event-added-details'>
                        <div id='animationContainer' style='width: 250px; height: 250px;'></div>
                        <script>
                            var animation = bodymovin.loadAnimation({
                                container: document.getElementById('animationContainer'),
                                renderer: 'svg',
                                loop: true,
                                autoplay: true,
                                path: 'assets/json/blue_success.json'
                            });
                        </script>
                        <h3>Feedback Added Successfully!</h3>
                        <h4>You left a $starCount Star Feedback to the Band.</h4>
                        
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

 