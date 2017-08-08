<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>


<?php
// echo "In index.php";

$url = 'http://tag-care.com/server/index.php?action=showAllUsers';
$content = file_get_contents($url);
echo $content;
$json = json_decode($content, true);

echo "<div class='container'><table class='table table-striped'><thead>
      <tr>
        <th>ID</th>
        <th>name</th>
        <th>email</th>
        <th>password</th>
        <th>deleted_at</th>
        <th>created_at</th>
        <th>types</th>
        <th>tag_coin</th>
        <th>facebook_id</th>
        <th>google_id</th>
        <th>phone_no</th>
      </tr>
    </thead>";

// echo $json['RowCount'];
// var_dump($json);
$i = 0;
while($i < $json['RowCount']) {
    echo "<tbody><tr>";
    echo "<td>".$json['results'][$i]['id']."</td>";
    echo "<td>".$json['results'][$i]['name']."</td>";
    echo "<td>".$json['results'][$i]['email']."</td>";
    echo "<td>".$json['results'][$i]['password']."</td>";
    echo "<td>".$json['results'][$i]['deleted_at']."</td>";
    echo "<td>".$json['results'][$i]['created_at']."</td>";
    echo "<td>".$json['results'][$i]['types']."</td>";
    echo "<td>".$json['results'][$i]['tag_coin']."</td>";
    echo "<td>".$json['results'][$i]['facebook_id']."</td>";
    echo "<td>".$json['results'][$i]['google_id']."</td>";
    echo "<td>".$json['results'][$i]['phone_no']."</td>";
    echo "</tr></tbody>";
    $i++;
}

//echo $json['results'][1]['created_time'];
//echo $json['results'][1]['userName'];

//$json = $json['results'];

// echo $json[][1][1];
// echo $json['results'][1]['status_msg'];
//$counter =0;
// foreach($json as $i){
//     print_r($i);
//     echo $i['userName'];
//     echo $i['created_time'];
//     echo "<br>";




//     echo [$counter][''];
//     $counter++;
//     echo $i['results'][1]['userName'];
//     echo $i['results'][1]['password'];
// }


// // Define the errors.
// $constants = get_defined_constants(true);
// $json_errors = array();
// foreach ($constants["json"] as $name => $value) {
//     if (!strncmp($name, "JSON_ERROR_", 11)) {
//         $json_errors[$value] = $name;
//     }
// }

// // Show the errors for different depths.
// foreach (range(4, 3, -1) as $depth) {
//     var_dump(json_decode($json, true, $depth));
//     echo 'Last error: ', $json_errors[json_last_error()], PHP_EOL, PHP_EOL;
// }
?>