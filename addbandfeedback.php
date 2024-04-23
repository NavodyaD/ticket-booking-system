<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $userEmail = $_POST["useremail"];
            $currentUserName = $_POST["username"];
            $bandID = $_POST["bandID"];
            $feedbackText = $_POST["feedbacktext"];
            $starCount = $_POST["rating"];

            $feedback_text = mysqli_real_escape_string($con, $feedbackText);
        
            $result = mysqli_query($con,"insert into bandfeedbackdetails (bandID, feedbackText, starCount, userEmail, userName) values('$bandID','$feedback_text','$starCount','$userEmail','$currentUserName')");
        
            if($result) {
                echo "Successfull";
                //$popupStatus = 1;
                //header("Location: profile.php?username=" . urlencode($currentUserName) . "&useremail=" .urlencode($userEmail) . "&popupStatus=" .urlencode($popupStatus));
                exit();
                
            }
            else
            {
                echo "Error";
            }
        
    }
    else
    {
        echo "Connection failed";
    }
}

?>

 