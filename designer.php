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
    <title>Indy - Designer Home</title>
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
            <a class="navbar-brand" href="#">
                indy.
            </a>
            <div class="w-100 text-right">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar7" >
                    <span class="navbar-toggler-icon" ></span>
                </button>
            </div>
        </div>
        
        
        

        
        <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar7">
            <ul class="navbar-nav ml-auto flex-nowrap">
              
                <li class="nav-item">
                    <a href="about.html" class="nav-link">About</a>
                </li>
                
                <li class="nav-item">
                    <a href="feed.php" class="nav-link">Feed</a>
                </li>
                <li class="nav-item">
                    <a href="designer.php" class="nav-link">Profile</a>
                </li>
                <li class="nav-item">
                    <a href="signOut.php" class="nav-link">Sign Out</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row-bottom-margin">
            <div class="col-sm-2">
                <img src="images/profile1.jpg" class="rounded-circle img-fluid img-thumbnail" alt="Designer"> 
            </div>
            <div class="col-sm-6">
                    <?php
                        include("database/config.php");
                        // Check if the logged in user is a designer
                        if (isset($_SESSION["empID"])){
                            // Logged in; grab first name, last name, about me, and style from database
                            $empID = $_SESSION["empID"];

                            $result = @mysqli_query($connection, "select fname, lname, aboutme, style from employee where empID = '$empID'") or die("failed to connect to database" .mysql_error());
                            // Order: [0] = fname, [1] = lname, [2] = aboutme, [3] = style
                            $row = mysqli_fetch_row($result);

                            $fname = $row[0];
                            $lname = $row[1];
                            $aboutme = $row[2];
                            $style = $row[3];
                            echo "<h4>$fname $lname</h4>";
                            echo "$aboutme";
                        } else {
                            echo "You are not logged in";
                            header("Location: login.php");
                        }
                    ?>
            </div>
            <div class="col-sm-4">
                <?php
                    echo "<h4>Style</h4>";
                    echo "$style";
                ?>
                <!-- <div class="progress">
                    <div class="progress-bar" style="width:100%"></div>
                </div>
                <h5>Rating:</h5>
                5/5 -->
            </div>
        </div>
        <div class="row-bottom-margin">
            <div class="col-sm-12">
                <h2 class="text-center">Rooms Designed</h2>
            </div>
        </div>

        <?php
            //Display the room images
            $roomImages = "images/designer-images";
            $images = glob($roomImages . "/*.jpg");
            $numImages = sizeof($images);
            $imageIndex = 0;

            //Calculate how many rows are needed based on the number of total images (each row has 3 images)
            $numRows = 0;
            if($numImages % 3 == 0) {
                $numRows = $numImages / 3;
            } else {
                $numRows = ($numImages / 3) + 1;
            }

            // Display up to 3 images and then place a new row, then repeat until out of images
            for($i = 0; $i < $numRows; $i++) {
                echo "<div class='row-bottom-margin'>";
                for($x=0; $x < 3; $x++) 
                {
                    if($imageIndex < $numImages) 
                    {
                      
        ?>
        
                    <div class="col-sm-4">
                        <img src=<?php echo "$images[$imageIndex]";?> class=" img-fluid" alt="Room" >
                        <?php $imageIndex++; ?>
                    </div>
        <?php
                    }
                }
                echo "</div>";
            }
        ?>
    </div>
   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>