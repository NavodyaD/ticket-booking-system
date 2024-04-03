<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profilestyle.css">
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
        <div class="history">
            <h3>Your Purchase History</h3>
            <div class="purchased-event">
                <h4>Ahankara Nagare</h4>
                <p>3500LKR</p>
            </div>
        </div>
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