<?php
//start session to use global variables
session_start();
?>

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


    if (!isset($_POST['reroll'])) {

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
    
        //create vars for post data from survey.html
        $genre1 = $_POST["genre1"];
        $genre2 = $_POST["genre2"];
        $is_free = strval($_POST["is_free"]);

        //perform query and store in result
        $stmt = $conn->prepare("SELECT * FROM games WHERE (genre1=? OR genre2=?) AND (is_free=?) UNION DISTINCT SELECT * FROM games WHERE (genre1=? OR genre2=?) AND (is_free=?) order by RAND()");
        $stmt->bind_param("ssissi", $genre1, $genre1, $is_free, $genre2, $genre2, $is_free);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$result) {
            die("Query failed: " . $conn->error);
        }

        //convert msql_result object to global 2d array
        $_SESSION['results'] = $result->fetch_all();

        //create global counter
        $_SESSION['counter'] = 0;

    }
    ?>


    <!-- create table to format output -->
    <table id="output">
        <tr>
            <td>
                <h4 id="yourolled">
                    <?php

                    //create gamelink and imagelink for current video game being displayed
                    if (count($_SESSION['results']) > $_SESSION['counter']) {
                        $gameid = $_SESSION['results'][$_SESSION['counter']]["0"];
                        $gamelink = "https://store.steampowered.com/app/{$gameid}/";
                        $imagelink = "https://cdn.cloudflare.steamstatic.com/steam/apps/{$gameid}/library_600x900.jpg";
                    }


                    //output game name
                    if (isset($_POST['reroll'])) {
                        if (count($_SESSION['results']) > $_SESSION['counter']) {
                            echo "You Rolled: " . $_SESSION['results'][$_SESSION['counter']]["1"];
                        } else {
                            echo "You Have Reached The End!";
                        }
                    } else {
                        echo $_SESSION['results']["0"]["1"];
                    }
                    ?>
                </h4>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?php
                    //output game developer
                    if (isset($_POST['reroll'])) {
                        if (count($_SESSION['results']) > $_SESSION['counter']) {
                            echo "Developer: " . $_SESSION['results'][$_SESSION['counter']]["2"];
                        }
                    } else {
                        echo "Developer: " . $_SESSION['results']["0"]["2"];
                    }
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?php
                    //output game publisher
                    if (isset($_POST['reroll'])) {
                        if (count($_SESSION['results']) > $_SESSION['counter']) {
                            echo "Publisher: " . $_SESSION['results'][$_SESSION['counter']]["3"];
                        }
                    } else {
                        echo "Publisher: " . $_SESSION['results']["0"]["3"];
                    }
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?php
                    //output the first genre of the game
                    if (isset($_POST['reroll'])) {
                        if (count($_SESSION['results']) > $_SESSION['counter']) {
                            echo "Genre 1: " . $_SESSION['results'][$_SESSION['counter']]["4"];
                        }
                    } else {
                        echo "Genre 1: " . $_SESSION['results']["0"]["4"];
                    }
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?php
                    //output the second genre of the game
                    if (isset($_POST['reroll'])) {
                        if (count($_SESSION['results']) > $_SESSION['counter']) {
                            echo "Genre 2: " . $_SESSION['results'][$_SESSION['counter']]["5"];
                        }
                    } else {
                        echo "Genre 2: " . $_SESSION['results']["0"]["5"];
                    }
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?php
                    //output the price of the game
                    if (count($_SESSION['results']) > $_SESSION['counter']) {
                        $url2 = "https://steamspy.com/api.php?request=appdetails&appid={$gameid}";
                        $data2 = file_get_contents($url2);
                        $decoded_data2 = json_decode($data2);

                        $price = $decoded_data2->price;
                        if ($price != "0") {
                            $price = $price / 100;
                        }

                        $a = "Price: $";
                        $price = $a . $price;
                        echo $price;
                    }
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?php
                    // Review score
                    // Uses data pulled earlier for the price
                    if (count($_SESSION['results']) > $_SESSION['counter']) {
                        $a = $decoded_data2->positive;
                        $b = $decoded_data2->negative;
                        // Get total number of votes
                        $b = $a + $b;
                        // Get proportion that are positive
                        $a = $a / $b;
                        // Multiply 10 times too large, round, then divide by 10
                        // Lets us have one decimal place
                        $a = $a * 1000;
                        $a = (round($a));
                        $a = $a / 10;
                        $b = "% Positive Reviews on Steam";
                        echo ($a . $b);
                    }
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?php
                    // Get and display description
                    if (count($_SESSION['results']) > $_SESSION['counter']) {
                        $url = "https://store.steampowered.com/api/appdetails?appids={$gameid}&l=english";
                        $data = file_get_contents($url);
                        $decoded_data = json_decode($data);

                        // Using short_description right now.
                        // Can switch back to about_the_game if you want the long version.
                        $about_the_game = $decoded_data->{"{$gameid}"}->data->short_description;
                        // Some games have HTML formatting in the descriptions we don't necessarily want.
                        $about_the_game_text = strip_tags($about_the_game);

                        echo $about_the_game_text;
                    }
                    ?>
                </p>
            </td>
        </tr>
        <tr>
            <td>
                <form method="post" id="update">
                    <?php
                    if (count($_SESSION['results']) > $_SESSION['counter']) {
                        //display another game
                        echo "<input type='submit' name='reroll' value='Re-Roll'/>";
                    } else {
                        //if the full query has been looped through,
                        //give user option to return to home page
                        echo "<a href='index.php' id='backtomain'>Return to Home Page</a>";
                    }
                    ?>
                </form>
                <?php
                if (count($_SESSION['results']) > $_SESSION['counter']) {
                    // Changes the links to the Epic Games Store for the two games that are now only available there.
                    if ($gameid == "1097150") {
                        $gamelink = "https://store.epicgames.com/en-US/p/fall-guys";
                    } else if ($gameid == "252950") {
                        $gamelink = "https://store.epicgames.com/en-US/p/rocket-league";
                    }
                    //provide link to store page of the current game
                    echo "<a href={$gamelink}><input type='submit' name='redirect' value='Get Game'/></a>";

                }
                ?>
            </td>
        </tr>
    </table>



    <?php
    // Formerly the GTA 4 function, now the Serena function.
    // Displays the library image for each game.
    if (count($_SESSION['results']) > $_SESSION['counter']) {
        // Serena doesn't have a library image so a modified version of the header is used instead.
        if ($gameid == "272060") {
            $imagelink = "Pictures/Serena.jpg";
        }
        // Display the image
        echo '<img src="' . $imagelink . '"  height="80%">';
        //increment counter
        $_SESSION['counter']++;
    }
    ?>



</body>

</html>