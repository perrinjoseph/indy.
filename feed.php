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
        <!-- <nav class="menu">
            <ul>
                <li><a href="feed.php">Feed</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="designer.php">Profile</a></li>
                <li><a href="signOut.php">Sign Out</a></li>
            </ul>
        </nav> -->

        <nav class="navbar navbar-expand-lg navbar-light bg-#D7D7D7">
            <div class="d-flex flex-grow-1">
                <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
                <a class="navbar-brand" href="feed.php">
                    indy.
                </a>
                <div class="w-100 text-right">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7" >
                        <span class="navbar-toggler-icon" ></span>
                    </button>
                </div>
            </div>

            <?php
                require "designerNav.php";
            ?>
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
                $postsQuery="SELECT postID FROM feedEmployee WHERE empID = '$empID';";
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
                            echo "<form  method=\"post\">";
                            $postID = $roomInfo[$count]['postID'];
                            $found = false;
                            for ($y = 0; $y < count($postsArray); $y++) {
                                if ($roomInfo[$count]['postID'] == $postsArray[$y]['postID']) {
                                    $found = true;
                                }
                            }
                            if ($found) {
                                echo "<input type='hidden' name='postID' value='$postID'>";
                                echo "<input type='hidden' name='count' value='$count'>";
                                echo "<input name='button$count' 
                                      type='image'  
                                      src='images/heart2.png'
                                      alt='Dislike'
                                      class='img-fluid'
                                      onClick=''; formaction = 'unlikePost.php'; formmethod = 'post'; this.form.submit() >";
                            } else {
                                echo "<input type='hidden' name='postID' value='$postID'>";
                                echo "<input type='hidden' name='count' value='$count'>";
                                echo "<input name='button$count' 
                                      type='image'
                                      src='images/heart.png'
                                      alt='Like'
                                      class='img-fluid'
                                      onClick=''; formaction = 'likePost.php'; formmethod = 'post'; this.form.submit() \">";
                            }

                            echo "</form>";
                            echo "</div>";
                            echo "</div>";
                            $count = $count + 1;
                        } 
                    }
                    echo "</div>";
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
