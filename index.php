<head>
  <title>Bootstrap Example</title>
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
</head>

<?php


//Load recources
require_once('./classes/recordset.class.php');
require_once('./classes/pdoDB.class.php');

//Start Session
session_start();


//Standard REQUEST
$call = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'error';
$subject = isset($_REQUEST['subject']) ? $_REQUEST['subject'] : null;
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

$Genre= isset($_REQUEST['Genre']) ? $_REQUEST['Genre'] : null;
$Title= isset($_REQUEST['Title']) ? $_REQUEST['Title'] : null;

$user = isset($_REQUEST['user']) ? $_REQUEST['user'] : null;
$passcode = isset($_REQUEST['passcode']) ? $_REQUEST['passcode'] : null;

//Add New User REQUEST
$bookTitle = isset($_REQUEST['bookTitle']) ? $_REQUEST['bookTitle'] : null;
$bookGenre = isset($_REQUEST['bookGenre']) ? $_REQUEST['bookGenre'] : null;

//Add new Rating
$User = isset($_REQUEST['User']) ? $_REQUEST['User'] : null;
$BookTitle = isset($_REQUEST['BookTitle']) ? $_REQUEST['BookTitle'] : null;
$Rating = isset($_REQUEST['Rating']) ? $_REQUEST['Rating'] : null;
$Comments = isset($_REQUEST['Comments']) ? $_REQUEST['Comments'] : null;

//Add new Book
$bookGenre = isset($_REQUEST['bookGenre']) ? $_REQUEST['bookGenre'] : null;
$bookTitle = isset($_REQUEST['bookTitle']) ? $_REQUEST['bookTitle'] : null;
$bookID = isset($_REQUEST['bookID']) ? $_REQUEST['bookID'] : null;


//Action and Subject to Route
$route = $call . ucfirst($subject);

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

switch ($route) {
    case 'showAllBooks':
        $sqlSearch = "SELECT * FROM newtable.library;";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null, null);
        echo $retval;
        // echo   "<table class='table table-striped'>
        //             <thead>
        //               <tr>
        //                 <th>Book ID</th>
        //                 <th>Book Name</th>
        //                 <th>Email</th>
        //               </tr>
        //             </thead>
        //             <tbody>
        //               <tr>
        //                 <td>John</td>
        //                 <td>Doe</td>
        //                 <td>john@example.com</td>
        //               </tr>
        //               <tr>
        //                 <td>Mary</td>
        //                 <td>Moe</td>
        //                 <td>mary@example.com</td>
        //               </tr>
        //               <tr>
        //                 <td>July</td>
        //                 <td>Dooley</td>
        //                 <td>july@example.com</td>
        //               </tr>
        //             </tbody>
        //             </table>";
        break;

    case 'addBook':
        $sqlInsert = "INSERT INTO `newtable`.`library` (`Genre`, `Title`)
        VALUES (:bookGenre, :bookTitle)";

        $rs = new JSONRecordSet();

        $retval = $rs->setRecord($sqlInsert, null,
            array(
                ':bookGenre' => $bookGenre,
                ':bookTitle' => $bookTitle,

            ));
        echo $retval;
        break;
    
    case 'addRating':
        $sqlInsert = "INSERT INTO `newtable`.`rating` 
        (`User`, 
        `BookTitle`, 
        `Rating`, 
        `Comments`) 
        VALUES 
        (:User, 
        :BookTitle, 
        :Rating, 
        :Comments)";
        $rs = new JSONRecordSet();

        $retval = $rs->setRecord($sqlInsert, null,
            array(
                ':User' => $User,
                ':BookTitle' => $BookTitle,
                ':Rating' => $Rating,
                ':Comments' => $Comments
            ));
        echo $retval;
        break;


    case 'showAllRating':
        $sqlSearch = "SELECT * FROM newtable.rating";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null, null);
        echo $retval;
        break;


    case 'showBookByID':
        $sqlSearch = "SELECT * FROM newtable.library WHERE `bookID`=:bookID";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null, 
          array(
            ':bookID'=>$bookID
          ));
        echo $retval;
        break;


    case 'updateBook':
        $sqlUpdate = "UPDATE newtable.library
        SET 
        `Genre`=:Genre,
        `Title`=:Title
        WHERE `bookID`=:bookID";
        $rs = new JSONRecordSet();
        $retval = $rs->setRecord($sqlUpdate, null, 
          array(
            ':Genre'=>$Genre,
            ':Title'=>$Title,
            ':bookID'=>$bookID
          ));
        echo $retval;
        echo "<a href='testing.php'>Click here to return to main page</a><br>";
        break;

    case 'login':
        $sqlSearch = "SELECT * FROM newtable.user";
        $rs = new JSONRecordSet();
        $retval = $rs->getRecordSet($sqlSearch, null, null);
        $json = json_decode($retval, true);
        echo "USER=".$user;
        echo "PW=".$passcode;
        echo "JSON-USER=".$json['results'][0]['username'];
        echo "JSON-PW=".$json['results'][0]['passcode'];
        if($user == $json['results'][0]['username'])
            if ($passcode == $json['results'][0]['passcode']){
                echo "Login Successful";
                echo "<a href='testing.php'>Click me to go into home page</a>";
                }
            else
                echo "Login failed";
        else
            echo "Login failed";

        
        break;



				
				
}//end of switch



?>