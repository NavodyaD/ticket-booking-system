<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $currentUserName = $_POST["username"];
        
            $userEmail = $_POST["useremail"];
            $bandName = $_POST["bandname"];
            $bandDes = $_POST["banddes"];
            $bandImgName = $_FILES['bandimage']['name'];
            $bandImgTempName = $_FILES['bandimage']['tmp_name'];
            $imgFileData = addslashes(file_get_contents($bandImgTempName));
            $playersCount = $_POST["playerscount"];
            $bandType = $_POST["bandtype"];
            $bandPrice = $_POST["bandprice"];
            $bandPhone = $_POST["bandphone"];
        
            $result = mysqli_query($con,"insert into banddetails (userEmail, bandName, bandDes, bandImage, playersCount, bandType, bandPrice, bandPhone) values('$userEmail','$bandName','$bandDes','$imgFileData','$playersCount','$bandType','$bandPrice','$bandPhone')");
        
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
                            <h3>$bandName Band Added Successfully</h3>
                            <h4>Band Price: $bandPrice LKR | Players Count: $playersCount</h4>
                            
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

 