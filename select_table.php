<?php


$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "newtable";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "INSERT INTO $dbname.`library` (`Genre`, `Name`) VALUES ('Mystery', 'Mortal Instrument vol.7')";

for($i = 1; $i <= 3; $i++){
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
}
}

$conn->close();
?>


