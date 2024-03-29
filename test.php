<?php



$name = "navodya";


?>

<script>
        function validatePasswords() {
            var password = document.getElementById("password").value;
            var repeatPassword = document.getElementById("repeat-password").value;

            if (password !== repeatPassword) {
                alert("Passwords do not match. Please try again.");
                return false;
            } else {
                window.location.href = "eventpg.html";
            }
            return true;
        }
    </script>
