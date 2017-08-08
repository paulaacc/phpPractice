<?php

var_dump($_GET);

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

$sql = "INSERT INTO library (Genre, Title)
VALUES ('$Genre', '$Name')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>