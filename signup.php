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

    if (isset($_POST['checkbox']) && $_POST['checkbox'] == 'on') {
        $RID = 3;
    } 
    else {
        $RID = 2;
    }

    $result = mysqli_query($con,"insert into userdetails values('$signname','$signphone','$signemail','$signpassword','$RID')");

    if($result) {
        if ($RID == 3) {
            header("Location: bandprofile.php?signname=" . urlencode($signname) . "&signemail=" .urlencode($signemail));
            exit();
        }
        else if($RID == 2) {
            header("Location: index.php?signname=" . urlencode($signname) . "&signemail=" .urlencode($signemail));
            exit();
        }
        
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
            <img src="assets/img/signup_vector.jpg" alt="">
        </div>
        <div class="container">
            <img src="assets/img/logo_image.png" alt="">
            <div class="tab">
                <button class="tablinks" id="defaultOpen" onclick="openTab(event, 'loginspace')">Login</button>
                <button class="tablinks" onclick="openTab(event, 'signupspace')">Create New Account</button>
            </div>
            <div id="signupspace" class="tabcontent">
            <form action="?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="input">
                <label for="checkbox">Do you going to create band account?</label>
                <input type="checkbox" id="checkbox" class="band-checkbox" name="checkbox">
                </div>
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
                    <input class="signup-btn" type="submit" value="Create Account">
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
                    <input class="signup-btn" type="submit" value="Login">
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


