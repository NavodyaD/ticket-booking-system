
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profilestyle.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <section id="profile-details">
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
        
        <div class="history">
            <h3>Your Purchase History</h3>
            <p>Events you have purchased</p>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ticketBookingDB";

            $con = mysqli_connect($servername, $username, $password, $dbname);

            if($con) {

                $sql = "SELECT purchDate, ticketCount, eventID FROM ticketpurchasedetails WHERE userEmail = ?";
                $stmt = $con->prepare($sql);
                // Bind the parameter to the placeholder
                $stmt->bind_param("s", $currentuseremail);

                // Execute the prepared statement
                $stmt->execute();

                // Get the result set
                $purchresult = $stmt->get_result();
                if($purchresult->num_rows > 0)
                {
                    while($row = $purchresult->fetch_assoc())
                    {
                        $eventID = $row['eventID'];

                        $eventsql = "SELECT eventName, eventPrice, eventDateTime, eventPoster FROM eventDetails WHERE eventID = $eventID";
                        $eventDetailsResult = $con->query($eventsql);
                        $eventDetailsRow = $eventDetailsResult->fetch_assoc();

                        echo '<div class="purchased-event">';
                        echo '<div>';
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($eventDetailsRow['eventPoster']).'" />';
                        echo '</div>';
                        echo '<div>';
                        echo "<h4>" . $eventDetailsRow['eventName'] . "</h4>";
                        echo "<p>Event Datee: " . $eventDetailsRow['eventDateTime'] . "</p>";
                        echo "<p> Purchase Date: " . $row['purchDate'] . "</p>";
                        echo "<p> LKR " . $eventDetailsRow['eventPrice'] . " x " . $row['ticketCount'] . "</p>";
                        echo '</div>';
                        echo '</div>';
                    }
                }
            }
            else
            {
                echo "Connection to Database is failed";
            }
            ?>
        </div>
    </section>
    <div class="popup" id="popup">
        <h2>Thank you</h2>
        <p>Event Added</p>
        <button type="button">OK</button>
    </div>
    <?php 
        $popupStatus = isset($_GET['popupStatus']) ? $_GET['popupStatus'] : 1;

        if($popupStatus == 1)
        {
            echo "<script> openPopup(); </script>";
        }
    ?>
    <script>
        let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("open-popup");
        }
    </script>

    <section id="goto-eventdetails">
            <?php 
                $useremail = $_GET['useremail'];
                $username = $_GET['username'];
            ?>
        <a href="profileeventdetails.php?username=<?php echo urlencode($username); ?>&useremail=<?php echo urlencode($useremail); ?>" class="purchase-btn">View Your Event Details</a>
    </section>

    <section id="post-event-section">
        <div class="add-event">
            <h3>Post Your Event</h3>
            <form action="addevent.php" method="post" enctype="multipart/form-data">
                <?php
                    $username = $_GET['username'];
                    $useremail = $_GET['useremail'];
                ?>
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <input type="hidden" name="useremail" value="<?php echo $useremail; ?>">
                <div class="input">
                <label>Event Name</label>
                <input type="text" id="eventname" name="eventname" required>
                </div>
                <div class="input">
                <label>Description</label>
                <input type="text" id="eventdes" name="eventdes" required>
                </div>
                <div class="input">
                <label>Event Poster</label>
                <input type="file" id="eventposter" name="eventposter">
                </div>
                <div class="input">
                <label>Event Banner</label>
                <input type="file" id="eventimage" name="eventimage">
                </div>
                <div class="input">
                <label>Ticket Price</label>
                <input type="number" id="eventprice" name="eventprice" required>
                </div>
                <div class="input">
                <label>Ticket Amount</label>
                <input type="number" id="eventticketamount" name="eventticketamount" required>
                </div>
                <div class="input">
                <label>Date & Time</label>
                <input type="text" id="eventdate" name="eventdate" required>
                </div>
                <div class="input">
                <label>Location</label>
                <input type="text" id="eventloca" name="eventloca" required>
                </div>
                <div class="input">
                <label>Location URL</label>
                <input type="text" id="eventlocaurl" name="eventlocaurl">
                </div>
                <div class="input">
                <label>Band ID</label>
                <input type="text" id="bandid" name="bandid" required>
                </div>
                <div class="event-post-button">
                    <button  type="submit">Post Event</button>
                </div>
            </form>
        </div>
    </section>
    
</body>
</html>

