<?php

//Database login info
$servername="helios.vse.gmu.edu";
$username="pdiazvil";
$password="stoaho";
$dbname="pdiazvil";

//creates connection
$connection=@mysqli_connect($servername, $username, $password, $dbname);

//Check connection
if (mysqli_connect_errno()){
    printf("<br>Connection failed: %s\n", mysqli_connect_error());
    exit();
}

?>