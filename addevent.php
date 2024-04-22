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
            $eventName = $_POST["eventname"];
            $eventDes = $_POST["eventdes"];
        // Event Poster
            $eventPosterName = $_FILES['eventposter']['name'];
            $eventPosterTempName = $_FILES['eventposter']['tmp_name'];
            $imgPosterFileData = addslashes(file_get_contents($eventPosterTempName));
        // Event Banner
            $eventImgName = $_FILES['eventimage']['name'];
            $eventImgTempName = $_FILES['eventimage']['tmp_name'];
            $imgFileData = addslashes(file_get_contents($eventImgTempName));

            $eventPrice = $_POST["eventprice"];
            $eventTktAmount = $_POST["eventticketamount"];
            $eventDate = $_POST["eventdate"];
            $eventLoca = $_POST["eventloca"];
            $eventLocaUrl = $_POST["eventlocaurl"];
            $bandID = $_POST["bandid"];

            $event_description = mysqli_real_escape_string($con, $eventDes);
        
            $result = mysqli_query($con,"insert into eventdetails (userEmail, eventName, eventDes, eventPoster, eventImage, eventPrice, eventTicketAmount, eventDateTime, eventLocation, eventLocationURL, bandID) values('$userEmail','$eventName','$event_description','$imgPosterFileData','$imgFileData','$eventPrice','$eventTktAmount','$eventDate','$eventLoca','$eventLocaUrl','$bandID')");
        
            if($result) {
                $popupStatus = 1;
                header("Location: profile.php?username=" . urlencode($currentUserName) . "&useremail=" .urlencode($userEmail) . "&popupStatus=" .urlencode($popupStatus));
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

 