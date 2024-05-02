<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ticketBookingDB";

    $con = mysqli_connect($servername, $username, $password, $dbname);

    if($con) {

        $loginemail = $_POST['loginemail'];
        $loginpassword = $_POST['loginpassword'];

        $res = mysqli_query($con,"SELECT *FROM users WHERE signEmail='$loginemail' AND signPassword='$loginpassword'");
        $status=false;

        while($row = mysqli_fetch_array($res)) {
            $status=true;
        }

        if($status) {
            $nameRes = mysqli_query($con,"SELECT *FROM users WHERE signEmail='$loginemail' AND signPassword='$loginpassword'");
        
            while($row=mysqli_fetch_array($nameRes)) {
                $signname=$row['userName'];
            }

            $roleIdRes = mysqli_query($con,"SELECT *FROM users WHERE signEmail='$loginemail' AND signPassword='$loginpassword'");


            while($row=mysqli_fetch_array($roleIdRes)) {
                $RID=$row['roleID'];
            }

            if($RID == 1) {
                header("Location: adminprofile.php?signemail=" .urlencode($loginemail));
                exit();
            }
            else if($RID == 2)
            {
                header("Location: index.php?signname=" . urlencode($signname) . "&signemail=" .urlencode($loginemail));
                exit();
            }
            else if($RID == 3)
            {
                header("Location: bandprofile.php?signname=" . urlencode($signname) . "&signemail=" .urlencode($loginemail));
                exit();
            }

        } else {
            echo "Invalid User Details, try again!";
        }
    }
    else
    {
        echo "Connection to Database is failed";
    }
?>