<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

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
     echo "<div class='container'><table class='table table-striped'><thead>
      <tr>
        <th>Image</th>
        <th>Book ID</th>
        <th>Book Title</th>
        <th>Book Genre</th>
        <th>Link to book</th>
      </tr>
    </thead>";
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "

    
    <tbody>
      <tr>
        <td><img src='books.jpg' alt='Mountain View' style='width:304px;height:228px;'></td>
        <td>".$row['bookID']."</td>
        <td>".$row['Title']."</td>
        <td>".$row['Genre']."</td>
        <td><a href='update_book.php?bookID=".$row['bookID']."&Title=".$row['Title']."&Genre=".$row['Genre']."'><button id='".$id = $row['bookID']."' type='button' onclick='myFunction(".$row['bookID'].")'>Book".$row['bookID']."</button></a></td>
      </tr>
    </tbody>
  ";
// var_dump($row);

        // echo "<a href='dummypage.php?id="  .$row["bookID"].  "'>" .$row["Title"]. "</a><br>";
    }
    echo "</table></div>";
} else {
    echo "0 results";
}
$conn->close();
echo "<script>
function myFunction() {
    var txt;
    if (confirm('You have selected book') == true) {
        txt = 'You pressed button';
    } else {
        txt = 'You pressed Cancel!';
    }
    document.getElementById('demo').innerHTML = txt;
}
</script>";

?>
