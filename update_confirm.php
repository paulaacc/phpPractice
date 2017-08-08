<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newtable";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$Genre = $_GET["genre"];
$Name = $_GET["name"];
$Id = $_GET["id"];



$sql = "UPDATE library SET Genre='$Genre', Title='$Name' WHERE bookID=$Id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>