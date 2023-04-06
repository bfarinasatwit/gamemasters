<?php
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

    // Create connection
    if (!isset($_POST['reroll'])) {

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
    
        //obtain post data from html form
        $genre1 = $_POST["genre1"];
        $genre2 = $_POST["genre2"];
        $is_free = strval($_POST["is_free"]);
        //perform query and store in result
        $stmt = $conn->prepare("SELECT * FROM games WHERE (genre1=? OR genre2=?) AND (is_free=?) UNION DISTINCT SELECT * FROM games WHERE (genre1=? OR genre2=?) AND (is_free=?) order by RAND()");
        $stmt->bind_param("ssissi", $genre1, $genre1, $is_free, $genre2, $genre2, $is_free);
        $stmt->execute();
        $result = $stmt->get_result();

        $_SESSION['results'] = $result->fetch_all();
        $_SESSION['counter'] = 0;

        if (!$result) {
            die("Query failed: " . $conn->error);
        }
    }
    ?>

    <!-- <p>The result is
        //?php
        //loop through the result and display the desired information
        // if ($result->num_rows > 0) {
        //     while ($row = $result->fetch_assoc()) {
        //         echo "Game: " . $row["game"] . ", Developer: " . $row["Developer"] . ", Publisher: " . $row["Publisher"] . ", Genre 1: " . $row["genre1"] . ", Genre 2: " . $row["genre2"] . ", Is Free: " . $row["is_free"] . "<br> <br>";
        //     } 
        // } else {
        //     echo "0 results";
        // } ?>
    </p> -->



    <table id="output">
        <legend>You Rolled: </legend>
        <tr>
            <td>
                <h4>
                    <?php

                    if (count($_SESSION['results']) > $_SESSION['counter']) {
                        $gameid = $_SESSION['results'][$_SESSION['counter']]["0"];
                        $gamelink = "https://store.steampowered.com/app/{$gameid}/";
                        $gameid = $_SESSION['results'][$_SESSION['counter']]["0"];
                        $gamelink = "https://store.steampowered.com/app/{$gameid}/";
                        $imagelink = "https://cdn.cloudflare.steamstatic.com/steam/apps/{$gameid}/library_600x900.jpg";
                    }



                    if (isset($_POST['reroll'])) {
                        if (count($_SESSION['results']) > $_SESSION['counter']) {
                            echo $_SESSION['results'][$_SESSION['counter']]["1"];
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
    </table>

    <form method="post" id="update">

        <?php
        if (count($_SESSION['results']) > $_SESSION['counter']) {
            echo "<input type='submit' name='reroll' value='Re-Roll'/>";
        } else {
            echo "<a href='index.php' id='backtomain'>Return to Home Page</a>";
        }
        ?>
    </form>


    <?php
    if (count($_SESSION['results']) > $_SESSION['counter']) {
        // Changes the links to the Epic Games Store for the two games that are now only available there.
        if ($gameid == "1097150") {
            $gamelink = "https://store.epicgames.com/en-US/p/fall-guys";
        } else if ($gameid == "252950"){
            $gamelink = "https://store.epicgames.com/en-US/p/rocket-league";
        }
            echo "<a href={$gamelink}><input type='submit' name='redirect' value='Get Game'/></a>";
        
    }
    ?>

    <?php
    // "The GTA 4 Function"
    if (count($_SESSION['results']) > $_SESSION['counter']) {
        // GTA 4 images are stored at a different appid than the game itself.
        if ($gameid == "901583") {
            echo '<img src="https://cdn.cloudflare.steamstatic.com/steam/apps/12210/library_600x900.jpg" width="600px" height="100%">';
        } else {
            // any other game
            echo '<img src="' . $imagelink . '" width="600px" height="100%">';
        }
        $_SESSION['counter']++;
    }
    ?>



</body>

</html>