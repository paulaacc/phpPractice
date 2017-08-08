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
$id = $_GET["id"];
$sql = "SELECT * FROM library WHERE bookID=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["bookID"]. " - Genre: " . $row["Genre"]. " " . $row["Title"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>