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
    $subject = "INDY: Project Design";
    $msg = "Hello {$cusInfo['name']}, \n\n      My name is {$empInfo['name']} and I am a designer at Indy. I am contacting you to inform you that I have seen your post and am interseted in designing your room. I have included a link to my portoflio page so that you may see some of my previous work and decide if you would like to move forward with me as your designer. Please feel free to respond to this email with your decision.\nNOTE: all future contact with this designer shall be made through this email thread.\n\nThank You,\n{$empInfo['name']}";
    $msg = wordwrap($msg, 120);
    $sender = $empInfo['email'];
    $headers = "FROM: $sender";

    if (mail($to, $subject, $msg, $headers)) {
        echo "mail success";
    } else {
        echo "mail error";
    }

    header("Location:feed.php");
    
?>