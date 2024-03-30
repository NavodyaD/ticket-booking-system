<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $userEmail = $_POST["useremail"];
            $eventName = $_POST["eventname"];
            $eventDes = $_POST["eventdes"];
            $eventImgName = $_FILES['eventimage']['name'];
            $eventImgTempName = $_FILES['eventimage']['tmp_name'];
            $imgFileData = addslashes(file_get_contents($eventImgTempName));
            $eventPrice = $_POST["eventprice"];
            $eventTktAmount = $_POST["eventticketamount"];
            $eventDate = $_POST["eventdate"];
            $eventLoca = $_POST["eventloca"];
            $eventLocaUrl = $_POST["eventlocaurl"];
        
            $result = mysqli_query($con,"insert into eventdetails (userEmail, eventName, eventDes, eventImage, eventPrice, eventTicketAmount, eventDateTime, eventLocation, eventLocationURL) values('$userEmail','$eventName','$eventDes','$imgFileData','$eventPrice','$eventTktAmount','$eventDate','$eventLoca','$eventLocaUrl')");
        
            if($result) {
                //header("Location: index.php?signname=" . urlencode($signname) . "&signemail=" .urlencode($signemail));
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

 