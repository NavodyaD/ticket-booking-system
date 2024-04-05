

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
        <a href="#"> <img src="assets/img/sample_logo.png" class="logo" alt="" width="60" height="50"></a>

        <div>
            <ul id="navbar">
                <?php 
                    $useremail = $_GET['signemail'];
                    $username = $_GET['signname'];
                ?>
                <li><a class="active" href="index.php?signname=<?php echo urlencode($username); ?>&signemail=<?php echo urlencode($useremail); ?>">Events</a></li>
                <li><a href="bandpg.php?username=<?php echo urlencode($username); ?>&useremail=<?php echo urlencode($useremail); ?>">Bands</a></li>
                <li><a href="">Inquaries</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <div class="nav-right-set">
            <a href="" class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></a>
            <?php 
                $useremail = $_GET['signemail'];
                $username = $_GET['signname'];
            ?>
            <a href="profile.php?username=<?php echo urlencode($username); ?>&useremail=<?php echo urlencode($useremail); ?>" class="purchase-btn">My Profile</a>
        </div>
    </section>

    <section id="hero">
        <?php

            $username = $_GET['signname'];
            $useremail = $_GET['signemail'];
            echo "<h4> Welcome, " . htmlspecialchars($username) . "!</h4>";
            //echo "<h4> Welcome, " . htmlspecialchars($useremail) . "!</h4>";
        ?>
        <h1>Reserve Your Music Space.</h1>
        <p>Purchase Tickets for Music Events/Concerts, Outdoor Musicals, Musical Parties with Tickets.lk</p>
        <button>How it works</button>
    </section>

    <section id="event1" class="section-p1">
        <h1 class="title1">Active Events</h1>
        <p class="title1">Active evnts</p>
        <div class="event-container">
        <?php
            $currentuseremail = $_GET['signemail'];  
            $currentusername = $_GET['signname'];   

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "ticketBookingDB";

            $con = mysqli_connect($servername, $username, $password, $dbname);

            if($con) {

                $sql = "SELECT eventID, eventName, eventImage, eventDateTime, eventLocation FROM eventdetails";
                $eventresult = $con->query($sql);

                if($eventresult->num_rows > 0)
                {
                    while($row = $eventresult->fetch_assoc())
                    {
                        echo '<div class="event" onclick="redirectToDetails(\'' . urlencode($row["eventID"]) . '\', \'' . urlencode($currentuseremail) . '\', \'' . urlencode($currentusername) . '\')">';
                        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['eventImage']).'" />';
                            echo '<div class="des">';
                                echo '<span>Colombo Events</span>';
                                echo "<h4>" . $row['eventName'] . "</h4>";
                                echo '<span class="details">';
                                    echo '<i class="fa fa-calendar" aria-hidden="true"></i>';
                                    echo "<h5>" . $row['eventDateTime'] . "</h5>";
                                echo '</span>';
                                echo '<span class="details">';
                                    echo '<i class="fa fa-map-marker" aria-hidden="true"></i>';
                                    echo "<h5>" . $row['eventLocation'] . "</h5>";
                                echo '</span>';
                                
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
        <script>
            function redirectToDetails(eventid, useremail, username) {
                window.location.href = 'eventpg.php?eventid=' + encodeURIComponent(eventid) + '&useremail=' + encodeURIComponent(useremail) + '&username=' + encodeURIComponent(username);
            }
        </script>
            <div class="event">
                <img src="assets/img/event_01.jpg" alt="">
                <div class="des">
                    <span>Colombo Events</span>
                    <h4>AHANKARA NAGARE </h4>
                    <span class="details">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <h5>7th May 2024</h5>
                    </span>
                    <span class="details">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5>Viharamahadewi Open Theater</h5>
                    </span>
                    
                </div>
            </div>
            <div class="event">
                <img src="assets/img/ahankara_nagare.jpg" alt="">
                <div class="des">
                    <span>Colombo Events</span>
                    <h4>AHANKARA NAGARE </h4>
                    <span class="details">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <h5>7th May 2024</h5>
                    </span>
                    <span class="details">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5>Viharamahadewi Open Theater</h5>
                    </span>  
                </div>
            </div>
            <div class="event">
                <img src="assets/img/event_01.jpg" alt="">
                <div class="des">
                    <span>Colombo Events</span>
                    <h4>AHANKARA NAGARE </h4>
                    <span class="details">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <h5>7th May 2024</h5>
                    </span>
                    <span class="details">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5>Viharamahadewi Open Theater</h5>
                    </span>
                    
                </div>
            </div>
            <div class="event">
                <img src="assets/img/event_01.jpg" alt="">
                <div class="des">
                    <span>Colombo Events</span>
                    <h4>AHANKARA NAGARE </h4>
                    <span class="details">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <h5>7th May 2024</h5>
                    </span>
                    <span class="details">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5>Viharamahadewi Open Theater</h5>
                    </span>
                    
                </div>
            </div>
            <div class="event">
                <img src="assets/img/event_01.jpg" alt="">
                <div class="des">
                    <span>Colombo Events</span>
                    <h4>AHANKARA NAGARE </h4>
                    <span class="details">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <h5>7th May 2024</h5>
                    </span>
                    <span class="details">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5>Viharamahadewi Open Theater</h5>
                    </span>
                    
                </div>
            </div>
            <div class="event">
                <img src="assets/img/event_01.jpg" alt="">
                <div class="des">
                    <span>Colombo Events</span>
                    <h4>AHANKARA NAGARE </h4>
                    <span class="details">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <h5>7th May 2024</h5>
                    </span>
                    <span class="details">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <h5>Viharamahadewi Open Theater</h5>
                    </span>
                    
                </div>
            </div>
        </div>
        
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
                <img class="logo" src="assets/img/sample_logo.png" height="80px" width="80px" alt="">
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