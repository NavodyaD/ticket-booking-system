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
                <li><a class="active" href="index.php?signname=<?php echo urlencode($username); ?>&signemail=<?php echo urlencode($useremail); ?>">Events</a></li>
                <li><a href="bandpg.php?username=<?php echo urlencode($username); ?>&useremail=<?php echo urlencode($useremail); ?>">Bands</a></li>
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
        $eventID = $_GET['eventid'];

        $sql = "SELECT eventName, eventDes, eventPrice, eventImage, eventDateTime, eventLocation, bandID FROM eventdetails WHERE eventID = $eventID";
        $eventdetailsresult = $con->query($sql);

        $eventrow = $eventdetailsresult->fetch_assoc();

        $eventName = $eventrow["eventName"];
        $eventDes = $eventrow["eventDes"];
        $eventPrice = $eventrow["eventPrice"];
        $eventDateTime = $eventrow["eventDateTime"];
        $eventLocation = $eventrow["eventLocation"];
        $bandID = $eventrow["bandID"];
        
        $bandsql = "SELECT bandName, bandDes, bandImage, playersCount, bandType FROM banddetails WHERE bandID = $bandID";
        $banddetailsresult = $con->query($bandsql);

        $bandrow = $banddetailsresult->fetch_assoc();
        

    }
    else
    {
        echo "Connection to Database is failed";
    }
    ?>

    <section id="heroEventPG">
        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($eventrow['eventImage']).'" />'; ?>

    </section>

    <section id="eventdetails" class="section-p1">

        <div class="single-event-des">
            <?php 
                $useremail = urldecode($_GET['useremail']);
            ?>
            <?php echo "<h1>" . $eventName . "</h1>"; ?>
            <?php echo "<p>" . $eventDes . "</p>"; ?>
            <span class="details">
                <i class="fa fa-calendar" aria-hidden="true"></i>
                <?php echo "<h5>" . $eventDateTime . "</h5>" ?>
            </span>
            <span class="details">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <?php echo "<h5>" . $eventLocation . "</h5>"; ?>
            </span>
        </div>
        <div class="single-event-details">
        <form action="addpurchase.php" method="post">
            <div class="ticket-type">
                <p>Ticket Type: </p>
                <select>
                    <option>General Ticket</option>
                    <option>VIP Ticket</option>
                    <option>V-VIP Ticket</option>
                </select>
            </div>
            <div class="ticket-count">
                <p>Select the Ticket Amount:</p>
                <?php 
                    $useremail = urldecode($_GET['useremail']);
                    $currentusername = $_GET['username'];
                ?>
                <input type="hidden" name="eventID" value="<?php echo $eventID; ?>">
                <input type="hidden" name="useremail" value="<?php echo $useremail; ?>">
                <input type="hidden" name="username" value="<?php echo $currentusername; ?>">

                <select name="ticketcountdropdown" id="ticketcountdropdown">
                    <option value="1">1 Ticket</option>
                    <option value="2">2 Tickets</option>
                    <option value="3">3 Ticket</option>
                    <option value="4">4 Ticket</option>
                    <option value="5">5 Ticket</option>
                </select>
            </div>

            <div class="ticket-price">
                <p>Total Price: </p>
                <p> Price: <span id="eventPrice"></span></p>
                <script>
                    document.addEventListner('DOMContentLoaded', function() {
                    const ticketcountdropdown = document.getElementById('ticketcountdropdown');
                    const priceText = document.getElementById('eventPrice');
                    const ticketPrice = <?php echo $eventPrice; ?>;

                    dropdown.addEventListner('change', function() {
                        const ticketCount = parseInt(ticketcountdropdown.value);
                        const totalPrice = ticketCount*ticketPrice;
                        priceText.textContent = totalPrice.toFixed(2);
                    });
                });
                </script>
            </div>
            
            <div>
                    <button  type="submit">Buy Tickets</button>
            </div>
            </form>
            
            
    </section>

    <div style="margin: 0px 80px;">
        <h3>Performing Band</h3>
    </div>

    <section id="band1" class="section-p1">

                
        
        <div class="band-container">
            <div class="bandpost">
            <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($bandrow['bandImage']).'" />'; ?>
                <div class="des">
                    <span>Colombo</span>
                    <?php echo "<h3>" . $bandrow['bandName'] . "</h3>"; ?>

                    <?php echo "<p>" . $bandrow['bandDes'] . "</p>"; ?>
                    <span class="details">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <?php echo "<h5>" . $bandrow['playersCount'] . "</h5>"; ?>
                    </span>
                    <span class="details">
                        <i class="fa fa-music" aria-hidden="true"></i>
                        <?php echo "<h5>" . $bandrow['bandType'] . "</h5>"; ?>
                    </span>  
                </div>
            </div>
        </div>
        
    </section>

    <div style="margin: 0px 80px;">
        <h3>Feedbacks</h3>
    </div>


    <Section id="givefeedback">
    <form action="addfeedback.php" method="post">
        <div class="stars">
            <span class="star" data-value="1"><i class="fa fa-star" aria-hidden="true"></i></span>
            <span class="star" data-value="2"><i class="fa fa-star" aria-hidden="true"></i></span>
            <span class="star" data-value="3"><i class="fa fa-star" aria-hidden="true"></i></span>
            <span class="star" data-value="4"><i class="fa fa-star" aria-hidden="true"></i></span>
            <span class="star" data-value="5"><i class="fa fa-star" aria-hidden="true"></i></span>
        </div>

        <div class="addfeedback">
            <label for="inputField">Describe your experience about the event, artists and the music. </label>
            <textarea name="feedbacktext" rows="5" placeholder="Type your feedback here..."></textarea>
        </div>

        <?php 
            $eventID = $_GET['eventid'];
            $useremail = urldecode($_GET['useremail']);
            $currentusername = $_GET['username'];
        ?>
        <input type="hidden" name="eventID" value="<?php echo $eventID; ?>">
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
            $eventID = $_GET['eventid'];

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ticketBookingDB";

            $con = mysqli_connect($servername, $username, $password, $dbname);

            if($con) {

                $sql = "SELECT feedbackText, starCount, userEmail, userName FROM eventfddetails WHERE eventID = $eventID";
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