<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $userEmail = $_POST["useremail"];
            $eventID = $_POST["eventID"];
            $ticketCount = $_POST["ticketcountdropdown"];

            /*if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if the dropdown value is set and not empty
                if (isset($_POST["dropdown"]) && !empty($_POST["dropdown"])) {
                    // Get the selected value from the dropdown
                    $ticketCount = $_POST["ticketcountdropdown"];

                    // Output the selected value
                    echo "Selected value: " . $selectedValue;
                } else {
                    // If dropdown value is not set or empty, handle the error
                    echo "Dropdown value is not selected.";
                }*/
            }


        
            $result = mysqli_query($con,"insert into ticketpurchasedetails (purchDate, ticketCount, userEmail, eventID) values(NOW(),'$ticketCount','$userEmail','$eventID')");
        
            if($result) {
                $popupStatus = 1;
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

?>

 