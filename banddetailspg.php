<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>

    <section id="header">
        <a href="#"> <img src="assets/img/logo_image.png" class="logo" alt="" width="100" ></a>

        <div>
            <ul id="navbar">
                <?php 
                    $useremail = urldecode($_GET['useremail']);
                    $username = $_GET['username'];
                ?>
                <li><a href="index.php?signname=<?php echo urlencode($username); ?>&signemail=<?php echo urlencode($useremail); ?>">Events</a></li>
                <li><a class="active" href="bandpg.php?username=<?php echo urlencode($username); ?>&useremail=<?php echo urlencode($useremail); ?>">Bands</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <div class="nav-right-set">
            <a href="" class="icon"><i class="fa fa-user" aria-hidden="true"></i></a>
            <a href="profile.php?username=<?php echo urlencode($username); ?>&useremail=<?php echo urlencode($useremail); ?>" class="purchase-btn">My Profile</a>
        </div>
    </section>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
        $bandID = $_GET['bandid'];

        $sql = "SELECT bandName, bandDes, bandPrice, bandImage, playersCount, bandType, bandPhone FROM band WHERE bandID = $bandID";
        $banddetailsresult = $con->query($sql);

        $bandrow = $banddetailsresult->fetch_assoc();
    }
    else
    {
        echo "Connection to Database is failed";
    }
    ?>

    <section id="banddetails" class="section-p1">
        <div class="main-container">

        <div class="band-page-img">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($bandrow['bandImage']).'" />'; ?>
        </div>


        <div class="single-band-details">
        
            
            <?php echo "<h1>" . $bandrow['bandName'] . "</h1>"; ?>
            <?php echo "<p>" . $bandrow['bandDes'] . "</p>"; ?>

            <span class="details">
                <i class="fa fa-users" aria-hidden="true"></i>
                <?php echo "<h4>" . $bandrow['playersCount'] . " Players</h4>" ?>
            </span>
            <span class="details">
                <i class="fa fa-music" aria-hidden="true"></i>
                <?php echo "<h4>" . $bandrow['bandType'] . " Music</h4>" ?>
            </span>
            <span class="details">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <?php echo "<h4>" . $bandrow['bandPhone'] . "</h4>" ?>
            </span>
            <span class="details">
                <?php echo "<h2>Estimated Price: LKR " . $bandrow['bandPrice'] . "</h2>" ?>
            </span>
            <p>This is only a estimated price and the price can be confirmed after contacting the band.</p>
            
        </div>
        </div>
            
            
    </section>

    <section id="inquiry-section">
        <div class="inquiry-form">
            <h2>Make an Inquiry</h2>
            <form action="sendinquiry.php" method="post" enctype="multipart/form-data">
                <?php
                    $bandID = $_GET['bandid'];
                    $useremail = urldecode($_GET['useremail']);
                ?>
                <input type="hidden" name="bandid" value="<?php echo $bandID; ?>">
                <input type="hidden" name="useremail" value="<?php echo $useremail; ?>">
            <div class="input">
                <label>Your Name</label>
                <input type="text" id="yourname" name="yourname">
            </div>
            <div class="input">
                <label>Expected Date</label>
                <input type="text" id="expdate" name="expdate">
            </div>
            <div class="input">
                <label>Location</label>
                <input type="text" id="location" name="location">
            </div>
            <div class="input">
                <label>Subject</label>
                <input type="text" id="subject" name="subject">
            </div>
            <div class="input">
                <label>Description</label>
                <textarea name="description" rows="9" placeholder="Describe your inquiry here..."></textarea>
            </div>
            <div class="input">
                <label>Phone Number</label>
                <input type="text" id="phonenum" name="phonenum">
            </div>
            
            <div class="band-post-button">
                <button  type="submit">Send Inquiry</button>
            </div>
            </form>
        </div>
    </section>


    <div style="margin: 20px 80px; margin-top: 20px;">
        <h3>Leave Your Feedback</h3>
    </div>


    <Section id="givefeedback">
    <form action="addbandfeedback.php" method="post">
        <div class="stars">
            <span class="star" data-value="1"><i class="fa fa-star" aria-hidden="true"></i></span>
            <span class="star" data-value="2"><i class="fa fa-star" aria-hidden="true"></i></span>
            <span class="star" data-value="3"><i class="fa fa-star" aria-hidden="true"></i></span>
            <span class="star" data-value="4"><i class="fa fa-star" aria-hidden="true"></i></span>
            <span class="star" data-value="5"><i class="fa fa-star" aria-hidden="true"></i></span>
        </div>

        <div class="addfeedback">
            <label for="inputField">Describe your experience about the band and music. </label>
            <textarea name="feedbacktext" rows="5" placeholder="Type your feedback here..."></textarea>
        </div>

        <?php 
            $bandID = $_GET['bandid'];
            $useremail = urldecode($_GET['useremail']);
            $currentusername = $_GET['username'];
        ?>
        <input type="hidden" name="bandID" value="<?php echo $bandID; ?>">
        <input type="hidden" name="username" value="<?php echo $currentusername; ?>">
        <input type="hidden" name="useremail" value="<?php echo $useremail; ?>">
        <input type="hidden" name="rating" id="rating" value="0">

        <button type="submit" onclick="submitForm()">Send Feedback</button>

        <script>
            const stars = document.querySelectorAll('.star');
            const ratingInput = document.getElementById('rating');

            stars.forEach(star => {
            star.addEventListener('click', () => {
                const value = parseInt(star.getAttribute('data-value'));
                ratingInput.value = value; // Update hidden input value
                updateStars(value); // Update stars appearance
            });
            });

            function updateStars(value) {
            stars.forEach((star, index) => {
                if (index < value) {
                star.classList.add('active');
                } else {
                star.classList.remove('active');
                }
            });
            }

            function submitForm() {
            const selectedRating = parseInt(ratingInput.value);
            if (selectedRating === 0) {
                alert('Please select a rating.');
                return;
            }
            // Perform form submission or other actions
            console.log('Selected rating:', selectedRating);
            }

        </script>
        </form>

        
    </Section>


    <section id="current-feedbacks">
        <h3>Feedbacks</h3>
        <?php
            $eventID = $_GET['bandid'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ticketBookingDB";

            $con = mysqli_connect($servername, $username, $password, $dbname);

            if($con) {

                $sql = "SELECT feedbackText, starCount, userEmail, userName FROM bandfeedback WHERE bandID = $bandID";
                $feedbackResult = $con->query($sql);

                if($feedbackResult->num_rows > 0)
                {
                    while($row = $feedbackResult->fetch_assoc())
                    {
                        echo '<div class="feedback-block">';
                        echo '<div class="name">';
                        echo '<i class="fa fa-user" aria-hidden="true"></i>';
                        echo "<p>" . $row['userName'] . "</p>";
                        echo '</div>';
                        echo '<div class="star-count">';

                        // PHP logic to generate stars
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $row['starCount']) {
                                echo '<span class="star active"><i class="fa fa-star" aria-hidden="true"></i></span>';
                            } else {
                                echo '<span class="star"><i class="fa fa-star" aria-hidden="true"></i></span>';
                            }
                        }

                        echo '</div>';
                        echo "<p>" . $row['feedbackText'] . "</p>";
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

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstwxt">
            <h4>Subscribe for News Letter</h4>
            <p>Get E-mail about our special <span>announcements</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your Email Address">
            <button>Subscrive</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <div class="contact">
                <img class="logo" src="assets/img/logo_image.png" width="140px" alt="">
                <h4>Contact</h4>
                <p><strong>Email:</strong> contact@tickets.lk</p>
                <p><strong>Phone:</strong> 076 6929 822</p>
            </div>
        </div>
        <div class="col">
            <div class="social">
                <h4>Connect with us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
            <h4>Pages</h4>
            <a href="#">Events</a>
            <a href="#">How it works</a>
            <a href="#">About Us</a>
            <h4>Help</h4>
            <a href="#">Customer Support</a>
        </div>
        <div class="col">
            <div class="payment">
                <h4>Payment Gateways</h4>
                <p>Secure Playment Gateways</p>
                <div class="row">
                    <img src="assets/img/visa_logo.jpg" height="40px" alt="">
                    <img src="assets/img/mastercard_logo.png" height="40px" alt="">
                </div>
            </div>
        </div>
        <div class="colinstall">
            <div class="install">
                <h4>Install App</h4>
            <p>From Google Play or Apple App Store</p>
            <div class="row">
                <img src="assets/img/google_play.jpg" height="50px" alt="">
                <img src="assets/img/app_store.png" height="50px" alt="">
            </div>
            </div>
            
        </div>
        
    </footer>
    <script src="script.js"></script>
</body>
</html>