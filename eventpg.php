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
                <li><a class="active" href="index.html">Events</a></li>
                <li><a href="">Bands</a></li>
                <li><a href="">Inquaries</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </div>
        <div class="nav-right-set">
            <a href="" class="icon"><i class="fa fa-user" aria-hidden="true"></i></a>
            <?php 
                $useremail = urldecode($_GET['useremail']);
                $username = $_GET['username'];
            ?>
            <a href="profile.php?username=<?php echo urlencode($username); ?>&useremail=<?php echo urlencode($useremail); ?>" class="purchase-btn">My Profile</a>
        </div>
    </section>

    <section id="heroEventPG">
        
    </section>

    <section id="eventdetails" class="section-p1">
        <div class="single-event-des">
            <?php 
                $eventID = $_GET['eventid'];
                $useremail = urldecode($_GET['useremail']);
                echo '<h4>' . $eventID . '</h4>';
                echo '<h5>' . $useremail . '</h5>';
            ?>
            <h1>ALUTH KALAWAK</h1>
            <p>Purchase tickets to get a ultimate music experience with YAGA Live in Concert. Main Artists are IRAJ, Romesh Sugathapala, Kaizer Kaiz, Bathiya & Santhush, Wasthi, Dinesh Gamage and Kanchana Anuradhi. Held on Viaharamahadewi Open Air Theater on August 31 at 6.30 PM onwards. Your participation is warmly welcome.</p>
            
        </div>
        <div class="single-event-details">
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
                <input type="number" value="1">
            </div>
            <div class="ticket-price">
                <p>Total Price: </p>
                <h4>3500 LKR</h4>
            </div>
            <button>Buy Tickets</button>
        </div>
    </section>

    <div style="margin: 0px 80px;">
        <h3>Performing Band</h3>
    </div>

    <section id="band1" class="section-p1">
        
        <div class="band-container">
            <div class="bandpost">
                <img src="assets/img/band_1.jpg" alt="">
                <div class="des">
                    <span>Colombo</span>
                    <h3>Midlane Band</h3>
                    <p>Midlane is one of leading band of Sri Lanka that has played over 200+ musical events islandwide and international. Midlane has produced several most popular songs in Sri Lanka.</p>
                    <span class="details">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <h5>9 Players</h5>
                    </span>
                    <span class="details">
                        <i class="fa fa-music" aria-hidden="true"></i>
                        <h5>Classic/Hipop</h5>
                    </span>  
                </div>
            </div>

        </div>
        
    </section>

    <div style="margin: 0px 80px;">
        <h3>Feedbacks</h3>
    </div>

    <Section id="givefeedback">
        <div class="starfd">
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
            <i class="fa fa-star" aria-hidden="true"></i>
        </div>
        <div class="addfeedback">
            <label for="inputField">Describe your experience about the event, artists and the music. </label>
            <textarea rows="5" placeholder="Type your feedback here..."></textarea>
        </div>
    </Section>

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