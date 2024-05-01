<?php
      

if($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {
            $userEmail = mysqli_real_escape_string($con, $_POST["useremail"]);
            $eventID = mysqli_real_escape_string($con, $_POST["eventID"]);
            $ticketCount = mysqli_real_escape_string($con, $_POST["ticketcountdropdown"]);
            $currentusername = mysqli_real_escape_string($con, $_POST["username"]);
            $cvv = mysqli_real_escape_string($con, $_POST["cvv"]);

            if ($cvv === '233') 
            {
                $sql = "insert into ticketpurchasedetails (purchDate, ticketCount, userEmail, eventID) values(NOW(),'{$ticketCount}','{$userEmail}','{$eventID}')";
                $result = mysqli_query($con, $sql);

                $to         = $userEmail;
                $sender     = 'navodya0831@gmail.com';
                $mail_subject = 'Tickets Purchase Successful';
                $email_body = '<p>Dear ' . $currentusername . '</p>';
                $email_body .= '<p>You have purchased your tickets successfully!</p>';
                $email_body .= '<p>Number of Tickets: ' . $ticketCount . '</p>';
                $email_body .= '<p>Thank you for purchasing tickets from Tickets LK</p>';
                $email_body .= '<p>Tickets LK Team</p>';

                $header = "From: {$sender}\r\nContent-Type: text/html;";

                $send_mail_result = mail($to, $mail_subject, $email_body, $header);


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
                    
                }

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


            
        
    }
    else
    {
        echo "Connection failed";
    }

?>

 