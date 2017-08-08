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

$sql = "SELECT * FROM library";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<a href='update_book.php?id="  .$row["bookID"].  "'>" .$row["Title"]. "</a><br>";
    }
} else {
    echo "0 results";
}
$conn->close();


?>