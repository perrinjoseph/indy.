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

    // likes the post and inserts record into the feedEmployee table
    $sqlLike = "INSERT INTO feedEmployee VALUES ('$postID', '$empID');";

    if(mysqli_query($connection, $sqlLike)) {
        echo "success";
    } else {
        echo "error";
    }

    // sends an email to the customer from the employee
    $sqlEmp = "SELECT email, CONCAT(fname, ' ', lname) AS name FROM employee WHERE empID = '$empID';";
    $empInfo = mysqli_fetch_assoc(mysqli_query($connection, $sqlEmp));
    
    $sqlCus = "SELECT email, CONCAT(fname, ' ', lname) AS name FROM indyFeed INNER JOIN customer ON indyFeed.cusID = customer.cusID WHERE postID = '$postID';";
    $cusInfo = mysqli_fetch_assoc(mysqli_query($connection, $sqlCus));
    
    $to = $cusInfo['email'];
    $subject = "test";
    $msg = "yo";
    $msg = wordwrap($msg, 70);
    $headers = "FROM: {$empInfo['email']}";

    mail($to, $suject, $msg, $headers);

    //header("Location:feed.php");
    
?>