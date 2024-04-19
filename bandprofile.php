<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profilestyle.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <section id="profile-details">
        <div class="title">
            <img src="assets/img/user_icon.png" alt="">
            <div class="welcome">
                <?php
                    $username = $_GET['signname'];
                    $useremail = $_GET['signemail'];
                    echo "<h2> Welcome, " . htmlspecialchars($username) . "!</h2>";
                ?>
                <h5>How is your day?</h5>
            </div>
        </div>
        <div class="band-history">
            <h3>Your Bands</h3>
            <p>The bands added by you.</p>
            <?php

            $currentusername = $_GET['signname'];
            $currentuseremail = $_GET['signemail'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ticketBookingDB";

            $con = mysqli_connect($servername, $username, $password, $dbname);

            if($con) {

                $sql = "SELECT bandName, bandImage, bandPrice, playersCount, bandType FROM banddetails WHERE userEmail = ?";
                $stmt = $con->prepare($sql);
                // Bind the parameter to the placeholder
                $stmt->bind_param("s", $currentuseremail);

                // Execute the prepared statement
                $stmt->execute();

                // Get the result set
                $bandresult = $stmt->get_result();

                if($bandresult->num_rows > 0)
                {
                    while($row = $bandresult->fetch_assoc())
                    {

                        //$eventsql = "SELECT eventName, eventPrice, eventDateTime, eventPoster FROM eventDetails WHERE eventID = $eventID";
                        //$eventDetailsResult = $con->query($eventsql);
                        //$eventDetailsRow = $eventDetailsResult->fetch_assoc();

                        echo '<div class="purchased-event">';
                        echo '<div>';
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['bandImage']).'" />';
                        echo '</div>';
                        echo '<div>';
                        echo "<h4>" . $row['bandName'] . "</h4>";
                        echo "<p> Players Count: " . $row['playersCount'] . "</p>";
                        echo "<p> Band Type: " . $row['bandType'] . "</p>";
                        echo "<p> LKR " . $row['bandPrice'] . "</p>";
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

    <section id="band-inquiries">
        <h3>Recieved Inquiries</h3>

        <?php

        //$currentuseremail = $_GET['signemail'];
        $bandID = 1;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ticketBookingDB";

        $con = mysqli_connect($servername, $username, $password, $dbname);

        if($con) {

            $sql = "SELECT userName, inqTitle, inqDes, inqDate, inqLocation, inqPhone, userEmail FROM bandinquirydetails";
            $stmt = $con->prepare($sql);
            // Bind the parameter to the placeholder
            //$stmt->bind_param("s", $bandID);

            // Execute the prepared statement
            $stmt->execute();

            // Get the result set
            $inqresult = $stmt->get_result();

            if($inqresult->num_rows > 0)
            {
                while($row = $inqresult->fetch_assoc())
                {

                    //$eventsql = "SELECT eventName, eventPrice, eventDateTime, eventPoster FROM eventDetails WHERE eventID = $eventID";
                    //$eventDetailsResult = $con->query($eventsql);
                    //$eventDetailsRow = $eventDetailsResult->fetch_assoc();

                    echo '<div class="inquiry-block">';
                    echo "<p>" . $row['userName'] . "</p>";
                    echo "<h3>" . $row['inqTitle'] . "</h3>";
                    echo "<p>" . $row['inqDes'] . "</p>";
                    echo '<span class="details">';
                        echo '<i class="fa fa-calendar" aria-hidden="true"></i>';
                        echo "<p>" . $row['inqDate'] . "</p>";
                    echo '</span>';
                    echo '<span class="details">';
                        echo '<i class="fa fa-location" aria-hidden="true"></i>';
                        echo "<p>" . $row['inqLocation'] . "</p>";
                    echo '</span>';
                    echo '<span class="details">';
                        echo '<i class="fa fa-phone" aria-hidden="true"></i>';
                        echo "<p>" . $row['inqPhone'] . "</p>";
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

    <section id="create-band-section">
        <div class="add-band">
            <h3>Create Your Band</h3>
            <form action="addband.php" method="post" enctype="multipart/form-data">
                <?php
                    $username = $_GET['signname'];
                    $useremail = $_GET['signemail'];
                ?>
                <input type="hidden" name="username" value="<?php echo $username; ?>">
                <input type="hidden" name="useremail" value="<?php echo $useremail; ?>">
            <div class="input">
                <label>Band Name</label>
                <input type="text" id="bandname" name="bandname">
            </div>
            <div class="input">
                <label>Description</label>
                <input type="text" id="banddes" name="banddes">
            </div>
            <div class="input">
                <label>Band Image</label>
                <input type="file" id="bandimage" name="bandimage">
            </div>
            <div class="input">
                <label>Players Count</label>
                <input type="number" id="playerscount" name="playerscount">
            </div>
            <div class="input">
                <label>Type</label>
                <input type="text" id="bandtype" name="bandtype">
            </div>
            <div class="input">
                <label>Band Price</label>
                <input type="text" id="bandprice" name="bandprice">
            </div>
            <div class="input">
                <label>Band Manager Phone</label>
                <input type="text" id="bandphone" name="bandphone">
            </div>
            <div class="band-post-button">
                <button  type="submit">Create Band</button>
            </div>
            </form>
        </div>
    </section>
</body>
</html>