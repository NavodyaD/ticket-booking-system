<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profilestyle.css">
</head>
<body>
    <div class="admintitle" style="margin: 50px 80px;">
    <h1 style="margin: 1px;">StagePass Admin Dashboard</h1>
    <p style="color: grey;">Manage Everything Here.</p>
    </div>
    <section id="manageevents">
        <div class="eventedit">
            <form action="admin_quaries/editevent.php" method="post">
                <h2>Edit Events</h2>
                <div class="input">
                    <label>Enter Event ID</label>
                    <input type="number" id="eventid" name="eventid">
                </div>
                <div class="input">
                <label>What you need to edit?</label>
                <select name="eventeditdropdown" id="eventeditdropdown">
                    <option value="1">Event Name</option>
                    <option value="2">Event Price</option>
                    <option value="3">Event Ticket Amount</option>
                    <option value="4">Event Date</option>
                    <option value="5">Event Location</option>
                    <option value="6">Band</option>
                </select>
                </div>
                <div class="input">
                    <label>Enter New Value</label>
                    <input type="text" id="neweditvalue" name="neweditvalue">
                </div>
                <div>
                    <button  type="submit">Perform Edit</button>
                </div>
            </form>
            <form action="admin_quaries/deleteevent.php" method="post">
                <h2>Hide Events</h2>
                <div class="input">
                    <label>Enter Event ID</label>
                    <input type="number" id="eventid" name="eventid">
                </div>
                <div>
                    <button  type="submit">Perform Hide</button>
                </div>
            </form>
        </div>
        <div class="eventedit">
            <form action="admin_quaries/editband.php" method="post">
                <h2>Edit Bands</h2>
                <div class="input">
                    <label>Enter Event ID</label>
                    <input type="number" id="bandid" name="bandid">
                </div>
                <div class="input">
                <label>What you need to edit?</label>
                <select name="bandeditdropdown" id="bandeditdropdown">
                    <option value="1">Band Name</option>
                    <option value="2">Players Count</option>
                    <option value="3">Band Type</option>
                    <option value="4">Band Price</option>
                    <option value="5">Band Phone Number</option>
                </select>
                </div>
                <div class="input">
                    <label>Enter New Value</label>
                    <input type="text" id="neweditvalue" name="neweditvalue">
                </div>
                <div>
                    <button  type="submit">Perform Edit</button>
                </div>
            </form>
        </div>
    </section>

    <section id="details-tables">
    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $totalsql = "SELECT SUM(ticketCount * ticketPrice) AS totalAmount FROM ticketpurchasedetails";
    $totalresult = $conn->query($totalsql);


    if ($totalresult->num_rows > 0) {
        $totalrow = $totalresult->fetch_assoc();

        $totalAmount = $totalrow["totalAmount"];
        
        echo '<div class="totalincome">';
        echo '<h2>Summery</h2>';
        echo '<div class="incomeline">';
        echo "<p>Total Ticket Selling Amount:</p>";
        echo "<h3>" . $totalAmount .  " LKR </h3>";
        echo '</div>';
        $statePassFee=$totalAmount*0.08;
        echo '<div class="incomeline">';
        echo "<p>Income From StagePass Fee (8%):</p>";
        echo "<h3>" . $statePassFee .  " LKR </h3>";
        echo '</div>';
        echo '</div>';
    } else {
        echo "0 results";
    }

    $eventsql = "SELECT eventID, eventName, eventPrice, eventTicketAmount, eventDateTime, eventLocation, bandID FROM eventdetails";
    $eventresult = $conn->query($eventsql);

    $bandsql = "SELECT bandID, bandName, playersCount, bandType, bandPrice, bandPhone FROM banddetails";
    $bandresult = $conn->query($bandsql);

    $purchsql = "SELECT purchaseID, purchDate, ticketCount, ticketPrice, userEmail, eventID FROM ticketpurchasedetails";
    $purchaseresult = $conn->query($purchsql);

    echo '<h2>Posted Events</h2>';

    if ($eventresult->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Event ID</th><th>Event Name</th><th>Ticket Price</th><th>Ticket Amount</th><th>Date & Time</th><th>Location</th><th>Band ID</th></tr>";
        while($eventrow = $eventresult->fetch_assoc()) {
            echo "<tr><td>" . $eventrow["eventID"]. "</td><td>" . $eventrow["eventName"]. "</td><td>" . $eventrow["eventPrice"]. "</td><td>" . $eventrow["eventTicketAmount"]. "</td><td>" . $eventrow["eventDateTime"]. "</td><td>" . $eventrow["eventLocation"]. "</td><td>" . $eventrow["bandID"]. "</td></tr>";
        }
        echo "</table>";
    } else 
    {
        
        echo "0 results";
    }

    echo '<h2>Posted Bands</h2>';

    if ($bandresult->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Band ID</th><th>Band Name</th><th>Players Count</th><th>Band Type</th><th>Band Price</th><th>Phone Number</th></tr>";
        while($bandrow = $bandresult->fetch_assoc()) {
            echo "<tr><td>" . $bandrow["bandID"]. "</td><td>" . $bandrow["bandName"]. "</td><td>" . $bandrow["playersCount"]. "</td><td>" . $bandrow["bandType"]. "</td><td>" . $bandrow["bandPrice"]. "</td><td>" . $bandrow["bandPhone"]. "</td></tr>";
        }
        echo "</table>";
    } else 
    {
        
        echo "0 results";
    }

    echo '<h2>Ticket Purchase Report</h2>';

    if ($purchaseresult->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Purchase ID</th><th>Purchase Date</th><th>Ticket Count</th><th>Ticket Price</th><th>User Email</th><th>Event ID</th><th>Total Price</th></tr>";
        while($purchrow = $purchaseresult->fetch_assoc()) {
            $totalPrice=$purchrow["ticketCount"]*$purchrow["ticketPrice"];
            echo "<tr><td>" . $purchrow["purchaseID"]. "</td><td>" . $purchrow["purchDate"]. "</td><td>" . $purchrow["ticketCount"]. "</td><td>" . $purchrow["ticketPrice"]. "</td><td>" . $purchrow["userEmail"]. "</td><td>" . $purchrow["eventID"]. "</td><td>" . $totalPrice. "</td></tr>";
        }
        echo "</table>";
    } else 
    {
        
        echo "0 results";
    }

    $conn->close();
    ?>
    </section>
    
</body>
</html>