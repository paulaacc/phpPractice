<?php
$username = $_GET['username'];
$password = $_GET['passcode'];

if ($username == "username")
    if ($password == "passcode")
        echo "Login successful";
    else
        echo "Login failed";
else
    echo "Login failed";

?>