<?php
    session_start();
    if (!isset($_SESSION["empID"])){
        echo "You are not logged in";
        header("Location: login.php");
    }
?>
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v4.1.1">
        <title>Indy - Feed</title>
        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@600&family=Heebo:wght@600;900&family=Poppins:wght@600&display=swap" rel="stylesheet">
        <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
    </head>

    <body>
        <nav class="menu">
            <ul>
                <li><a href="feed.php">Feed</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="designer.php">Profile</a></li>
                <li><a href="signOut.php">Sign Out</a></li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row-bottom-margin">
                <div class="col-9">
                    <h1>I, the future<br/> designer.</h1> 
                </div>
                <div class="col-3">
                    <!--empty space-->
                </div>
            </div>

            <?php
                include("database/config.php");
                $empID = $_SESSION["empID"];
                $query="SELECT postID, pictures, type, dimensions, color, description FROM indyFeed INNER JOIN project ON indyFeed.projectID = project.ProjectID;";
                $sql=mysqli_query($connection, $query);
                $roomInfo=array();
                while ($row_room=mysqli_fetch_assoc($sql))
                    $roomInfo[]=$row_room;
                $postsQuery="SELECT postID FROM feedEmployee WHERE empID = '502';";
                $sql=mysqli_query($connection, $postsQuery);
                $postsArray=array();
                while ($post=mysqli_fetch_assoc($sql))
                    $postsArray[]=$post;
                $count = 0;
                $size = count($roomInfo);
                $numRows = ceil($size/3);
                $likedArray = array();
                $unlikedArray = array();
                
                function likePost($postID, $empID) {
                    $sqlLike = "INSERT INTO feedEmployee VALUES ('$postID', '$empID');";
                    if(@mysqli_query($connection, $sqlLike)) {
                        echo "success";
                    } else {
                        echo "error";
                    }
                }

                function dislikePost($postID, $empID) {
                    $sqlDislike = "DELETE FROM feedEmployee WHERE empID = '$empID' AND postID = '$postID';";
                    if(@mysqli_query($connection, $sqlDislike)) {
                        echo "success";
                    } else {
                        echo "error";
                    }
                }
                
                for ($x = 0; $x < $numRows; $x++) {
                    echo "<div class=\"feedRow\">";
                    for ($i = 0; $i < 3; $i++) {
                        if (isset($roomInfo[$count]['postID'])) {
                            echo "<div class=\"room\">";
                            echo "<img src=\"{$roomInfo[$count]['pictures']}\" class=\"figure-img img-fluid rounded\">";
                            echo "<p>Room Type: {$roomInfo[$count]['type']}<br>";
                            echo "Dimensions: {$roomInfo[$count]['dimensions']}<br>";
                            echo "Color: {$roomInfo[$count]['color']}<br>";
                            echo "Description: {$roomInfo[$count]['description']}</p>";
                            echo "<div class=\"heart\">";
                            echo "<form action =\"feed.php\" method=\"post\">";
                            $found = false;
                            for ($y = 0; $y < count($postsArray); $y++) {
                                if ($roomInfo[$count]['postID'] == $postsArray[$y]['postID']) {
                                    $found = true;
                                }
                            }
                            if ($found) {
                                ?>
                                    <input type='submit' name='button <?php echo $count ?>' value='Button <?php echo $count ?>' style="background: url(/images/heart2.png)" onClick=<?php dislikePost($roomInfo[$count]['postID'], $empID) ?> ; 
                                <?php
                                $likedArray[] = $count;
                            } else {
                                ?>
                                    <input type='submit' name='button <?php echo $count ?>' value='Button <?php echo $count ?>' style="background: url(/images/heart.png)">
                                <?php
                                $unlikedArray[] = $count;
                            }
                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                            $count = $count + 1;
                        } 
                    }
                    echo "</div>";
                }
                

                
                for($j = 0; $j < count($likedArray); $j++) {
                    $index = $likedArray[$j];
                    if (isset($_POST["button$index"])) {
                        dislikePost($roomInfo[$index]['postID'], $empID);
                    }
                    
                }

                for($k = 0; $k < count($unlikedArray); $k++) {
                    $index = $unlikedArray[$k];
                    if (isset($_POST["button$index"])) {
                        likePost($roomInfo[$count]['postID'], $empID);
                    }
                    
                }
                
                
                mysqli_close($connection);
            ?>

        </div>

        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>