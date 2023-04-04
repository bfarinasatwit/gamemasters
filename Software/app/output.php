<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/Pictures/istockphoto-1296516701-612x612.jpg">

  <title>Game Finder</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/cover/">

  <!-- Bootstrap core CSS -->
  <link href="Cover%20Template%20for%20Bootstrap_files/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="Cover%20Template%20for%20Bootstrap_files/cover.css" rel="stylesheet">
</head>
<body>

<!-- Create connection to db -->
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "games";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//obtain post data from html form
$genre1 = $_POST["genre1"];
$genre2 = $_POST["genre2"];
$is_free = $_POST["is_free"];

$result = "placeholder";
$sql ="placeholder";

if($_POST["genre1"] == $_POST["genre2"]){
    $sql = "Select * FROM games WHERE (genre1=$genre1 OR genre2=$genre2) AND (isfree=$isfree)" or die(mysql_error());
    $result=$conn->query($sql);
}else{
    $sql = "Select * FROM games WHERE genre1=$genre1 AND genre2=$genre2 AND isfree=$isfree" or die(mysql_error());
    $result=$conn->query($sql); 
}
?>

<p>yo</p>

</body>
</html>