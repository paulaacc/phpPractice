<?php
/* 
$id = $_GET["id"];
echo $id;

echo "<form action='update_confirm.php?' method='get'>
Name: <input type='text' name='name'><br>
Genre: <input type='text' name='genre'><br>
<input type='submit' name='id=' value='$id'>
</form>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "newtable";

$bookTitle = "";


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
        $bookTitle = $row["Title"];
    }
} else {
    echo "0 results";
}
$conn->close(); */



?>


<html>
<body>

<form action="index.php?action=updateBook>" method="get">
action: <input type ="text" name="action" value="updateBook"><br>
bookID: <input type="text" name="bookID" value="<?php echo $_GET['bookID']?>"><br>
Name: <input type="text" name="Title" value="<?php echo $_GET['Title']?>"><br>
Genre: <input type="text" name="Genre" value="<?php echo $_GET['Genre']?>"><br>
<input type="submit" name="Submit" value="Submit">
</form>

</body>
</html>