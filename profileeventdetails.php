<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profilestyle.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.7.9/lottie.min.js'></script>
</head>
<body>
    <section id="youreventdetails">

        <div class="title">
            <img src="assets/img/user_icon.png" alt="">
            <div class="welcome">
                <?php
                    $currentuseremail = $_GET['useremail'];  
                    $currentusername = $_GET['username'];
                    echo "<h2> Welcome, " . htmlspecialchars($currentusername) . "!</h2>";
                ?>
                <h5>How is your day?</h5>
            </div>
        </div>

        <h3>Your Event Details</h3>

        <?php

        $currentuseremail = $_GET['useremail'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ticketBookingDB";

        $con = mysqli_connect($servername, $username, $password, $dbname);

        if($con) {

            $sql = "SELECT eventID, eventName, eventDes, eventPoster, eventPrice, eventTicketAmount, eventDateTime, eventLocation, bandID FROM eventdetails WHERE userEmail = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $currentuseremail);
            $stmt->execute();
            $eventresult = $stmt->get_result();

            if($eventresult->num_rows > 0)
            {
                while($row = $eventresult->fetch_assoc())
                {
                    $eventID = $row['eventID'];

                    $ticketsql = "SELECT ticketCount, purchDate FROM ticketpurchasedetails WHERE eventID = $eventID";
                    $ticketSoldResult = $con->query($ticketsql);

                    $totalTicketSoldAmount = 0;

                    // Check if there are any results
                    if (mysqli_num_rows($ticketSoldResult) > 0) {
                        // Loop through each row and calculate the total ticket amount
                        while ($countRow = mysqli_fetch_assoc($ticketSoldResult)) {
                            // Add the ticket amount to the total
                            $totalTicketSoldAmount += $countRow['ticketCount'];
                        }
                    }

                    echo '<div class="event-details-block">';
                    echo '<div class="image">';
                    echo '<img src="data:image/jpeg;base64,'.base64_encode($row['eventPoster']).'" />';
                    echo '<div class="nameDes">';
                    echo "<h3>" . $row['eventName'] . "</h3>";
                    echo "<p>" . $row['eventDes'] . "</p>";
                    echo '</div>';
                    echo '</div>';
                    
                    echo "<div id='animationContainer' style='width: 100%; height: 250px;'></div>";
                    echo "<h2>Good News! " . $totalTicketSoldAmount . " Tickets Has Been Sold.</h2>";
                    echo "<h3> Ticket Price: LKR " . $row['eventPrice'] . "</h3>";

                    echo '<div class="calculations">';
                    $fullAmount = $row['eventPrice']*$totalTicketSoldAmount;
                    
                    echo '<div class="cal">';
                        echo "<p>Full Amount</p>";
                        echo "<p>" . $row['eventPrice'] . " LKR x " . $totalTicketSoldAmount . " = " . $fullAmount . " LKR</p>";
                    echo '</div>';
                    $stagePassFee = $fullAmount*0.08;
                    echo '<div class="cal">';
                        echo "<p>StagePass Fee of (8%) </p>";
                        echo "<p>" . $stagePassFee . " LKR</p>";
                    echo '</div>';
                    echo '<div class="cal">';
                        echo "<p>Tax or Other Fees </p>";
                        echo "<p> 0 LKR</p>";
                    echo '</div>';
                    $netAmount = $fullAmount-$stagePassFee;
                    echo '<div class="cal">';
                        echo "<p>Net Amount </p>";
                        echo "<h3>" . $netAmount . " LKR</h3>";
                    echo '</div>';
                    echo '</div>';
                    echo '<span class="details">';
                        echo '<i class="fa fa-calendar" aria-hidden="true"></i>';
                        echo "<p>" . $row['eventTicketAmount'] . "</p>";
                    echo '</span>';
                    echo '<span class="details">';
                        echo '<i class="fa fa-location" aria-hidden="true"></i>';
                        echo "<p>" . $row['eventDateTime'] . "</p>";
                    echo '</span>';
                    echo '<span class="details">';
                        echo '<i class="fa fa-phone" aria-hidden="true"></i>';
                        echo "<p>" . $row['eventLocation'] . "</p>";
                    echo '</span>';
                    echo '</div>';


                }
            }
        }
        else
        {
            echo "Connection to Database is failed";
        }
        ?>
    </section>
                        <script>
                            var animation = bodymovin.loadAnimation({
                                container: document.getElementById('animationContainer'),
                                renderer: 'svg',
                                loop: true,
                                autoplay: true,
                                path: 'assets/json/medal_success.json'
                            });
                        </script>
</body>
</html>
                        