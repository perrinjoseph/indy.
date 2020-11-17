<?php
    include("database/config.php");
    session_start();
    if (!isset($_SESSION["empID"])){
        echo "You are not logged in";
        header("Location: login.php");
    }

    $empID = $_SESSION["empID"];
    $postID = $_POST["postID"];
    $count = $_POST['count'];

    $sqlDislike = "DELETE FROM feedEmployee WHERE empID = '$empID' AND postID = '$postID';";
    if(@mysqli_query($connection, $sqlDislike)) {
        echo "success";
    } else {
        echo "error";
    }
    echo "<br>$empID <br>";
    echo "$postID <br>";
    echo "$count <br>";

    header("Location:feed.php");
    
?>