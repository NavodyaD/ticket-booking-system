<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ticketBookingDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $birthday = $_POST["birthday"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $repeatPassword = $_POST["repeat-password"];

  if ($password !== $repeatPassword) {
    echo "Passwords do not match. Please try again.";
    exit;
  }

  // Prepare an insert statement
  $sql = $conn->prepare("INSERT INTO signup (fname, lname, birthday, email, password) VALUES (?, ?, ?, ?, ?)");
  
  // Bind variables to the prepared statement as parameters
  $sql->bind_param("sssss", $fname, $lname, $birthday, $email, $password);

  // Attempt to execute the prepared statement
  if($sql->execute()){
    echo "Records inserted successfully.";
  } else{
    echo "ERROR: Could not execute query: $sql. " . $conn->error;
  }

  // Close statement
  $sql->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('assets/img/naadhacover.jpg');
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px #000;
            width: 300px;
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .container label {
            font-weight: bold;
        }
        .container input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .container input[type="submit"] {
            background-color: #436850;
            color: white;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }
        .container input[type="submit"]:hover {
            opacity: 0.7;
        }
        .container .signin-btn {
            background-color: #436850; /* Changed color to #436850 */
            color: white;
            cursor: pointer;
            transition: opacity 0.3s ease;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            border: none;
            text-align: center;
        }
        .container .signin-btn:hover {
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Sign Up</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" required>

            <label for="lname">Last Name</label>
            <input type="text" id="lname" name="lname" required>

            <label for="birthday">Birthday</label>
            <input type="date" id="birthday" name="birthday" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="repeat-password">Repeat Password</label>
            <input type="password" id="repeat-password" name="repeat-password" required>

            <input type="submit" value="Submit" onclick="return validatePasswords()">
        </form>
        <form action="signupnew.php">
            <button class="signin-btn">Sign In</button>
        </form>

    </div>

    <script>
        function validatePasswords() {
            var password = document.getElementById("password").value;
            var repeatPassword = document.getElementById("repeat-password").value;

            if (password !== repeatPassword) {
                alert("Passwords do not match. Please try again.");
                return false;
            }
            return true;
        }
    </script>
</body>
</html>
