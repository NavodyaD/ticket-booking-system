
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profilestyle.css">
</head>
<body>
    <section id="profile-details">
        <div class="title">
            <img src="assets/img/user_icon.png" alt="">
            <div class="welcome">
                <?php
                    $username = $_GET['username'];
                    $useremail = $_GET['useremail'];
                    echo "<h2> Welcome, " . htmlspecialchars($username) . "!</h2>";
                ?>
                <h5>How is your day?</h5>
            </div>
        </div>
        <div class="history">
            <h3>Your Purchase History</h3>
            <div class="purchased-event">
                <h4>Ahankara Nagare</h4>
                <p>3500LKR</p>
            </div>
        </div>
    </section>
    <section id="post-event-section">
        <div class="add-event">
            <h3>Post Your Event</h3>
            <form action="addevent.php" method="post" enctype="multipart/form-data">
            <?php
                    $username = $_GET['username'];
                    $useremail = $_GET['useremail'];
                ?>
                <input type="hidden" name="username2" value="<?php echo $username; ?>">
                <input type="hidden" name="useremail" value="<?php echo $useremail; ?>">
                <div class="input">
                <label>Event Name</label>
                <input type="text" id="eventname" name="eventname">
                </div>
                <div class="input">
                <label>Description</label>
                <input type="text" id="eventdes" name="eventdes">
                </div>
                <div class="input">
                <label>Event Poster</label>
                <input type="file" id="eventimage" name="eventimage">
                </div>
                <div class="input">
                <label>Ticket Price</label>
                <input type="number" id="eventprice" name="eventprice">
                </div>
                <div class="input">
                <label>Ticket Amount</label>
                <input type="number" id="eventticketamount" name="eventticketamount">
                </div>
                <div class="input">
                <label>Date & Time</label>
                <input type="text" id="eventdate" name="eventdate">
                </div>
                <div class="input">
                <label>Location</label>
                <input type="text" id="eventloca" name="eventloca">
                </div>
                <div class="input">
                <label>Location URL</label>
                <input type="text" id="eventlocaurl" name="eventlocaurl">
                </div>
                <div class="input">
                <label>Location URL</label>
                <input type="text" id="eventlocaurl" name="eventlocaurl">
                </div>
                <div class="input">
                <label>Band Email</label>
                <input type="text" id="bandemail" name="bandemail">
                </div>
                <div class="event-post-button">
                    <button  type="submit">Post Event</button>
                </div>
            </form>
        </div>
    </section>
    <section id="create-band-section">
        <div class="add-band">
            <h3>Create Your Band</h3>
            <div class="input">
            <label>Band Name</label>
            <input type="text" id="bandname" name="bandname">
            </div>
            <div class="input">
            <label>Description</label>
            <input type="text" id="banddes" name="banddes">
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
            <label>Band Manager Phone</label>
            <input type="text" id="bandphone" name="bandphone">
            </div>
            <div class="band-post-button">
                <button  type="submit">Create Band</button>
            </div>
        </div>
    </section>
</body>
</html>

