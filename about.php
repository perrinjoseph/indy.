<?php
    session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Indy - Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:wght@600&family=Heebo:wght@600;900&family=Poppins:wght@600&display=swap" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-#D7D7D7">
        <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
            <a class="navbar-brand" href="login.php">
                indy.
            </a>
            <div class="w-100 text-right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7" >
                    <span class="navbar-toggler-icon" ></span>
                </button>
            </div>
        </div>

        <?php
            // Different navbar depending on if logged in, and what type of user logged in as

            // Logged in as customer
            if (isset($_SESSION["cusID"])){
                require "customerNav.php";
            // Logged in as designer
            } elseif (isset($_SESSION["empID"])){
                require "designerNav.php";
            // Not logged in
            } else {
            ?>

                <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
                    <ul class="navbar-nav ml-auto flex-nowrap">
                        <li class="nav-item">
                            <a href="login.php" class="nav-link">Login</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="packages.php" class="nav-link">Packages</a>
                        </li>
                    </ul>
                </div>

            <?php
            }
        ?>
    </nav>

    <div class="row">
        <div >
            <h2 style=" font-size: 130px; margin-left:70px; font-family: 'Heebo', sans-serif;"> <b>OUR VISION.</b></h2><br>
            <p style=" margin-left:70px; font-family: Courier; color: black; "><b>indy</b> is an online platform for homes that need a makeover.<br>
            Interior designers can pick which poject they wish to work on from customers <br>
            who upload pictures of their houses. Designers use the uploaded pictures to develope <br>
            a 3D model of the house with new interiors. Furthermore, the furniture is readily available<br>
            on online stores such as IKEA, Home Depot etc.
            </p>
        </div>   
    </div>
    
    <hr width="80%">
   
    <div class="row">
        <div class="col5">
            <h2 style=" font-size: 50px; margin-left:70px; font-family: 'Heebo', sans-serif;">Problems Addressed </h2><br>
            <p style="  font-family: Courier; color: black; ">1. Higher rates for interior designers <br>
                2. Time consuming to meet designers in person. <br> 
                3. COVID-19 <br>
                4. Limited Designers<br>
        </div>
        <div class="col5">
            <h2 style=" font-size: 50px; margin-left:70px; font-family: 'Heebo', sans-serif;">Envisioned Solution </h2><br>
            <p style="  font-family: Courier; color: black; ">

                1. Cheaper costs because transportation <br>
                compensation and extra labor costs do not include<br>
                2. Quicker response time as everything is online<br>
                3. Social Distancing reduces risk of COVID-19<br>
                4. Wide variety of interior designers<br>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>