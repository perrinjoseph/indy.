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
    <title>Indy - Packages</title>
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
        <div class="center">
            <div class="background" style="
                height:700px; width: 900px; 
                background-image: url(images/bluesplash.png);
                background-repeat: no-repeat;
                background-position: center center;
                background-size: cover;
                margin:10%;
                float: left;">

                <h2 style="font-size: 190px; margin-left:300px; font-family: 'Heebo', sans-serif;"> <b>indy.</b></h2>
                <h2 style=" font-family: 'Poppins', sans-serif; margin-left:300px">Packages</h2>

                <p style=" margin-left:300px; font-family: Courier; color: black; ">Indy offers 3 different packages. At anytime, it is one project per room. Once you create a project, designers will like your post and an email will be sent to you. You get to choose 1 project to work with by emailing them back. Communication and payment between designers and customers works through email only. Regardless of the package selected, indy provides great customer service, feel free to contact us regarding any questions or inquires.</p>
            </div>
        </div>
        <div class="package">
            <form>
                <h1>Expert</h1>
                <p>
                    1 Room<br>
                    Size: 14x14 or less<br>
                    Design Revisions: N/A<br>
                    Furniture Purchase Links Avaialble<br>
                    <h5>Price: $79.99</h5>                    
                </p>
                
            </form><br>
        </div>

        <div class="package">
            <form>
                <h1>Premium</h1>
                <p>
                    1 Room<br>
                    Size: Greater than 14x14<br>
                    Design Revisions: Yes<br>
                    Furniture Purchase Links Available<br>
                    <h5>Price: $99.99</h5>
                </p>
                
            </form><br>
        </div>

        <div class="package">
            <form>
                <h1>Luxe</h1>
                <p>
                    1 Room<br>
                    Size: Any Size<br>
                    Design Revisions: Yes<br>
                    Furniture Purchase Links Available<br>
                    <h5>Price: $175.00</h5>
                </p>
                
            </form><br>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>