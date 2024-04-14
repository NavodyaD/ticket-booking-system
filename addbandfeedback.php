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
        
            $result = mysqli_query($con,"insert into bandfddetails (bandID, feedbackText, starCount, userEmail, userName) values('$bandID','$feedbackText','$starCount','$userEmail','$currentUserName')");
        
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

 