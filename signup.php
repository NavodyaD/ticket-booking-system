<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
        
    }
    else
    {
        echo "Connection failed";
    }

    if($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $signname = $_POST["signname"];
    $signphone = $_POST["signphone"];
    $signemail = $_POST["signemail"];
    $signpassword = $_POST["signpassword"];

    $result = mysqli_query($con,"insert into userdetails values('$signname','$signphone','$signemail','$signpassword')");

    if($result) {
        header("Location: index.php?signname=" . urlencode($signname) . "&signemail=" .urlencode($signemail));
        exit();
        
    }
    else
    {
        echo "Error";
    }
}

?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="signstyle.css">
</head>
<body>
    <section id="form-section">
        <div class="vector">
            <h5>Vector Side</h5>
        </div>
        <div class="container">
            <div class="tab">
                <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'loginspace')">Login</button>
                <button class="tablinks" onclick="openTab(event, 'signupspace')">signup</button>
            </div>
            <div id="signupspace" class="tabcontent">
            <form action="?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="input">
                    <label>Name</label>
                    <input type="text" id="name" name="signname">
                </div>
            
                <div class="input">
                    <label>Phone Number</label>
                    <input type="text" id="phonenum" name="signphone">
                </div>

                <div class="input">
                    <label>Email</label>
                    <input type="email" id="email" name="signemail">
                </div>

                <div class="input">
                    <label>Password</label>
                    <input type="password" id="password" name="signpassword">
                </div>
                <div class="button">
                    <input class="signup-btn" type="submit" value="Submit">
                </div>
                    
             </form>
            </div>

            <div id="loginspace" class="tabcontent">
            <form action="login.php" method="post">

                <div class="input">
                    <label>Email</label>
                    <input type="email" id="email" name="loginemail">
                </div>

                <div class="input">
                    <label>Password</label>
                    <input type="password" id="password" name="loginpassword">
                </div>
                <div class="button">
                    <input class="signup-btn" type="submit" value="Submit">
                </div>
                
                    
             </form>
            </div>
        </div>
    </section>
    
    <script>
        document.getElementById("defaultOpen").click();
        
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            tabcontent = document.getElementsByClassName("tabcontent");
            for (i=0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablinks");
            for (i=0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "")
            }

            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

    
</body>
</html>


