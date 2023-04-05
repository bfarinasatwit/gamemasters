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
    $servername = "db";
    $username = "root";
    $password = "password";
    $dbname = "GameMasters";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    //obtain post data from html form
    $genre1 = $_POST["genre1"];
    $genre2 = $_POST["genre2"];
    $is_free = strval($_POST["is_free"]);
    //perform query and store in result
    $stmt = $conn->prepare("SELECT * FROM games WHERE (genre1=? OR genre2=?) AND (is_free=?) UNION DISTINCT SELECT * FROM games WHERE (genre1=? OR genre2=?) AND (is_free=?)");
    $stmt->bind_param("ssissi", $genre1, $genre1, $is_free, $genre2, $genre2, $is_free);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if (!$result) {
        die("Query failed: " . $conn->error);
    }
    ?>

    <p>The value of genre1 is:
        <?php echo $genre1; ?>
    </p>
    <p>The value of genre2 is:
        <?php echo $genre2; ?>
    </p>
    <p>The value of is_free is:
        <?php echo $is_free; ?>
    </p>
    <p>The result is
        <?php
        //loop through the result and display the desired information
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Game: " . $row["game"] . ", Developer: " . $row["Developer"] . ", Publisher: " . $row["Publisher"] . ", Genre 1: " . $row["genre1"] . ", Genre 2: " . $row["genre2"] . ", Is Free: " . $row["is_free"] . "<br> <br>";
            } 
        } else {
            echo "0 results";
        } ?>
    </p>

</body>

</html>